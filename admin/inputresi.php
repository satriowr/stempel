<?php
include '../koneksi.php';

$resi = $_POST['resi'];
$id_invoice = $_POST['id_invoice'];

mysqli_query($koneksi, "UPDATE invoice SET invoice_resi = '$resi' WHERE invoice_id = '$id_invoice'");

header("location:transaksi.php");
