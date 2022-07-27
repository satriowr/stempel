<?php 
include '../koneksi.php';

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');

$filename1 = $_FILES['gambar']['name'];

$judul = $_POST['judul'];

$keterangan = $_POST['keterangan'];



mysqli_query($koneksi, "insert into indexweb values (NULL,'','$judul','$keterangan')");


$last_id = mysqli_insert_id($koneksi);


if($filename1 != ""){
	$ext = pathinfo($filename1, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/sistem/'.$rand.'_'.$filename1);
		$file_gambar = $rand.'_'.$filename1;

		mysqli_query($koneksi,"update indexweb set indexweb_gambar='$file_gambar' where indexweb_id='$last_id'");
	}
}


header("location:web.php");