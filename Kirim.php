<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Ambil data dari form
$nama         = $_POST['Nama'];
$lokasiJemput = $_POST['Lokasi_jemput'];
$lokasiTujuan = $_POST['lokasi_tujuan'];
$tglJemput    = $_POST['tgl_jemput'];
$tglDropoff   = $_POST['tgl_dropoff'];
$waktuJemput  = $_POST['waktu_jemput'];

// Buat pesan email
$pesan = "Nama: $nama\n";
$pesan .= "Lokasi Jemput: $lokasiJemput\n";
$pesan .= "Lokasi Tujuan: $lokasiTujuan\n";
$pesan .= "Tanggal Jemput: $tglJemput\n";
$pesan .= "Tanggal Drop-off: $tglDropoff\n";
$pesan .= "Waktu Jemput: $waktuJemput\n";

// Konfigurasi PHPMailer
$mail = new PHPMailer(true);

try {
    // Pengaturan server SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'dedigusriyanto@gmail.com'; // Ganti dengan emailmu
    $mail->Password   = '12345'; // Gunakan App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Pengirim & Penerima
    $mail->setFrom('emailkamu@gmail.com', 'Penyewaan Mobil');
    $mail->addAddress('dedigusriyanto@gmail.com'); // Bisa email kamu juga

    // Konten
    $mail->isHTML(false);
    $mail->Subject = "Pemesanan Mobil Baru dari $nama";
    $mail->Body    = $pesan;

    $mail->send();
    echo 'Pesan berhasil dikirim!';
} catch (Exception $e) {
    echo "Gagal mengirim pesan. Error: {$mail->ErrorInfo}";
}
?>
