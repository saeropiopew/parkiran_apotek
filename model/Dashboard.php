<?php

require_once __DIR__ . "/m_koneksi.php";

class Dashboard
{
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->getkoneksi();
    }

    public function getTotalKendaraan()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_kendaraan";

        $result = $this->db->query($query);

        $data = $result->fetch_assoc();

        return $data["total"];
    }

    public function getTotalUser()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_user";

        $result = $this->db->query($query);

        $data = $result->fetch_assoc();

        return $data["total"];
    }

    public function getTotalTarif()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_tarif";

        $result = $this->db->query($query);

        $data = $result->fetch_assoc();

        return $data["total"];
    }

    public function getTotalArea()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_area_parkir";

        $result = $this->db->query($query);

        $data = $result->fetch_assoc();

        return $data["total"];
    }
}