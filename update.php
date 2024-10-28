<!DOCTYPE html>
<html>
<head>
    <title>FORM UPDATE PESERTA SEMINAR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        include "koneksi.php";

        function input($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        
        $nama = $instansi = $jurusan = $no_hp = $alamat = "";
        $id_pendaftar = null;

        
        if (isset($_GET['id_pendaftar'])) {
            $id_pendaftar = input($_GET["id_pendaftar"]);

        
            if (!empty($id_pendaftar)) {
                $stmt = $kon->prepare("SELECT * FROM peserta WHERE id_pendaftar = :id_pendaftar");
                $stmt->bindParam(':id_pendaftar', $id_pendaftar, PDO::PARAM_INT);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($data) {
                    $nama = $data['nama'];
                    $instansi = $data['instansi'];
                    $jurusan = $data['jurusan'];
                    $no_hp = $data['no_hp'];
                    $alamat = $data['alamat'];
                } else {
                    echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>ID peserta tidak valid.</div>";
            }
        }

        // Proses update data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_pendaftar = htmlspecialchars($_POST["id_pendaftar"]);
            $nama = input($_POST["nama"]);
            $instansi = input($_POST["instansi"]);
            $jurusan = input($_POST["jurusan"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            $sql = "UPDATE peserta SET
                nama = :nama,
                instansi = :instansi,
                jurusan = :jurusan,
                no_hp = :no_hp,
                alamat = :alamat
                WHERE id_pendaftar = :id_pendaftar";

            $stmt = $kon->prepare($sql);
            
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':instansi', $instansi);
            $stmt->bindParam(':jurusan', $jurusan);
            $stmt->bindParam(':no_hp', $no_hp);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':id_pendaftar', $id_pendaftar, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan: " . implode(", ", $stmt->errorInfo()) . "</div>";
            }
        }
        ?>

        <h2>Update Data Peserta Seminar</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="id_pendaftar" value="<?php echo htmlspecialchars($id_pendaftar); ?>"/>
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
