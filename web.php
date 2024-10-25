<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Marsya Jilbab</title>
    <script src="../P5_dasarWeb_Marsya/praktik_jquery/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="..//P5_dasarWeb_Marsya/praktik_jquery/jquery-ui-1.14.0/jquery-ui.css">
    <script src="../P5_dasarWeb_Marsya/praktik_jquery/jquery-3.7.1.js"></script>
    <script src="../P5_dasarWeb_Marsya/praktik_jquery/jquery-ui-1.14.0/jquery-ui.js"></script>
    </script>
    <script>
        $(document).ready(function() {
            // Hide bagian katalog, tentang kami, dan comment pada awalnya
            $("#katalogSection").hide();
            $("#tentangKamiSection").hide();
            $("#commentSection").hide();
            $("#logoSection").hide();
            

            // Tampilkan bagian katalog dan comment setelah tombol next diklik
            $("#nextButton").click(function() {
                $("#welcomeSection").hide();
                $("#logoSection").show();
                $("#katalogSection").show();
                $("#tentangKamiSection").show();
                $("#commentSection").show();
            });

            // Slide toggle untuk menampilkan tabel katalog
            $("#flipKatalog").click(function() {
                $("#kotakKatalog").slideToggle("slow");
            });

            // Slide toggle untuk menampilkan bagian tentang kami
            $("#flipTentangKami").click(function() {
                $("#kotakTentangKami").slideToggle("slow");
            });

            // Slide toggle untuk menampilkan bagian comment
            $("#flipComment").click(function() {
                $("#kotakComment").slideToggle("slow");
            });

            // Untuk inisalisasi date
            $(function() {
                $("#date_ex").datepicker();
            });
        });
    </script>
</head>

<body>

    <!-- Halaman Selamat Datang -->
    <div id="welcomeSection">
        <div class="welcomeText">
            <h1>Marsya Jilbab</h1>
            <p>Halo! Selamat Datang di Marsya Jilbab</p>
            <button id="nextButton">Next</button>
        </div>
    </div>

    <!-- Logo -->
    <div id="logoSection">
        <img src="../UTS/img/1.png">
</div>



    <!-- Halaman Katalog -->
    <div id="katalogSection">
        <div id="flipKatalog">KATALOG</div>
        <div id="kotakKatalog">
            <h1>Katalog Marsya Jilbab</h1>
            <table>
                <tr>
                    <th>Picture</th>
                    <th>Nama Jilbab</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                </tr>
                <?php
                $katalogJilbab = array(
                    array("img/paris.jpeg", "Jilbab Paris Premium", "Bahan Premium", "20.000"),
                    array("img/motif.jpeg", "Jilbab Motif", "Bahan Voal", "35.000"),
                    array("img/pashmina.jpeg", "Jilbab Pashmina Kaos", "Bahan Jersey", "40.000"),
                    array("img/satin.jpeg", "Jilbab Satin", "Bahan Satin Ori", "40.000"),
                    array("img/ciput.jpeg", "Inner Ninja", "Bahan Jersey", "16.500"),
                    array("img/sport.jpeg", "Jilbab Olahraga/Sport", "Bahan Jersey Premium", "30.000"),
                    array("img/bordir.jpeg", "Jilbab Syar'i Bordir", "Bahan Wolvis", "60.000"),
                    array("img/khimar.jpeg", "Jilbab Syar'i Khimar", "Bahan Crinkle", "45.000")
                );


                foreach ($katalogJilbab as $jilbab) {
                    echo "<tr>";
                    echo "<td><img src='" . $jilbab[0] . "' width='250px'></td>";
                    echo "<td>" . $jilbab[1] . "</td>";
                    echo "<td>" . $jilbab[2] . "</td>";
                    echo "<td>" . $jilbab[3] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Halaman Tentang Kami -->
    <div id="tentangKamiSection">
        <div id="flipTentangKami">TENTANG KAMI</div>
        <div id="kotakTentangKami">
            <h1>Tentang Marsya Jilbab</h1>
            <p><strong>Marsya Jilbab</strong> adalah UMKM yang telah didirikan sejak 2016
                <br>kami menyediakan berbagai macam jilbab dengan kualitas terbaik dan harga terjangkau.
                <br>Kami selalu berusaha memberikan yang terbaik untuk pelanggan kami.
            </p>
            <img src="../UTS/img/store.jpeg" width=300px alt="left">
            <p>
                Alamat Kami : JL. Sebuku, Bunulrejo, Blimbing, Kota Malang, 65123
                <br><a href="https://www.google.com/maps/place/Marsya+Jilbab/@-7.9618423,112.645295,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd6284b3e15e62d:0xbc97ad7d9254027c!8m2!3d-7.9618476!4d112.6478699!16s%2Fg%2F11f5h8d4df?authuser=0&entry=ttu&g_ep=EgoyMDI0MTAxNi4wIKXMDSoASAFQAw%3D%3D">Klik disini</a>
                untuk melihat alamat store Marsya Jilbab di maps.<br>
            </p>
            <img src="../UTS/img/maps.jpg" width=400px alt="left">
            <p>Untuk info lebih lanjut silahkan hubungi kontak dibawah ini :
                <br><strong>Whatsapp : </strong><a href="https://api.whatsapp.com/send/?phone=6282337700758&text&type=phone_number&app_absent=0">Klik disini untuk lanjut ke chat</a>
            </p>
            <p>Media Sosial kami :
                <br><strong>Instagram : </strong><a href="https://www.instagram.com/marsyajilbab?igsh=b3NrN2Zxazl6ZWV3">Klik disini untuk melihat media sosial kami</a>
            </p>
        </div>
    </div>

    <!-- Halaman Comment -->
    <div id="commentSection">
        <div id="flipComment">KOMENTAR</div>
        <div id="kotakComment">
            <h1>Komentar Pelanggan</h1>
            <form id="commentForm">
                <b>Nama: </b><br>
                <input type="text" name="var1" SIZE="30" required>
                <br><br>

                <b>Email: </b><br>
                <input type="text" name="var2" SIZE="30" required>
                <br><br>

                <div><b>Pilih Tanggal: </b><br>
                    <input type="text" SIZE="30" id="date_ex">
                </div>
                <br><br>

                <b>Anda mengetahui Marsya Jilbab melalui?</b>
                <br>
                <input type="radio" name="var3" value="Media Sosial">Media Sosial<br>
                <input type="radio" name="var3" value="Store Langsung">Store Langsung<br>
                <input type="radio" name="var3" value="Google">Google<br><br><br>

                <b>Masukkan Komentar</b>
                <br>
                <textarea name="var4" placeholder="Berikan Komentarmu" rows="7" style="width: 100%" required></textarea>
                <br><br>
                <input type="submit" name="var5" value="Kirim">
                <input type="reset" name="var6" value="Reset">
            </form>
            <div id="thankYouMessage">
                Terima kasih atas komentar Anda!
            </div>

            <!-- Tabel untuk menampilkan komentar -->
            <div id="commentDisplay">
                <h2>Komentar Terkini</h2>
                <table id="commentTable" width="50%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Sumber Informasi</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Komentar baru akan ditambahkan di sini -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        // Menangani form submit dengan JavaScript
        document.getElementById("commentForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah form dikirim ke server

            // Ambil data dari form
            var nama = document.getElementsByName('var1')[0].value;
            var email = document.getElementsByName('var2')[0].value;
            var tanggal = document.getElementById('date_ex').value;
            var sumberInfo = document.querySelector('input[name="var3"]:checked').value;
            var komentar = document.getElementsByName('var4')[0].value;

            // Tambahkan data ke tabel
            var table = document.getElementById("commentTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            // Insert kolom baru untuk setiap data
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            // Masukkan data ke setiap kolom
            cell1.innerHTML = nama;
            cell2.innerHTML = email;
            cell3.innerHTML = tanggal;
            cell4.innerHTML = sumberInfo;
            cell5.innerHTML = komentar;

            // Sembunyikan form setelah komentar ditambahkan
            document.getElementById("commentForm").style.display = "none";

            // Tampilkan pesan terima kasih
            document.getElementById("thankYouMessage").style.display = "block";
        });


    </script>


</body>

</html>