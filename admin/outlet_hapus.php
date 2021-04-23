<?php 
require 'functions.php';

$id_outlet = $_GET['id'];

$sql = "Call DeleteOutlet('$id_outlet')";
$exe = mysqli_query($conn,$sql);

if($exe){
	header("Location: index_outlet.php?id=outlet&msg=Outlet Berhasil Dihapus");
}else {
	header("Location: index_outlet.php?id=outlet&msg=Outlet Gagal Dihapus");
}
 ?>