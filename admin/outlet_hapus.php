<?php 
require 'functions.php';
$sql = "DELETE FROM tb_outlet WHERE id_outlet = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
	header("Location: index_outlet.php?id=outlet&msg=Outlet Berhasil Dihapus");
}else {
	header("Location: index_outlet.php?id=outlet&msg=Outlet Gagal Dihapus");
}
 ?>