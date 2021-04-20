<?php
$title = 'Pelanggan';
require 'functions.php';

if(isset($_POST['btn-simpan'])){
    $nama           = $_POST['nama_member'];
    $alamat_member  = $_POST['alamat'];
    $no_ktp         = $_POST['no_ktp']; 
    $telp_member    = $_POST['no_tlp']; 
    $jenis_kelamin  = $_POST['jk']; 
    $query = "INSERT INTO tb_member (nama_member,alamat_member,no_ktp,telp_member,jenis_kelamin) values ('$nama','$alamat_member','$no_ktp','$telp_member','$jenis_kelamin')";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header("Location: index_pelanggan.php?id=pelanggan&msg=Pelanggan Berhasil Ditambahkan");
    }else{
        header("Location: index_pelanggan.php?id=pelanggan&msg=Pelanggan Gagal Ditambahkan");
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pelanggan</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Pelanggan
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_pelanggan.php" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nomor KTP</label>
                                        <input type="number" name="no_ktp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input type="text" name="nama_member" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea type="text" name="alamat" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="no_tlp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" class="form-control">
                                            <option></option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
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