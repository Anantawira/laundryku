<?php
$title = 'Outlet';
require 'functions.php';
require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Outlet</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Outlet
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
                                        <label>Nama Outlet</label>
                                        <input type="text" name="nama_user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Outlet</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="password" class="form-control">
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