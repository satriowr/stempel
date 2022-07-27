<?php
include '../koneksi.php';
$nama = $_POST['nama'];
// $kategori_pict = $_POST['kategori_pict'];

$rand = rand();
$filename = $_FILES['kategori_pict']['name'];
if ($filename == "") {
    mysqli_query($koneksi, "INSERT into kategori values (NULL,NULL,'$nama')");
    header("location:kategori.php");

} else {
    move_uploaded_file($_FILES['kategori_pict']['tmp_name'], '../gambar/sistem/' . $rand . '_' . $filename);
    $file_gambar = $rand . '_' . $filename;
    mysqli_query($koneksi, "INSERT into kategori values (NULL,'$file_gambar','$nama')");
    header("location:kategori.php");
}
