<?php 
include '../koneksi.php';

$id  = $_POST['id'];
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');

$filename1 = $_FILES['gambar']['name'];


$judul  = $_POST['judul'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE indexweb set indexweb_judul='$judul', indexweb_konten='$keterangan', where indexweb_id='$id'");



if($filename1 != ""){
	$ext = pathinfo($filename1, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/sistem/'.$rand.'_'.$filename1);
		$file_gambar = $rand.'_'.$filename1;

		// hapus foto lama
		$lama = mysqli_query($koneksi, "SELECT * from indexweb where indexweb_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$foto = $l['indexweb_gambar'];
		unlink("../gambar/sistem/$foto");

		mysqli_query($koneksi,"UPDATE indexweb set indexweb_gambar='$file_gambar' where indexweb_id='$id'");
	}
}

header("location:web.php");