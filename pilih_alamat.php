<?php
include 'koneksi.php';

$id_cust = $_POST['id'];
$default = $_POST['default'];

mysqli_query($koneksi, "UPDATE customer SET alamat_default = '$default' WHERE customer_id = '$id_cust'");
header("location:customer.php?alert=berhasilupdate");
