<?php

use PHPMailer\PHPMailer\PHPMailer;

require "./vendor/autoload.php";
$mail = new PHPMailer(true);
//Set SMTP Options
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ),
);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
//ganti dengan email dan password yang akan di gunakan sebagai email pengirim
$mail->Username = 'ecommercealen@gmail.com';
$mail->Password = '123Admin';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
//ganti dengan email yg akan di gunakan sebagai email pengirim
$mail->setFrom('ecommercealen@gmail.com', 'Arin Aksesoris');
$mail->addAddress($_POST['email'], $_POST['nama']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Member";
$mail->Body = "Selamat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
 <a href='http://localhost/alen/activation.php?t=" . $token . "'>LINK KONFIRMASI</a>  ";
$mail->send();
echo 'Message has been sent';

// <a href='http://localhost/skripsi-dani/activation.php?t=".$token."'>http://localhost/budaya/activation.php?t=".$token."</a>