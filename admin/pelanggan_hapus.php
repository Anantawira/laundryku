<?php 
require 'functions.php';
$sql = "DELETE FROM tb_member WHERE id_member = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_pelanggan.php?page=pelanggan&msg=Pelanggan Berhasil Dihapus");
}
 ?>