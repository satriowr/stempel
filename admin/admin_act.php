<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$role  = $_POST['role'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "INSERT into admin values (NULL,'$role','$nama','$username','$password','')");
	header("location:admin.php");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "INSERT into admin values (NULL,'$role','$nama','$username','$password','$file_gambar')");
		header("location:admin.php");
	}
}

