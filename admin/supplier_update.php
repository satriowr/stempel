<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$alamat = $_POST['alamat'];

	mysqli_query($koneksi, "UPDATE supplier set nama_supplier='$nama', alamat='$alamat' where id_supplier='$id'");


header("location:supplier.php");