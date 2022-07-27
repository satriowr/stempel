<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "INSERT INTO supplier VALUES (NULL, '$nama','$alamat')");
header("location:supplier.php");
