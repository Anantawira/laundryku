<?php
$title = 'Pengguna';
require 'functions.php';

$role = ['admin','owner','kasir'];

$id_user = $_GET['id'];

$queryedit = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
$edit = ambilsatubaris($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    $nama     = $_POST['nama_user'];
    $username = $_POST['username'];
    $role     = $_POST['role'];
    $id_outlet = $_POST['id_outlet'];
    if($_POST['password'] != null || $_POST['password'] == ''){
        $pass     = md5($_POST['password']);
        $query = "UPDATE tb_user SET nama_user = '$nama' , username = '$username' , role = '$role' , password ='$pass', id_outlet = '$id_outlet' WHERE id_user = '$id_user'";    
    }else{
        $query = "UPDATE tb_user SET nama_user = '$nama' , username = '$username' , role = '$role' ,  id_outlet = '$id_outlet' WHERE id_user = '$id_user'";
    }
    
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header('Location: index_pengguna.php?page=pengguna&msg=Pengguna Berhasil Diubah');
    }else{
        header('Location: index_pengguna.php?page=pengguna&msg=Pengguna Gagal Diubah');
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pengguna</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-cog mr-1"></i>
                    Ubah Pengguna
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_pengguna.php" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" name="nama_user" class="form-control"
                                            value="<?= $edit['nama_user'] ?>">
                                    </div>
                                    <div class=" form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="<?= $edit['username'] ?>">
                                    </div>
                                    <div class=" form-group">
                                        <label>Password*</label>
                                        <input type="text" name="password" class="form-control">
                                        <small class="text-danger">*Kosongkan saja jika tidak akan mengubah
                                            password</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role" name="role" class="form-control">
                                            <option></option>
                                            <?php foreach ($role as $key): ?>
                                            <?php if ($key == $edit['role']): ?>
                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    </main>

    <?php
require'layout_footer.php';
?>