<?php 
require 'functions.php';

$id_paket = $_GET['id'];

$sql = "Call DeletePaket('$id_paket')";
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_paket.php?page=paket&msg=Paket Berhasil Dihapus");
}
 ?>