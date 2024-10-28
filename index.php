<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Peserta Seminar</title>
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

        if (isset($_GET['id_pendaftar'])) {
            $id_pendaftar = htmlspecialchars($_GET['id_pendaftar']);
            $sql = "DELETE FROM peserta WHERE id_pendaftar=?";
            $stmt = $kon->prepare($sql);
            $hasil = $stmt->execute([$id_pendaftar]);

            if ($hasil) {
                header("Location: index.php");
                exit();
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
                $sql = "SELECT * FROM peserta ORDER BY id_pendaftar DESC";
                $stmt = $kon->prepare($sql);
                $stmt->execute();
                $no = 0;

                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                            <a href="update.php?id_pendaftar=<?php echo htmlspecialchars($data['id_pendaftar']); ?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_pendaftar=<?php echo htmlspecialchars($data['id_pendaftar']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>
</html>
