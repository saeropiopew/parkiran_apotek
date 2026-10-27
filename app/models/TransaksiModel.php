<?php
class TransaksiModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getParkirAktif() {
        $query = "SELECT t.id_parkir, t.waktu_masuk, k.plat_nomor, k.jenis_kendaraan, a.nama_area 
                  FROM tb_transaksi t 
                  JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan 
                  JOIN tb_area_parkir a ON t.id_area = a.id_area 
                  WHERE t.status = 'masuk' 
                  ORDER BY t.waktu_masuk DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

public function parkirMasuk($data, $id_user) {
        $plat_nomor = strtoupper(trim($data['plat_nomor']));
        $jenis_kendaraan = strtolower($data['jenis_kendaraan']);
        $warna = trim($data['warna']);
        $pemilik = trim($data['pemilik']);
        $id_area = $data['id_area'];

        // 1. Cek apakah kendaraan sudah ada di tb_kendaraan
        $this->db->query("SELECT id_kendaraan FROM tb_kendaraan WHERE plat_nomor = :plat");
        $this->db->bind('plat', $plat_nomor);
        $kendaraan = $this->db->single();

        if ($kendaraan) {
            $id_kendaraan = $kendaraan['id_kendaraan'];
            // Opsional: Update warna/pemilik jika ada perubahan terbaru
            $this->db->query("UPDATE tb_kendaraan SET warna = :warna, pemilik = :pemilik WHERE id_kendaraan = :id");
            $this->db->bind('warna', $warna);
            $this->db->bind('pemilik', $pemilik);
            $this->db->bind('id', $id_kendaraan);
            $this->db->execute();
        } else {
            // Jika belum ada, insert data lengkap sesuai input petugas
            $this->db->query("INSERT INTO tb_kendaraan (plat_nomor, jenis_kendaraan, warna, pemilik, id_user) VALUES (:plat, :jenis, :warna, :pemilik, :id_user)");
            $this->db->bind('plat', $plat_nomor);
            $this->db->bind('jenis', $jenis_kendaraan);
            $this->db->bind('warna', $warna);
            $this->db->bind('pemilik', $pemilik);
            $this->db->bind('id_user', $id_user);
            $this->db->execute();
            
            // Ambil ID kendaraan yang baru saja dibuat
            $this->db->query("SELECT id_kendaraan FROM tb_kendaraan WHERE plat_nomor = :plat ORDER BY id_kendaraan DESC LIMIT 1");
            $this->db->bind('plat', $plat_nomor);
            $newK = $this->db->single();
            $id_kendaraan = $newK['id_kendaraan'];
        }

        // 2. Ambil id_tarif berdasarkan jenis kendaraan
        $this->db->query("SELECT id_tarif FROM tb_tarif WHERE jenis_kendaraan = :jenis LIMIT 1");
        $this->db->bind('jenis', $jenis_kendaraan);
        $tarif = $this->db->single();
        
        if(!$tarif) return 0; 
        $id_tarif = $tarif['id_tarif'];

        // 3. Insert ke tb_transaksi
        $queryTransaksi = "INSERT INTO tb_transaksi (id_kendaraan, id_tarif, id_area, id_user, status, waktu_masuk) 
                           VALUES (:id_kendaraan, :id_tarif, :id_area, :id_user, 'masuk', NOW())";
        $this->db->query($queryTransaksi);
        $this->db->bind('id_kendaraan', $id_kendaraan);
        $this->db->bind('id_tarif', $id_tarif);
        $this->db->bind('id_area', $id_area);
        $this->db->bind('id_user', $id_user);
        $this->db->execute();

        // 4. Update area terisi
        $this->db->query("UPDATE tb_area_parkir SET terisi = terisi + 1 WHERE id_area = :id_area");
        $this->db->bind('id_area', $id_area);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function parkirKeluar($id_parkir) {
        $this->db->query("SELECT t.waktu_masuk, t.id_area, k.plat_nomor, tr.tarif_per_jam 
                          FROM tb_transaksi t 
                          JOIN tb_tarif tr ON t.id_tarif = tr.id_tarif 
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan
                          WHERE t.id_parkir = :id_parkir");
        $this->db->bind('id_parkir', $id_parkir);
        $transaksi = $this->db->single();

        if (!$transaksi) return false;

        $waktu_masuk = strtotime($transaksi['waktu_masuk']);
        $waktu_sekarang = time();
        $selisih_detik = $waktu_sekarang - $waktu_masuk;
        
        $durasi_jam = ceil($selisih_detik / 3600); 
        if ($durasi_jam < 1) $durasi_jam = 1;

        $biaya_total = $durasi_jam * $transaksi['tarif_per_jam'];

        $this->db->query("UPDATE tb_transaksi 
                          SET waktu_keluar = NOW(), durasi_jam = :durasi, biaya_total = :biaya, status = 'keluar' 
                          WHERE id_parkir = :id_parkir");
        $this->db->bind('durasi', $durasi_jam);
        $this->db->bind('biaya', $biaya_total);
        $this->db->bind('id_parkir', $id_parkir);
        $this->db->execute();

        $this->db->query("UPDATE tb_area_parkir SET terisi = terisi - 1 WHERE id_area = :id_area AND terisi > 0");
        $this->db->bind('id_area', $transaksi['id_area']);
        $this->db->execute();

        return $transaksi['plat_nomor'];
    }

public function getTransaksiById($id_parkir) {
        $this->db->query("SELECT t.*, k.plat_nomor, k.jenis_kendaraan, k.warna, k.pemilik, a.nama_area, u.nama_lengkap as nama_petugas 
                          FROM tb_transaksi t 
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan 
                          JOIN tb_area_parkir a ON t.id_area = a.id_area 
                          JOIN tb_user u ON t.id_user = u.id_user
                          WHERE t.id_parkir = :id_parkir");
        $this->db->bind('id_parkir', $id_parkir);
        return $this->db->single();
    }

    public function getLaporanRekap($tgl_awal, $tgl_akhir) {
        $this->db->query("SELECT t.waktu_masuk, t.waktu_keluar, t.durasi_jam, t.biaya_total, k.plat_nomor, k.jenis_kendaraan 
                          FROM tb_transaksi t 
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan 
                          WHERE t.status = 'keluar' 
                          AND DATE(t.waktu_keluar) BETWEEN :tgl_awal AND :tgl_akhir 
                          ORDER BY t.waktu_keluar ASC");
        $this->db->bind('tgl_awal', $tgl_awal);
        $this->db->bind('tgl_akhir', $tgl_akhir);
        $detail = $this->db->resultSet();

        $this->db->query("SELECT SUM(biaya_total) as total_pendapatan 
                          FROM tb_transaksi 
                          WHERE status = 'keluar' 
                          AND DATE(waktu_keluar) BETWEEN :tgl_awal AND :tgl_akhir");
        $this->db->bind('tgl_awal', $tgl_awal);
        $this->db->bind('tgl_akhir', $tgl_akhir);
        $total = $this->db->single();

        return [
            'detail' => $detail,
            'total' => $total['total_pendapatan'] ?? 0
        ];
    }
}