<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">PELATIHAN SEMINAR</span>
    </nav>
    <div class="container">
        <br>
        <h4>PESERTA PELATIHAN SEMINAR</h4>

        <?php
        include "koneksi.php";

        if (isset($_GET['id_peserta'])) {
            $id_peserta = htmlspecialchars($_GET['id_peserta']);

            $sql = "DELETE FROM peserta WHERE id_peserta='$id_peserta'";

            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
            }
        }
        ?>

        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM peserta ORDER BY id_peserta DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;

                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                        <td><?php echo htmlspecialchars($data["instansi"]); ?></td>
                        <td><?php echo htmlspecialchars($data["jurusan"]); ?></td>
                        <td><?php echo htmlspecialchars($data["no_hp"]); ?></td>
                        <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                        <td>
                            <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="create.php" class="btn btn-primary " role="button">Tambah Data</a>
    </div>
</body>
</html>
