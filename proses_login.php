<?php 
session_start();
$conn = mysqli_connect('localhost','root','','laundryku');

$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);

if ($cek > 0) {
    if ($data['role'] == 'admin') 
        {
            $_SESSION['role'] = 'admin';
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['id_outlet'] = $data['id_outlet'];
            header('Location: admin');
    }
    else if ($data['role'] == 'kasir') 
        {
            $_SESSION['role'] = 'kasir';
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['id_outlet'] = $data['id_outlet'];
            header('Location: kasir/index_pelanggan.php');
    }
    else if ($data['role'] == 'owner') 
        {
            $_SESSION['role'] = 'owner';
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['id_outlet'] = $data['id_outlet'];
            header('Location: owner');
    }
}else 
    {
        $msg = 'Username atau Password Salah';
        header('Location: index.php?msg='.$msg);
    }
?>