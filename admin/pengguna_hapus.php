<?php 
require 'functions.php';
$sql = "DELETE FROM tb_user WHERE id_user = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
    header("Location: index_pengguna.php?page=pengguna&msg=Pengguna Berhasil Dihapus");
}else {
    header("Location: index_pengguna.php?page=pengguna&msg=Pengguna Gagal Dihapus");
}
 ?>