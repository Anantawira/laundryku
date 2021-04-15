<?php
$title = 'Paket';
require 'functions.php';

$query = 'SELECT * FROM tb_outlet';
$data = ambildata($conn,$query);

if(isset($_POST['btn-simpan'])){
    $nama        = $_POST['nama_paket'];
    $jenis_paket = $_POST['jenis_paket'];
    $harga       = $_POST['harga'];
    $outlet_id   = $_POST['id_outlet'];

    $query = "INSERT INTO tb_paket (id_outlet,jenis_paket,nama_paket,harga) values ('$outlet_id','$jenis_paket','$nama','$harga')";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header("Location: index_paket.php?page=paket&msg=Paket Berhasil Ditambahkan");
    }else{
        header("Location: index_paket.php?page=paket&msg=Paket Gagal Ditambahkan");
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Paket</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Paket
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
                                        <label>Nama Paket</label>
                                        <input type="text" name="nama_paket" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Paket</label>
                                        <select name="jenis_paket" class="form-control">
                                            <option></option>
                                            <option value="kiloan">Kiloan</option>
                                            <option value="selimut">Selimut</option>
                                            <option value="bedcover">Bedcover</option>
                                            <option value="kaos">Kaos</option>
                                            <option value="lain">Lain</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Outlet</label>
                                        <select name="id_outlet" class="form-control">
                                            <option></option>
                                            <?php foreach ($data as $outlet): ?>
                                            <option value="<?= $outlet['id_outlet'] ?>"><?= $outlet['nama_outlet']; ?>
                                            </option>
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