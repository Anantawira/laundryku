<?php
$title = 'Transaksi';
require 'functions.php';

$status = ['baru', 'proses', 'selesai', 'diambil'];
$query = "SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.*,tb_outlet.nama_outlet,tb_paket.nama_paket 
FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi 
ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi INNER JOIN tb_outlet ON tb_outlet.id_outlet = tb_transaksi.id_outlet 
INNER JOIN tb_paket ON tb_paket.id_outlet = tb_transaksi.id_outlet WHERE tb_transaksi.id_transaksi=" . $_GET['id'];
$data = ambilsatubaris($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $status = $_POST['status'];
    $query = "UPDATE tb_transaksi SET status = '$status' WHERE id_transaksi = " . $_GET['id'];
    $execute = bisa($conn, $query);
    if ($execute == 1) {
        header("Location: index_transaksi.php?id=transaksi&msg=Status Transaksi Berhasil Diubah");
    } else {
        header("Location: index_transaksi.php?id=transaksi&msg=Status Transaksi Gagal Diubah");
    }
}

include_once 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Transaksi</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart mr-1"></i>
                    Detail Transaksi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <input class="form-control" type="text" name="kode_invoice"
                                            value="<?= $data['kode_transaksi'] ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Outlet</label>
                                        <input class="form-control" type="text" name="outlet_id"
                                            value="<?= $data['nama_outlet'] ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Pelanggan</label>
                                        <input class="form-control" type="text" name="member_id"
                                            value="<?= $data['nama_member'] ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Paket</label>
                                        <input class="form-control" type="text" name="paket_id"
                                            value="<?= $data['nama_paket'] ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input class="form-control" type="number" name="qty" value="<?= $data['qty'] ?>"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <input class="form-control" type="text" name="total_harga"
                                            value="<?= rupiah($data['total_harga']) ?>" readonly="">
                                    </div>
                                    <?php if ($data['total_bayar'] > 0) : ?>
                                    <div class="form-group">
                                        <label>Total Bayar</label>
                                        <input class="form-control" type="text" name="total_bayar"
                                            value="<?= rupiah($data['total_bayar']) ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Di Bayar Pada Tanggal</label>
                                        <input class="form-control" type="text" name="tgl_pembayaran"
                                            value="<?= $data['tgl_bayar'] ?>" readonly="">
                                    </div>
                                    <?php else : ?>
                                    <div class="form-group">
                                        <label>Total Bayar</label>
                                        <input class="form-control" type="text" name=""
                                            value="Belum Melakukan Pembayaran" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Waktu Pembayaran</label>
                                        <input class="form-control" type="text" name="batas_waktu"
                                            value="<?= $data['batas_waktu'] ?>" readonly="">
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($data['status'] == 'diambil') : ?>
                                    <div class="form-group">
                                        <label>Status Pesanan</label>
                                        <select class="form-control" name="status" disabled>
                                            <?php foreach ($status as $key) : ?>
                                            <?php if ($key == $data['status']) : ?>
                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php else : ?>
                                    <div class="form-group">
                                        <label>Status Pesanan</label>
                                        <select class="form-control" name="status">
                                            <?php foreach ($status as $key) : ?>
                                            <?php if ($key == $data['status']) : ?>
                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= $key ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small class="text-danger">Klik Tombol Simpan Untuk Menyimpan Perubahan
                                            Transaksi</small>
                                    </div>
                                    <?php endif; ?>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="btn-simpan">Simpan</button>
                                        <a href="index_transaksi.php" onclick="window.history.back();">
                                            <button type="button" class="btn btn-danger">Kembali</button>
                                        </a>
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