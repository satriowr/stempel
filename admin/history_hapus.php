<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from invoice where invoice_id='$id'");

mysqli_query($koneksi,"delete from history where history_invoice='$id'");

header("location:history.php");