<?php 
require 'functions.php';
$sql = "DELETE FROM tb_kategori_paket WHERE id_kategori_paket = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
	header("Location: index_jenis_paket.php?id=jenispaket&msg=Jenis Paket Dihapus");
}else {
	header("Location: index_jenis_paket.php?id=jenispaket&msg=Jenis Paket Gagal Dihapus");
}
 ?>