<?php 
include 'koneksi.php';
$idpro = $_POST['idpro'];
$namapro = $_POST['namapro'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$ulasan = $_POST['isi'];
$rating = $_POST['rating'];

	mysqli_query($koneksi, "INSERT INTO ulasan 
		(ulasan_id,ulasan_idproduk,ulasan_namapro,ulasan_tanggal,ulasan_jam,ulasan_nama,ulasan_email,ulasan_isi,ulasan_rating) VALUES 
		(NULL,'$idpro','$namapro','$tanggal','$waktu','$nama','$email','$ulasan','$rating')");
	header("location:produk.php?alert=suksesrating");
