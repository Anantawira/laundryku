<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$query = 'SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga, tb_detail_transaksi.total_bayar FROM tb_transaksi 
    INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member 
    INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi 
    WHERE tb_transaksi.id_transaksi = ' . $_GET['id'];
$data = ambilsatubaris($conn, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Status Pembayaran</b></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-body">
                            </div>
                            <div class="text-center" id="paragraf1">
                                <h3>-- Pesanan Atas Nama <b><?= $data['nama_member'] ?></b> Berhasil Di Bayar --</h3>
                                <h4>Kode Transaksi : <b><?= $data['kode_transaksi'] ?></b></h4><br>
                                <h4>Total Pembayaran : <b><?= rupiah($data['total_harga']) ?></b>
                                </h4>
                                <h4>Total Uang Bayar : <b><?= rupiah($data['total_bayar']) ?></b>
                                </h4>
                                <h4>Kembalian :
                                    <b><?= rupiah($data['total_bayar'] - $data['total_harga']) ?></b>
                                </h4>
                            </div><br>
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
</div>
</div>

</main>

<?php
require 'layout_footer.php';
?>