<?php

require_once __DIR__ . "/m_koneksi.php";

class Area
{
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->getkoneksi();
    }

    public function getAll()
    {
        $query = "SELECT * FROM tb_area_parkir ORDER BY id_area DESC";

        return $this->db->query($query);
    }

    public function getById($id)
    {
        $id = (int) $id;

        $query = "SELECT * FROM tb_area_parkir
                  WHERE id_area = $id";

        $result = $this->db->query($query);

        return $result->fetch_assoc();
    }

    public function tambah($nama_area, $kapasitas)
    {
        $nama_area = $this->db->real_escape_string($nama_area);
        $kapasitas = (int) $kapasitas;

        $query = "INSERT INTO tb_area_parkir
                  (nama_area, kapasitas, terisi)
                  VALUES
                  ('$nama_area', $kapasitas, 0)";

        return $this->db->query($query);
    }

    public function edit($id, $nama_area, $kapasitas)
    {
        $id = (int) $id;
        $nama_area = $this->db->real_escape_string($nama_area);
        $kapasitas = (int) $kapasitas;

        $query = "UPDATE tb_area_parkir SET
                    nama_area = '$nama_area',
                    kapasitas = $kapasitas
                  WHERE id_area = $id";

        return $this->db->query($query);
    }

    public function hapus($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM tb_area_parkir
                  WHERE id_area = $id";

        return $this->db->query($query);
    }
}