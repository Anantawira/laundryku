<?php 
require 'functions.php';

$id_pelanggan = $_GET['id'];

$sql = "CAll DeletePelanggan('$id_pelanggan')";
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_pelanggan.php?page=pelanggan&msg=Pelanggan Berhasil Dihapus");
}
 ?>