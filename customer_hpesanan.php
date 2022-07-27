<?php 
include 'koneksi.php';
$id = $_GET['id'];


$sql2 = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE transaksi_invoice = '$id' ");
$ulang = mysqli_num_rows($sql2);

for($a = 0; $a < $ulang; $a++){

    $isi = mysqli_query($koneksi,"SELECT * FROM transaksi,invoice,produk WHERE transaksi_invoice='$id' AND transaksi_produk=produk_id");
	$i = mysqli_fetch_assoc($isi);

   

    $transaksis = $i['transaksi_id'];
    $invoices = $i['transaksi_invoice'];
	$produk = $i['produk_id'];
	$harga = $i['produk_harga'];
	$jumlahs = $i['transaksi_jumlah'];
	$hargas = $i['transaksi_harga'];
	$cats = $i['transaksi_catatan'];


    $isi1 = mysqli_query($koneksi,"SELECT * FROM produk WHERE produk_id='$produk'");
	$i1 = mysqli_fetch_assoc($isi1);

	$jumlahsd = $i1['produk_jumlah'] + $jumlahs;

    mysqli_query($koneksi,"UPDATE produk SET produk_jumlah='$jumlahsd' WHERE produk_id='$produk'")or die(mysqli_error($koneksi));
    mysqli_query($koneksi,"INSERT INTO history VALUES (NULL,'$transaksis','$invoices','$produk','$jumlahs','$hargas','$cats')")or die(mysqli_error($koneksi));
    mysqli_query($koneksi,"DELETE FROM transaksi WHERE transaksi_id='$transaksis'")or die(mysqli_error($koneksi));
	
}

$isi2 = mysqli_query($koneksi,"SELECT * FROM transaksi,invoice,produk WHERE transaksi_invoice='$id' AND transaksi_produk=produk_id");
$i2 = mysqli_fetch_assoc($isi2);
$cancel_trans = $i2['transaksi_id'];
mysqli_query($koneksi,"UPDATE invoice SET invoice_bukti='$file_gambar', invoice_status='6', invoice_transaksi='$cancel_trans' WHERE invoice_id='$id'")or die(mysqli_error($koneksi));

header("location:customer_history.php?alert=upload");
