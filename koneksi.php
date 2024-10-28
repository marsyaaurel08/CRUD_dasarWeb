<?php
$serverName = "localhost\SQLEXPRESS"; 
$database = "crud";

try {
    // Buat koneksi menggunakan PDO
    $kon = new PDO("sqlsrv:server=$serverName;Database=$database");
    // Set error mode ke exception
    $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}
?>
