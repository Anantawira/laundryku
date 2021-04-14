<?php
$title = 'Pengguna';
require 'functions.php';
require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Pengguna
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="javascript:void(0)" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" name="nama_pengguna" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="owner">Owner</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jika Role Nya Kasir Maka Pilih Outlet Dimana Dia Akan Ditempatkan</label>
                                        <select name="outlet_id" class="form-control">
                                            <?php foreach ($outlet as $key): ?>
                                            <option value="<?= $key['id_outlet'] ?>"><?= $key['nama_outlet'] ?></option>
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