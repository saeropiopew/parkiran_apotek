<?php

require_once __DIR__ . "/m_koneksi.php";

class Tarif
{
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->getkoneksi();
    }

    // =========================
    // TAMPIL DATA TARIF
    // =========================

    public function getAll()
    {
        $query = "SELECT * FROM tb_tarif ORDER BY id_tarif DESC";

        return $this->db->query($query);
    }

    // =========================
    // AMBIL TARIF BERDASARKAN ID
    // =========================

    public function getById($id)
    {
        $id = (int) $id;

        $query = "SELECT * FROM tb_tarif
                  WHERE id_tarif = $id";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    // =========================
    // TAMBAH TARIF
    // =========================

    public function tambah($jenis_kendaraan, $tarif_per_jam)
    {
        $jenis_kendaraan = $this->db->real_escape_string($jenis_kendaraan);
        $tarif_per_jam = (int) $tarif_per_jam;

        $query = "INSERT INTO tb_tarif
                  (
                      jenis_kendaraan,
                      tarif_per_jam
                  )
                  VALUES
                  (
                      '$jenis_kendaraan',
                      $tarif_per_jam
                  )";

        return $this->db->query($query);
    }

    // =========================
    // EDIT TARIF
    // =========================

    public function edit($id, $jenis_kendaraan, $tarif_per_jam)
    {
        $id = (int) $id;

        $jenis_kendaraan = $this->db->real_escape_string($jenis_kendaraan);
        $tarif_per_jam = (int) $tarif_per_jam;

        $query = "UPDATE tb_tarif SET
                    jenis_kendaraan = '$jenis_kendaraan',
                    tarif_per_jam = $tarif_per_jam
                  WHERE id_tarif = $id";

        return $this->db->query($query);
    }

    // =========================
    // HAPUS TARIF
    // =========================

    public function hapus($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM tb_tarif
                  WHERE id_tarif = $id";

        return $this->db->query($query);
    }
}