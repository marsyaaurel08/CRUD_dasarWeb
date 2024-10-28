<!DOCTYPE html>
<html>
<head>
    <title>FORM PENDAFTARAN PESERTA SEMINAR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        include "koneksi.php";

        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $instansi = input($_POST["instansi"]);
            $jurusan = input($_POST["jurusan"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "INSERT INTO peserta (nama, instansi, jurusan, no_hp, alamat) VALUES (?, ?, ?, ?, ?)";
            $stmt = $kon->prepare($sql);
            $stmt->execute([$nama, $instansi, $jurusan, $no_hp, $alamat]);

            if ($stmt) {
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
            }
        }
        ?>

        <h2>Input Data</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group">
                <label>Nama: </label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required />
            </div>
            <div class="form-group">
                <label>Instansi: </label>
                <input type="text" name="instansi" class="form-control" placeholder="Masukkan Asal Instansi" required />
            </div>
            <div class="form-group">
                <label>Jurusan: </label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required />
            </div>
            <div class="form-group">
                <label>No Hp: </label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP" required />
            </div>
            <div class="form-group">
                <label>Alamat: </label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
