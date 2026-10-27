<?php
class AreaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllArea() {
        $this->db->query("SELECT * FROM tb_area_parkir");
        return $this->db->resultSet();
    }

    public function getAreaById($id) {
        $this->db->query("SELECT * FROM tb_area_parkir WHERE id_area = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahArea($data) {
        $query = "INSERT INTO tb_area_parkir (nama_area, kapasitas) VALUES (:nama_area, :kapasitas)";
        $this->db->query($query);
        $this->db->bind('nama_area', $data['nama_area']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahArea($data) {
        $query = "UPDATE tb_area_parkir SET nama_area = :nama_area, kapasitas = :kapasitas WHERE id_area = :id_area";
        $this->db->query($query);
        $this->db->bind('nama_area', $data['nama_area']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('id_area', $data['id_area']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusArea($id) {
        $query = "DELETE FROM tb_area_parkir WHERE id_area = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}