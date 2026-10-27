<?php
class Database {
    private $host = 'localhost';
    private $user = 'root'; // Sesuaikan dengan username database Anda
    private $pass = '';     // Sesuaikan dengan password database Anda
    private $db_name = 'parkir_apotek';

    private $dbh; // Database Handler
    private $stmt; // Statement

    public function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    // Menyiapkan query
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding parameter untuk mengamankan data
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value) : $type = PDO::PARAM_INT; break;
                case is_bool($value) : $type = PDO::PARAM_BOOL; break;
                case is_null($value) : $type = PDO::PARAM_NULL; break;
                default : $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi query
    public function execute() {
        return $this->stmt->execute();
    }

    // Ambil banyak data
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu data
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghitung jumlah baris yang berubah
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}