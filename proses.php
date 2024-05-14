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
