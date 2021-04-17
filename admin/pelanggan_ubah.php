<?php
$title = 'Pelanggan';
require 'functions.php';

$id_member = $_GET['id'];
$queryedit = "SELECT * FROM tb_member WHERE id_member = '$id_member'";
$edit = ambilsatubaris($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    $nama     = $_POST['nama_member'];
    $alamat_member = $_POST['alamat'];
    $no_ktp     = $_POST['no_ktp']; 
    $telp_member     = $_POST['no_tlp']; 
    $jenis_kelamin     = $_POST['jk']; 
    $query = "UPDATE tb_member SET nama_member = '$nama', alamat = '$alamat_member', no_ktp = '$no_ktp', tlp = '$telp_member', jenis_kelamin = '$jenis_kelamin' WHERE id_member ='$id_member'";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        header("Location: index_pelanggan.php?page=pelanggan&msg=Pelanggan Berhasil Diubah");
    }else{
        header("Location: index_pelanggan.php?page=pelanggan&msg=Pelanggan Gagal Diubah");
    }
}

require 'layout_header.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pelanggan</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Pelanggan
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
                                        <label>Nomor KTP</label>
                                        <input type="number" name="no_ktp" class="form-control"
                                            value="<?= $edit['no_ktp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input type="text" name="nama_member" class="form-control"
                                            value="<?= $edit['nama_member'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control"><?= $edit['alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="no_tlp" class="form-control"
                                            value="<?= $edit['tlp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" class="form-control">
                                            <option></option>
                                            <option value="L"
                                                <?php if($edit['jenis_kelamin']  == 'L'){echo "selected";} ?>>Laki-laki
                                            </option>
                                            <option value="P"
                                                <?php if($edit['jenis_kelamin']  == 'P'){echo "selected";} ?>>Perempuan
                                            </option>
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