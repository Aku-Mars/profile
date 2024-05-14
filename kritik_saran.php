<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kritik = $_POST['kritik'];
    $saran = $_POST['saran'];

    $to = "marifinsyam73@gmail.com";
    $subject = "Kritik & Saran dari $nama";
    $message = "Nama: $nama\n\n";
    $message .= "Email: $email\n\n";
    $message .= "Kritik:\n$kritik\n\n";
    $message .= "Saran:\n$saran";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Pesan berhasil dikirim. Terima kasih atas kritik dan sarannya!');</script>";
    } else {
        echo "<script>alert('Pesan gagal dikirim. Mohon coba lagi.');</script>";
    }
}
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
</head>
<body>
    <header>
        <h1>Kritik & Saran</h1>
    </header>

    <div class="container">
        <form id="kritikForm">
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

    <footer>
        <hr>
        <a href="index.html" class="button-elegan">Kembali ke Profile</a>
    </footer>
</body>
</html>
