<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$tgl_sekarang = Date('Y-m-d h:i:s');
$tujuh_hari   = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$batas_waktu  = date("Y-m-d h:i:s", $tujuh_hari);

$invoice   = 'TRX' . Date('Ymdsi');
$outlet_id = $_SESSION['id_outlet'];
$user_id   = $_SESSION['id_user'];
$member_id = $_GET['id'];

$outlet = ambilsatubaris($conn, 'SELECT nama_outlet from tb_outlet WHERE id_outlet = ' . $outlet_id);
$member = ambilsatubaris($conn, 'SELECT nama_member from tb_member WHERE id_member = ' . $member_id);
$paket = ambildata($conn, 'SELECT * FROM tb_paket WHERE id_outlet = ' . $outlet_id);

if (isset($_POST['btn-simpan'])) {
    $kode_invoice   = $_POST['kode_transaksi'];
    $biaya_tambahan = $_POST['biaya_tambahan'];
    $biaya_clear    = (int) filter_var($biaya_tambahan, FILTER_SANITIZE_NUMBER_INT);
    $diskon         = $_POST['diskon'];
    $diskon_clear    = (int) filter_var($diskon, FILTER_SANITIZE_NUMBER_INT);
    // $pajak          = $_POST['pajak'];
    // $pajak_clear    = (int) filter_var($pajak, FILTER_SANITIZE_NUMBER_INT);

    $query = "INSERT INTO tb_transaksi (id_outlet,kode_transaksi,id_member,tgl_transaksi,batas_waktu,biaya_tambahan,diskon,pajak,status,status_bayar,id_user) 
        VALUES ('$outlet_id','$kode_invoice','$member_id','$tgl_sekarang','$batas_waktu','$biaya_clear','$diskon_clear','500','baru','belum','$user_id')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $paket_id = $_POST['paket_id'];
        $qty = $_POST['qty'];
        $keterangan = $_POST['keterangan'];
        $hargapaket = ambilsatubaris($conn, 'SELECT harga_paket from tb_paket WHERE id_paket = ' . $paket_id);
        $total_harga = $hargapaket['harga_paket'] * $qty + $biaya_clear + '500' - $diskon_clear;
        $kode_invoice;
        $transaksi = ambilsatubaris($conn, "SELECT * FROM tb_transaksi WHERE kode_transaksi = '" . $kode_invoice . "'");
        $transaksi_id = $transaksi['id_transaksi'];

        $sqlDetail = "INSERT INTO tb_detail_transaksi (id_transaksi,id_paket,qty,total_harga,keterangan) 
            VALUES ('$transaksi_id','$paket_id','$qty','$total_harga','$keterangan')";

        $executeDetail = bisa($conn, $sqlDetail);
        if ($executeDetail == 1) {
            header('Location: transaksi_sukses.php?id=' . $transaksi_id);
        } else {
            header("Location: transaksi_tambah.php?page=transaksi&msg=Transaksi Gagal");
        }
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Tambah Data Transaksi</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-shopping-cart mr-1"></i>
                    Tambah Transaksi
                </div>

                <?php 
                    if (isset($_GET['msg'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Pesan:</strong> <?php echo $_GET['msg']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>

                <!-- <div class="card mb-4"> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Kode Transaksi</label>
                                                <input class="form-control" type="text" name="kode_transaksi"
                                                    value="<?= $invoice ?>" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>Outlet</label>
                                                <input class="form-control" type="text" name="id_outlet"
                                                    value="<?= $outlet['nama_outlet'] ?>" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>Pelanggan</label>
                                                <input class="form-control" type="text" name="id_member"
                                                    value="<?= $member['nama_member'] ?>" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Paket</label>
                                                <select class="form-control" name="paket_id">
                                                    <option></option>
                                                    <?php foreach ($paket as $key) : ?>
                                                    <option value="<?= $key['id_paket'] ?>"><?= $key['nama_paket'];  ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input class="form-control" type="number" name="qty">
                                            </div>
                                            <div class="form-group">
                                                <label>Biaya Tambahan</label>
                                                <input class="form-control rupiah" type="text" name="biaya_tambahan">
                                            </div>
                                            <div class="form-group">
                                                <label>Diskon</label>
                                                <input class="form-control rupiah" type="text" name="diskon">
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea type="text" name="keterangan" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="btn-simpan">Simpan</button>
                                        <a href="transaksi_cari_pelanggan.php" onclick="window.history.back();">
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