<?php
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];

$rand = rand();
$filename = $_FILES['kategori_pict']['name'];
if ($filename == "") {
    mysqli_query($koneksi, "UPDATE kategori set kategori_nama='$nama' where kategori_id='$id'");
    header("location:kategori.php");
} else {
    move_uploaded_file($_FILES['kategori_pict']['tmp_name'], '../gambar/sistem/' . $rand . '_' . $filename);
    $x = $rand . '_' . $filename;
    mysqli_query($koneksi, "UPDATE kategori set kategori_nama='$nama', kategori_pict='$x' where kategori_id='$id'");
    header("location:kategori.php");
}
