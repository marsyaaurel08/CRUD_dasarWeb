<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('koneksi.php');

$query = "SELECT * FROM catalog";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Jilbab</title>
    <style>
        .product { margin-bottom: 20px; }
        .product img { width: 100px; height: 100px; object-fit: cover; }
    </style>
</head>
<body>
    <h1>Katalog Jilbab</h1>
    <a href="logout.php">Logout</a>
    <div class="catalog">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product">
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>">
                <h2><?php echo $row['product_name']; ?></h2>
                <p><?php echo $row['description']; ?></p>
                <p>Rp<?php echo number_format($row['price'], 2, ',', '.'); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
