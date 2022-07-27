<?php 
include 'koneksi.php';

$transaksi_inv = $_POST['id_transaksi'];


$sql2 = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE transaksi_invoice = '$transaksi_inv' ");
$ulang = mysqli_num_rows($sql2);


// foreach( $id_transaksi as $key => $n ) {
//     $id_transaksi1 = $n;
//     $id_customer1 = $id_customer[$key];
//     $history_invoice1 = $history_invoice[$key];
//     $history_produk1 = $history_produk[$key];
//     $history_jumlah1 = $history_jumlah[$key];
//     $history_harga1 = $history_harga[$key];

//     $isi = mysqli_query($koneksi,"SELECT * FROM produk WHERE produk_id='$history_produk1'");
// 	$i = mysqli_fetch_assoc($isi);

//     $isi1 = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE transaksi_id='$id_transaksi1'");
// 	$i1 = mysqli_fetch_assoc($isi1);

//     $transaksis = $i1['transaksi_id'];
//     $invoices = $i1['transaksi_invoice'];
// 	$produk = $i['produk_id'];
// 	$harga = $i['produk_harga'];

    // mysqli_query($koneksi,"INSERT INTO history VALUES (NULL,'$id_transaksi1','$history_invoice1','$history_produk1','$history_jumlah1','$history_harga1')")or die(mysqli_error($koneksi));
    // mysqli_query($koneksi,"DELETE FROM transaksi WHERE transaksi_id='$id_transaksi1'")or die(mysqli_error($koneksi));
// }
// print_r(mysqli_num_rows($sql2));


for($a = 0; $a < $ulang; $a++){

    $isi = mysqli_query($koneksi,"SELECT * FROM transaksi,invoice,produk WHERE transaksi_invoice='$transaksi_inv' AND transaksi_produk=produk_id");
	$i = mysqli_fetch_assoc($isi);

    $transaksis = $i['transaksi_id'];
    $invoices = $i['transaksi_invoice'];
	$produk = $i['produk_id'];
	$harga = $i['produk_harga'];
	$jumlahs = $i['transaksi_jumlah'];
	$hargas = $i['transaksi_harga'];
	$cats = $i['transaksi_catatan'];

    mysqli_query($koneksi,"INSERT INTO history VALUES (NULL,'$transaksis','$invoices','$produk','$jumlahs','$hargas','$cats')")or die(mysqli_error($koneksi));
    mysqli_query($koneksi,"DELETE FROM transaksi WHERE transaksi_id='$transaksis'")or die(mysqli_error($koneksi));
	
}

mysqli_query($koneksi,"UPDATE invoice SET invoice_status='5' WHERE invoice_id='$transaksi_inv'");

header("location:customer_history.php?alert=upload");