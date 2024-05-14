<?php
// Koneksi ke database (ganti dengan informasi koneksi database Anda)
$servername = "localhost";
$username = "admin";
$password = "SOK1PSTIC";
$dbname = "kritik_saran_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kritik = $_POST['kritik'];
    $saran = $_POST['saran'];

    // Masukkan data ke database
    $sql = "INSERT INTO kritik_saran (nama, email, kritik, saran)
    VALUES ('$nama', '$email', '$kritik', '$saran')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan ke database. Terima kasih atas kritik dan sarannya!');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Mohon coba lagi.');</script>";
    }
}

// Ambil data dari database
$sql = "SELECT * FROM kritik_saran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Profile">
    <meta property="og:description" content="Deskripsi singkat mengenai profile pembuat website">
    <meta property="og:image" content="https://raw.githubusercontent.com/Aku-Mars/gambar/main/bannercp.png">
    <meta property="og:url" content="https://akumars.dev/">    
    <title>Kritik & Saran</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://raw.githubusercontent.com/Aku-Mars/gambar/main/neko.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>
<body>
    <header>
        <h1>Kritik & Saran</h1>
    </header>

    <div class="container">
        <form id="kritikForm" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="kritik">Kritik:</label>
            <textarea id="kritik" name="kritik" required></textarea>

            <label for="saran">Saran:</label>
            <textarea id="saran" name="saran"></textarea>

            <input type="submit" value="Submit" class="button-elegan">
        </form>
    </div>

    <div class="container">
        <h1>Apa Kata Kalian?</h1>
        <?php
        // Tampilkan data dari database dengan efek animasi AOS
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card" data-aos="zoom-in-up" data-aos-duration="1500">';
                echo '<h2>' . $row['nama'] . '</h2>';
                echo '<p>Email: ' . $row['email'] . '</p>';
                echo '<p>Kritik: ' . $row['kritik'] . '</p>';
                echo '<p>Saran: ' . $row['saran'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Tidak ada data kritik & saran.</p>';
        }
        $conn->close();
        ?>
    </div>

    <footer>
        <hr>
        <a href="index.html" class="button-elegan">Kembali ke Profile</a>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
