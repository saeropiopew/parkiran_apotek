<?php

require_once __DIR__ . "/m_koneksi.php";

class Kendaraan
{
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->getkoneksi();
    }

    public function getAll()
    {
        $query = "SELECT * FROM tb_kendaraan ORDER BY id_kendaraan DESC";
        return $this->db->query($query);
    }

    public function getById($id)
    {
        $id = (int) $id;

        $query = "SELECT * FROM tb_kendaraan
                  WHERE id_kendaraan = $id";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function tambah(
        $plat_nomor,
        $jenis_kendaraan,
        $warna,
        $pemilik,
        $id_user
    ) {
        $plat_nomor = $this->db->real_escape_string($plat_nomor);
        $jenis_kendaraan = $this->db->real_escape_string($jenis_kendaraan);
        $warna = $this->db->real_escape_string($warna);
        $pemilik = $this->db->real_escape_string($pemilik);

        if ($id_user == "" || $id_user == null) {
            $id_user = "NULL";
        } else {
            $id_user = (int) $id_user;
        }

        $query = "INSERT INTO tb_kendaraan
                  (
                    plat_nomor,
                    jenis_kendaraan,
                    warna,
                    pemilik,
                    id_user
                  )
                  VALUES
                  (
                    '$plat_nomor',
                    '$jenis_kendaraan',
                    '$warna',
                    '$pemilik',
                    $id_user
                  )";

        return $this->db->query($query);
    }

    public function edit(
        $id,
        $plat_nomor,
        $jenis_kendaraan,
        $warna,
        $pemilik,
        $id_user
    ) {
        $id = (int) $id;

        $plat_nomor = $this->db->real_escape_string($plat_nomor);
        $jenis_kendaraan = $this->db->real_escape_string($jenis_kendaraan);
        $warna = $this->db->real_escape_string($warna);
        $pemilik = $this->db->real_escape_string($pemilik);

        if ($id_user == "" || $id_user == null) {
            $id_user = "NULL";
        } else {
            $id_user = (int) $id_user;
        }

        $query = "UPDATE tb_kendaraan SET
                    plat_nomor = '$plat_nomor',
                    jenis_kendaraan = '$jenis_kendaraan',
                    warna = '$warna',
                    pemilik = '$pemilik',
                    id_user = $id_user
                  WHERE id_kendaraan = $id";

        return $this->db->query($query);
    }

    public function hapus($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM tb_kendaraan
                  WHERE id_kendaraan = $id";

        return $this->db->query($query);
    }
}