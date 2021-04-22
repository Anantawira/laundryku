<?php
$title = 'Jenis Paket';
require 'functions.php';

if (isset($_POST['btn-simpan'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $query = "INSERT INTO tb_kategori_paket (nama_kategori) values ('$nama_kategori')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        header("Location: index_jenis_paket.php?id=transaksi&msg=Jenis Paket Berhasil Ditambahkan");
    } else {
        header("Location: index_jenis_paket.php?id=transaksi&msg=Jenis Paket Gagal Ditambahkan");
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Jenis Paket</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Jenis Paket
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_jenis_paket.php" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Jenis Paket</label>
                                        <input type="text" name="nama_kategori" class="form-control">
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