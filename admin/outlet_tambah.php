<?php
$title = 'Outlet';
require 'functions.php';

if(isset($_POST['btn-simpan'])){
    $nama   = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $telp   = $_POST['telp_outlet'];

    $query = "INSERT INTO tb_outlet (nama_outlet,alamat_outlet,telp_outlet) values ('$nama','$alamat','$telp')";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header("Location: index_outlet.php?page=outlet&msg=Outlet Berhasil Ditambahkan");
    }else{
        header("Location: index_outlet.php?page=outlet&msg=Outlet Gagal Ditambahkan");
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Outlet</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Outlet
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_outlet.php" onclick="window.history.back();" class="btn btn-primary box-title"><i
                                class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Outlet</label>
                                        <input type="text" name="nama_outlet" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Outlet</label>
                                        <textarea type="text" name="alamat_outlet" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="telp_outlet" class="form-control">
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