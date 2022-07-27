<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$customer_provinsi = $_POST['customer_provinsi'];
$customer_kota = $_POST['customer_kota'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$token = hash('sha256', md5(date('Y-m-d')));

$cek_email = mysqli_query($koneksi, "SELECT * from customer where customer_email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    header("location:daftar.php?alert=duplikat");
} else {
    mysqli_query($koneksi, "insert into customer values (NULL,'$nama','$email','$hp','$customer_provinsi','$customer_kota',NULL,NULL,NULL,NULL,'$alamat',NULL,NULL,'option1','$password','$token','1','')");
    // include "mail.php";
    header("location:masuk.php?alert=terdaftar");
}
