<?php
class TarifModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllTarif() {
        $this->db->query("SELECT * FROM tb_tarif");
        return $this->db->resultSet();
    }

    public function getTarifById($id) {
        $this->db->query("SELECT * FROM tb_tarif WHERE id_tarif = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahTarif($data) {
        $query = "INSERT INTO tb_tarif (jenis_kendaraan, tarif_per_jam) VALUES (:jenis_kendaraan, :tarif_per_jam)";
        $this->db->query($query);
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('tarif_per_jam', $data['tarif_per_jam']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahTarif($data) {
        $query = "UPDATE tb_tarif SET jenis_kendaraan = :jenis_kendaraan, tarif_per_jam = :tarif_per_jam WHERE id_tarif = :id_tarif";
        $this->db->query($query);
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('tarif_per_jam', $data['tarif_per_jam']);
        $this->db->bind('id_tarif', $data['id_tarif']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusTarif($id) {
        $query = "DELETE FROM tb_tarif WHERE id_tarif = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}