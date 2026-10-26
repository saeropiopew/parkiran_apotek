<?php

class m_koneksi
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "parkiran_apotek";

    public function getkoneksi()
    {
        $koneksi = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($koneksi->connect_error) {
            die("Koneksi database gagal: " . $koneksi->connect_error);
        }

        return $koneksi;
    }
}