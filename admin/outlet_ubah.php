<?php
$title = 'Outlet';
require 'functions.php';

$query = 'SELECT tb_outlet.*, tb_user.nama_user,tb_user.id_user FROM tb_outlet 
    LEFT JOIN tb_user ON tb_user.id_outlet = tb_outlet.id_outlet WHERE tb_outlet.id_outlet = ' . $_GET['id'];
$data = ambilsatubaris($conn, $query);

$query2 = 'SELECT tb_user.*,tb_outlet.nama_outlet FROM tb_outlet 
    RIGHT JOIN tb_user ON tb_user.id_outlet = tb_outlet.id_outlet WHERE tb_user.role = "owner" 
    ORDER BY tb_user.id_outlet asc';
$data2 = ambildata($conn, $query2);

if (isset($_POST['btn-simpan'])) {
    $nama   = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $telp   = $_POST['telp_outlet'];

    $query = "UPDATE tb_outlet SET nama_outlet = '$nama' , alamat_outlet = '$alamat' , telp_outlet='$telp' WHERE id_outlet = " . $_GET['id'];

    if ($_POST['owner_id_new']) {
        $query2 = "UPDATE tb_user SET id_outlet = '" . $_GET['id'] . "' WHERE id_user = " . $_POST['owner_id_new'];
        $query3 = "UPDATE tb_user SET id_outlet = NULL WHERE id_user = " . $data['id_user'];
        $execute3 = bisa($conn, $query3);
    } else {
        $query2 = "UPDATE tb_user SET id_outlet = '" . $_GET['id'] . "' WHERE id_user = " . $_POST['owner_id'];
    }

    $execute = bisa($conn, $query);
    $execute2 = bisa($conn, $query2);

    if ($execute == 1 && $execute2 == 1) {
        header("Location: index_outlet.php?page=outlet&msg=Outlet Berhasil Diubah");
    } else {
        header("Location: index_outlet.php?page=outlet&msg=Outlet Gagal Diubah");
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
                    <i class="fas fa-cog mr-1"></i>
                    Ubah Outlet
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
                                        <input type="text" name="nama_outlet" class="form-control"
                                            value="<?= $data['nama_outlet']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Outlet</label>
                                        <textarea type="text" name="alamat_outlet"
                                            class="form-control"><?= $data['alamat_outlet']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="telp_outlet" class="form-control"
                                            value="<?= $data['telp_outlet']; ?>">
                                    </div>
                                    <?php if($data['nama_user']  == null): ?>
                                    <div class="form-group">
                                        <label>Belum Ada Owner (silahkan pilih owner)</label>
                                        <select name="owner_id" class="form-control">
                                            <?php foreach ($data2 as $owner): ?>
                                            <option value="<?= $owner['id_user'] ?>"><?= $owner['nama_user'] ?>
                                                <?php if ($owner['id_outlet'] == null): ?>
                                                ( Belum memiliki outlet )
                                                <?php else: ?>
                                                ( Owner di <?= $owner['nama_outlet'] ?> )
                                                <?php endif ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label>Owner Sekarang : <?= $data['nama_user']; ?></label>
                                        <select name="owner_id_new" class="form-control">
                                            <option class="">Pilih Untuk Mengganti owner</option>
                                            <?php foreach ($data2 as $owner): ?>
                                            <option value="<?= $owner['id_user'] ?>"><?= $owner['nama_user'] ?>
                                                <?php if ($owner['id_outlet'] == null): ?>
                                                ( Belum memiliki outlet )
                                                <?php else: ?>
                                                ( Owner di <?= $owner['nama_outlet'] ?> )
                                                <?php endif ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
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