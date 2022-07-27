<?php
include '../koneksi.php';
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$insData = json_encode($_POST['catatan']);
$keterangan = $_POST['keterangan'];
$berat = $_POST['berat'];
$jumlah = $_POST['jumlah'];
$tanggalnya = date("y-m-d");

// $columns = implode(", ",$insData);
// $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
// $catatan  = implode(", ", $escaped_values);

$rand = rand();
$allowed = array('gif', 'png', 'jpg', 'jpeg');

$filename1 = $_FILES['foto1']['name'];
$filename2 = $_FILES['foto2']['name'];
$filename3 = $_FILES['foto3']['name'];

mysqli_query($koneksi, "INSERT INTO produk VALUES ('','','$nama','$kategori','$harga','$keterangan','$jumlah','$berat',NULL,'','','','$insData','$supplier','$tanggalnya')");

$last_id = mysqli_insert_id($koneksi);

if ($filename1 != "") {
    $ext = pathinfo($filename1, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['foto1']['tmp_name'], '../gambar/produk/' . $rand . '_' . $filename1);
    $file_gambar = $rand . '_' . $filename1;

    mysqli_query($koneksi, "UPDATE produk set produk_foto1='$file_gambar' where produk_id='$last_id'");

}

if ($filename2 != "") {
    $ext = pathinfo($filename2, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['foto2']['tmp_name'], '../gambar/produk/' . $rand . '_' . $filename2);
    $file_gambar = $rand . '_' . $filename2;

    mysqli_query($koneksi, "UPDATE produk set produk_foto2='$file_gambar' where produk_id='$last_id'");

}

if ($filename3 != "") {
    $ext = pathinfo($filename3, PATHINFO_EXTENSION);

    move_uploaded_file($_FILES['foto3']['tmp_name'], '../gambar/produk/' . $rand . '_' . $filename3);
    $file_gambar = $rand . '_' . $filename3;

    mysqli_query($koneksi, "UPDATE produk set produk_foto3='$file_gambar' where produk_id='$last_id'");

}

header("location:produk.php");