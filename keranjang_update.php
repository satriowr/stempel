<?php
include 'koneksi.php';

$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$cats = $_POST['catatan'];

session_start();
$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for($a = 0;$a < $jumlah_isi_keranjang; $a++){

	$_SESSION['keranjang'][$a] = array(
		'produk' => $produk[$a],
		'jumlah' => $jumlah[$a],
		'catatan' => $cats[$a],


	);

}

header("location:keranjang.php");
