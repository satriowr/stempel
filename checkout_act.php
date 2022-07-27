<?php
include 'koneksi.php';

session_start();

$id_customer = $_SESSION['customer_id'];

$tanggal = date('Y-m-d');

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

$provinsi = $_POST['provinsi2'];
$kabupaten = $_POST['kabupaten2'];

$kurir = $_POST['kurir'] . " - " . $_POST['service'];
$berat = $_POST['berat'];

$ongkir = $_POST['ongkir2'];

$total_bayar = $_POST['total_bayar'] + $ongkir;

mysqli_query($koneksi, "INSERT INTO invoice VALUES(NULL,'$tanggal',NULL,'$id_customer','$nama','$hp','$alamat','$provinsi','$kabupaten','$kurir','$berat','$ongkir','0','$total_bayar','0','','')") or die(mysqli_error($koneksi));

$last_id = mysqli_insert_id($koneksi);

// transaksi
$invoice = $last_id;

$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for ($a = 0; $a < $jumlah_isi_keranjang; $a++) {
    $pembayaran = $_POST['pembayaran'];
    $id_produk = $_SESSION['keranjang'][$a]['produk'];
    $jml = $_SESSION['keranjang'][$a]['jumlah'];
    $cats = $_SESSION['keranjang'][$a]['catatan'];


    $isi = mysqli_query($koneksi, "SELECT * FROM produk WHERE produk_id='$id_produk'");
    $i = mysqli_fetch_assoc($isi);

    $produk = $i['produk_id'];
    $jumlah = $_SESSION['keranjang'][$a]['jumlah'];
    $harga = $i['produk_harga'];
    $jumlahs = $i['produk_jumlah'] - $jumlah;

    if ($pembayaran == "cod") {
        mysqli_query($koneksi, "INSERT INTO transaksi VALUES(NULL,'$invoice','$produk','$jumlah','$harga','$cats')");

        $last_id1 = mysqli_insert_id($koneksi);

        mysqli_query($koneksi, "UPDATE invoice SET invoice_transaksi = '$last_id1', invoice_status = 3, cod = 1  WHERE invoice_id = '$invoice' ");

        mysqli_query($koneksi, "UPDATE produk SET produk_jumlah = '$jumlahs' WHERE produk_id = '$id_produk'");

        mysqli_query($koneksi, "INSERT INTO notifikasi VALUES(NULL, 'Ada pesanan dari $nama #$invoice', '$invoice', 0)");

        unset($_SESSION['keranjang'][$a]);
    } else {
        mysqli_query($koneksi, "INSERT INTO transaksi VALUES(NULL,'$invoice','$produk','$jumlah','$harga','$cats')");

        $last_id1 = mysqli_insert_id($koneksi);

        mysqli_query($koneksi, "UPDATE invoice SET invoice_transaksi = '$last_id1' WHERE invoice_id = '$invoice' ");

        mysqli_query($koneksi, "UPDATE produk SET produk_jumlah = '$jumlahs' WHERE produk_id = '$id_produk' ");

        mysqli_query($koneksi, "INSERT INTO notifikasi VALUES(NULL, 'Ada pesanan dari $nama #$invoice', '$invoice', 0)");

        unset($_SESSION['keranjang'][$a]);
    }
}

header("location:customer_pesanan.php?alert=sukses");
