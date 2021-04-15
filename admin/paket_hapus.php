<?php 
require 'functions.php';
$sql = "DELETE FROM tb_paket WHERE id_paket = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_paket.php?page=paket&msg=Paket Berhasil Dihapus");
}
 ?>