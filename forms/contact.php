<?php
// Set email penerima
$receiving_email_address = 'mfajarudin.12@gamil.com'; // Ganti dengan email tujuan Anda

// Jika Anda ingin menggunakan library PHP-Email-Form, pastikan Anda telah menginstalnya dan mengimpornya di sini.
// Contoh: require_once 'php-email-form/php-email-form.php';

// Data form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Siapkan email
$to = $receiving_email_address;
$email_subject = "Pesan dari Form Kontak: " . $subject;
$email_body = "Anda menerima pesan baru dari form kontak di website Anda.\n\n" .
              "Berikut detailnya:\n\n" .
              "Nama: " . $name . "\n" .
              "Email: " . $email . "\n" .
              "Subjek: " . $subject . "\n" .
              "Pesan:\n" . $message;

$headers = "From: " . $name . " <" . $email . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";

// Kirim email
if (mail($to, $email_subject, $email_body, $headers)) {
    // Berhasil
    echo json_encode(['success' => 'true', 'message' => 'Pesan Anda telah terkirim. Terima kasih!']);
} else {
    // Gagal
    echo json_encode(['success' => 'false', 'message' => 'Terjadi kesalahan saat mengirim pesan.']);
}
?>