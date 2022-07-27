<?php
include 'koneksi.php';

$id_cust = $_POST['id'];
$provinsi = $_POST['customer_provinsi'];
$kota = $_POST['customer_kota'];
$alamat = $_POST['customer_alamat'];

$sql2 = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_id = '$id_cust' AND customer_provinsi2 IS NULL AND customer_kota2 IS NULL");
$cek_alamat2 = mysqli_num_rows($sql2);

$sql3 = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_provinsi3 IS NULL AND customer_kota3 IS NULL AND customer_id = '$id_cust'");
$cek_alamat3 = mysqli_num_rows($sql3);

if ($cek_alamat2 > 0) {
    mysqli_query($koneksi, "UPDATE customer SET customer_provinsi2 = '$provinsi', customer_kota2 = '$kota', customer_alamat2 = '$alamat' WHERE customer_id = '$id_cust'");
    header("location:customer.php?alert=berhasiltambah2");
} elseif ($cek_alamat2 < 1 && $cek_alamat3 > 0) {
    mysqli_query($koneksi, "UPDATE customer SET customer_provinsi3 = '$provinsi', customer_kota3 = '$kota', customer_alamat3 = '$alamat' WHERE customer_id = '$id_cust'");
    header("location:customer.php?alert=berhasiltambah3");
} else {
    header("location:customer.php?alert=gagalgagal");
}
