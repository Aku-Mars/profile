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
        <form id="kritikForm" method="post" action="proses.php">
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
