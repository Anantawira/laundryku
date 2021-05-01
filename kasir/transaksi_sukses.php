<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$tgl_sekarang = Date('Y-m-d h:i:s');
$penjualan = ambildata($conn,'SELECT * FROM tb_transaksi INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_paket ON tb_paket.id_paket = tb_detail_transaksi.id_paket WHERE tb_transaksi.id_transaksi = '. $_GET['id']);

$query = 'SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi 
    INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member 
    INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi 
    WHERE tb_transaksi.id_transaksi = ' . $_GET['id'];
$data = ambilsatubaris($conn, $query);

$query2 = "SELECT *, tb_outlet.* FROM tb_user INNER JOIN tb_outlet ON tb_outlet.id_outlet = tb_user.id_outlet WHERE tb_outlet.id_outlet = " . $_SESSION['id_outlet'];
$data2 = ambildata($conn, $query2);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pilih Data Pelanggan</b></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-body">
                            </div>
                            <div class="text-center">
                                <h3 id="paragraf1">-- Pesanan Atas Nama <b><?= $data['nama_member'] ?>
                                    </b>Berhasil
                                    Di
                                    Simpan --</h3>
                                <h4 id="paragraf1">Kode Transaksi : <b><?= $data['kode_transaksi'] ?></b>
                                </h4>
                                <h4 id="paragraf1">Total Pembayaran :
                                    <b><?= rupiah($data['total_harga']) ?></b>
                                </h4>
                            </div><br>
                            <div class="text-center">
                                <button type="button" value="print" onclick="PrintDiv();" class="btn btn-secondary"><i
                                        class="fa fa-print fa-fw"></i> Cetak Bukti Transaksi
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="index_transaksi.php"><button type="button" class="btn btn-primary"><i
                                            class="fa fa-arrow-left fa-fw"></i> Kembali Ke Menu
                                        Utama</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="divToPrint" style="display:none;">
            <div style="width: 500px; margin: auto;">
                <br>
                <center>
                    <b>NOTA TRANSAKSI LAUNDRYKU</b><br>
                    <?php foreach ($data2 as $get) : ?>
                    <b>"<?=  $get['nama_outlet'] ?>"</b><br>
                    <?=  $get['alamat_outlet'] ?><br>
                    Telp. <?= $get['telp_outlet'] ?>
                    <?php endforeach; ?><br><br><br>
                    <table width="100%">
                        <tr>
                            <td>User : <?= $get['nama_user'] ?></td>
                            <td align="right"><?= $data['tgl_transaksi'] ?></td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td width="23%" align="left">
                                Kode Transaksi
                            </td>
                            <td width="76%" align="left">
                                : <?= $data['kode_transaksi'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="23%" align="left">
                                Atas Nama
                            </td>
                            <td width="76%" align="left">
                                : <?= $data['nama_member'] ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td>Nama Paket</td>
                            <td align="center">Qty</td>
                            <td align="right">Harga</td>
                        </tr>
                        <?php $no = 1;
                        foreach ($penjualan as $transaksi) : ?>
                        <tr>
                            <td><?= $transaksi['nama_paket'] ?></td>
                            <td align="center"><?= $transaksi['qty'] ?></td>
                            <td align="right"><?= rupiah($transaksi['harga_paket']*$transaksi['qty'])  ?></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td width="76%" align="right">
                                Biaya Tambahan :
                            </td>
                            <td width="23%" align="right">
                                <?= rupiah($transaksi['biaya_tambahan']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="76%" align="right">
                                Diskon :
                            </td>
                            <td width="23%" align="right">
                                <?= rupiah($transaksi['diskon']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="76%" align="right">
                                Pajak :
                            </td>
                            <td width="23%" align="right">
                                <?= rupiah($transaksi['pajak']) ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td width="76%" align="right">
                                Total Pembayaran :
                            </td>
                            <td width="23%" align="right">
                                <?= rupiah($transaksi['total_harga']) ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <td></td>
                            <td align="right">
                                Total Bayar :
                            </td>
                            <td align="right">
                                Belum dibayar
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right">
                                Batas Waktu Pembayaran :
                            </td>
                            <td align="right">
                                <?= $data['batas_waktu'] ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <?php foreach ($penjualan as $get) : ?>
                        <tr>
                            <td><i>Catatan : <?= $get['keterangan'] ?></i></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <br>
                    Terima Kasih <br>
                    Laundryku
                </center>
            </div>
        </div>


</div>
</div>

</main>

<?php
require 'layout_footer.php';
?>