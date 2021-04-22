<?php
$title = 'Transaksi';
require 'functions.php';

$query = 'SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi 
    INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member 
    INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi 
    WHERE tb_transaksi.id_transaksi = ' . $_GET['id'];
$data = ambilsatubaris($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $total_bayar = $_POST['total_bayar'];
    $clear_harga = (int) filter_var($total_bayar, FILTER_SANITIZE_NUMBER_INT);
     
    if ($clear_harga >= $data['total_harga']) {
        $query = "UPDATE tb_transaksi SET status_bayar = 'dibayar',tgl_bayar = '" . Date('Y-m-d h:i:s') . "' 
            WHERE id_transaksi = " . $_GET['id'];
        $query2 = "UPDATE tb_detail_transaksi SET total_bayar = '$clear_harga' 
            WHERE id_transaksi = " . $_GET['id'];

        $execute = bisa($conn, $query);
        $execute2 = bisa($conn, $query2);

        if ($execute == 1 && $execute2 == 1) {
            echo "<script>alert('OK');</script>";
            header('Location: transaksi_telah_dibayar.php?id=' . $_GET['id']);
            exit();
        } else {
            echo "Gagal Tambah Data";
        }
    } else {
        $message = "Jumlah Uang Pembayaran Kurang";
        header('Location: transaksi_bayar.php?id=' . $_GET['id'] . '&msg=' . $message);
    }
}

include_once 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Tambah Data Transaksi</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form role="form" method="post"
                                    action="transaksi_bayar.php?id=<?= $data['id_transaksi'] ?>">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <input class="form-control" type="text" name="kode_invoice"
                                            value="<?= $data['kode_transaksi'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input class="form-control" type="text" name="nama_member"
                                            value="<?= $data['nama_member'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Yang Harus Dibayar</label>
                                        <input class="form-control" type="text" name="total_harga"
                                            value="<?= rupiah($data['total_harga']) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Masukkan Jumlah Pembayaran</label>
                                        <input class="form-control" type="text" id="rupiah" name="total_bayar">
                                        <?php if (isset($_GET['msg'])) : ?>
                                        <p class="text-danger"><?= $_GET['msg'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" name="btn-simpan">Bayar</button>
                                        <a href="transaksi_konfirmasi.php" onclick="window.history.back();">
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