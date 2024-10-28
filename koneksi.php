<?php
$serverName = "localhost\SQLEXPRESS"; 
$database = "crud";

try {
    
    $kon = new PDO("sqlsrv:server=$serverName;Database=$database");
    
    $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}
?>
