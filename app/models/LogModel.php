<?php
class LogModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function catatLog($id_user, $aktivitas) {
        $query = "INSERT INTO tb_log_aktivitas (id_user, aktivitas) VALUES (:id_user, :aktivitas)";
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('aktivitas', $aktivitas);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllLog() {
        $query = "SELECT l.*, u.nama_lengkap 
                  FROM tb_log_aktivitas l 
                  LEFT JOIN tb_user u ON l.id_user = u.id_user 
                  ORDER BY l.waktu_aktivitas DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}