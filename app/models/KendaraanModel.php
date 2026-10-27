<?php
class KendaraanModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllKendaraan() {
        $this->db->query("SELECT * FROM tb_kendaraan ORDER BY id_kendaraan DESC");
        return $this->db->resultSet();
    }

    public function tambahKendaraan($data) {
        $query = "INSERT INTO tb_kendaraan (plat_nomor, jenis_kendaraan, warna, pemilik, id_user) 
                  VALUES (:plat_nomor, :jenis_kendaraan, :warna, :pemilik, :id_user)";
        $this->db->query($query);
        $this->db->bind('plat_nomor', strtoupper($data['plat_nomor']));
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('pemilik', $data['pemilik']);
        $this->db->bind('id_user', $data['id_user']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
}