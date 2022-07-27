<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from supplier where id_supplier='$id'");


header("location:supplier.php");
