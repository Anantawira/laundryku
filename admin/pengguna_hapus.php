<?php 
require 'functions.php';

$id_pengguna = $_GET['id'];

$sql = "Call DeletePengguna('$id_pengguna')";
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_pengguna.php?page=pengguna&msg=Pengguna Berhasil Dihapus");
}else {
    header("Location: index_pengguna.php?page=pengguna&msg=Pengguna Gagal Dihapus");
}
 ?>