<?php
$title = 'Paket';
require 'functions.php';

$id_paket   = $_GET['id'];
$queryedit  = "SELECT * FROM tb_paket WHERE id_paket = '$id_paket'";
$edit = ambilsatubaris($conn,$queryedit);

$query = 'SELECT * FROM tb_outlet';
$data = ambildata($conn,$query);

$query2 = 'SELECT * FROM tb_kategori_paket';
$data2 = ambildata($conn, $query2);

if(isset($_POST['btn-simpan'])){
    $nama           = $_POST['nama_paket'];
    $id_jenis       = $_POST['id_jenis_paket'];
    $harga          = $_POST['harga'];
    $clear_harga    = (int) filter_var($harga, FILTER_SANITIZE_NUMBER_INT); 
    $outlet_id      = $_POST['id_outlet'];

    $query = "UPDATE tb_paket SET nama_paket = '$nama', id_kategori_paket = '$id_jenis', harga_paket = '$clear_harga', id_outlet = '$outlet_id' WHERE id_paket = '$id_paket'";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header("Location: index_paket.php?page=paket&msg=Paket Berhasil Diubah");
    }else{
        header("Location: index_paket.php?page=paket&msg=Paket Gagal Diubah");
    }
}

require 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Paket</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-cog mr-1"></i>
                    Ubah Paket
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_paket.php" onclick="window.history.back();" class="btn btn-primary box-title"><i
                                class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Paket</label>
                                        <input type="text" name="nama_paket" class="form-control"
                                            value="<?= $edit['nama_paket'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Paket</label>
                                        <select class="form-control" name="id_jenis_paket">
                                            <?php foreach ($data2 as $jenispaket) : ?>
                                            <?php if ($jenispaket['id_kategori_paket'] == $edit['id_kategori_paket']) : ?>
                                            <option value="<?= $jenispaket['id_kategori_paket'] ?>" selected>
                                                <?= $jenispaket['nama_kategori']; ?></option>
                                            <?php endif ?>
                                            <option value="<?= $jenispaket['id_kategori_paket'] ?>">
                                                <?= $jenispaket['nama_kategori']; ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" id="rupiah" class="form-control"
                                            value="<?= rupiah($edit['harga_paket']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Outlet</label>
                                        <select name="id_outlet" class="form-control">
                                            <?php foreach ($data as $outlet) : ?>
                                            <?php if ($outlet['id_outlet'] == $edit['id_outlet']) : ?>
                                            <option value="<?= $outlet['id_outlet'] ?>" selected>
                                                <?= $outlet['nama_outlet']; ?></option>
                                            <?php endif ?>
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
            </div>
    </main>


    <?php
require'layout_footer.php';
?>