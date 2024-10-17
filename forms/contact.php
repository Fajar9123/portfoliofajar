<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir dan melakukan sanitasi
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $to = 'mfajarudin.12@gmail.com'; // Ganti dengan alamat email Anda
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Tambahkan header Content-Type

    // Menggabungkan informasi ke dalam isi email
    $body = "Nama: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Pesan:\n$message\n";

    // Mengirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='sent-message'>Pesan Anda telah terkirim. Terima kasih!</div>";
    } else {
        echo "<div class='error-message'>Terjadi kesalahan saat mengirim pesan.</div>";
    }
} else {
    echo "<div class='error-message'>Metode pengiriman tidak valid.</div>";
}
?>
