<?php
$host = "localhost";
$user = "root";       // Sesuaikan dengan konfigurasi Laragon/XAMPP kamu
$pass = "";           // Sesuaikan dengan konfigurasi Laragon/XAMPP kamu
$db   = "DB_UAS_PBO_TI1D_FasyaNiaIryanti";

// Membuat koneksi menggunakan MySQLi
$dbConnection = new mysqli($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if ($dbConnection->connect_error) {
    die("Koneksi database gagal: " . $dbConnection->connect_error);
}
?>