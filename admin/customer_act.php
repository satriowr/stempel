<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$token = rand(1, 1000);

mysqli_query($koneksi, "INSERT INTO customer VALUES (NULL,'$nama','$email','$hp','$alamat','$password',$token,'1')");
header("location:customer.php");
