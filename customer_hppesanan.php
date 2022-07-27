<?php 
include 'koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE from invoice where invoice_id='$id'");

mysqli_query($koneksi,"DELETE from transaksi where transaksi_invoice='$id'");

header("location:customer_pesanan.php");