<?php
include('koneksi.php');

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$query = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$query->bind_param("ss", $username, $password);
$query->execute();
echo "Pengguna berhasil ditambahkan!";
?>
