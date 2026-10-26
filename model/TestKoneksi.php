<?php

require_once "m_koneksi.php";

$koneksi = new m_koneksi();

$db = $koneksi->getkoneksi();

echo "Koneksi database berhasil!";