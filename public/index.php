<?php
session_start();

// Memanggil file inti MVC
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';

// Menjalankan aplikasi
$app = new App();