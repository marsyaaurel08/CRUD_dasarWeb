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

        // Mendapatkan data lama untuk ditampilkan pada form
        if (isset($_GET['id_peserta'])) {
            $id_peserta = input($_GET["id_peserta"]);

            $sql = "SELECT * FROM peserta WHERE id_peserta=$id_peserta";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);

            if ($data) {
                $nama = $data['nama'];
                $instansi = $data['instansi'];
                $jurusan = $data['jurusan'];
                $no_hp = $data['no_hp'];
                $alamat = $data['alamat'];
            }
        }

        // Proses update data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_peserta = htmlspecialchars($_POST["id_peserta"]);
            $nama = input($_POST["nama"]);
            $instansi = input($_POST["instansi"]);
            $jurusan = input($_POST["jurusan"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "UPDATE peserta SET
                nama='$nama',
                instansi='$instansi',
                jurusan='$jurusan',
                no_hp='$no_hp',
                alamat='$alamat'
                WHERE id_peserta='$id_peserta'";

            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>

        <h2>Update Data Peserta Seminar</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="id_peserta" value="<?php echo htmlspecialchars($id_peserta); ?>"/>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo htmlspecialchars($nama); ?>" required/>
            </div>
            <div class="form-group">
                <label>Instansi:</label>
                <input type="text" name="instansi" class="form-control" placeholder="Masukkan Asal Instansi" value="<?php echo htmlspecialchars($instansi); ?>" required/>
            </div>
            <div class="form-group">
                <label>Jurusan:</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" value="<?php echo htmlspecialchars($jurusan); ?>" required/>
            </div>
            <div class="form-group">
                <label>No Hp:</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP" value="<?php echo htmlspecialchars($no_hp); ?>" required/>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo htmlspecialchars($alamat); ?>" required/>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
