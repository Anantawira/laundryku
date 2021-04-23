<?php 
require 'functions.php';

$id_jenis = $_GET['id'];

$sql = "Call DeleteKategoriPaket('$id_jenis')";
$exe = mysqli_query($conn,$sql);

if($exe){
	header("Location: index_jenis_paket.php?id=jenispaket&msg=Jenis Paket Dihapus");
}else {
	header("Location: index_jenis_paket.php?id=jenispaket&msg=Jenis Paket Gagal Dihapus");
}
 ?>