<?php
$title = 'Laporan';
require 'functions.php';
require 'layout_header.php';

$bulan = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi WHERE status_bayar = 'dibayar' AND MONTH(tgl_bayar) = MONTH(NOW())");
$tahun = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi WHERE status_bayar = 'dibayar' AND YEAR(tgl_bayar) = YEAR(NOW())");
$minggu = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi WHERE status_bayar = 'dibayar' AND WEEK(tgl_bayar) = WEEK(NOW())");
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM tb_transaksi');

$penjualan = ambildata($conn,"SELECT SUM(tb_detail_transaksi.total_harga) AS total,COUNT(tb_detail_transaksi.id_paket) as jumlah_paket,tb_paket.nama_paket,tb_transaksi.tgl_bayar FROM tb_detail_transaksi INNER JOIN tb_transaksi ON tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi
INNER JOIN tb_paket ON tb_paket.id_paket = tb_detail_transaksi.id_paket
WHERE tb_transaksi.status_bayar = 'dibayar' GROUP BY tb_detail_transaksi.id_paket");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Laporan</b></li>
            </ol>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">PENGHASILAN TAHUN INI</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= rupiah($tahun['total']) ?></a>
                            <div class="large text-white"><i class="fas fa-chart-area"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">PENGHASILAN BULAN INI</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= rupiah($bulan['total']) ?></a>
                            <div class="large text-white"><i class="fas fa-chart-area"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">PENGHASILAN MINGGU INI</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= rupiah($minggu['total']) ?></a>
                            <div class="large text-white"><i class="fas fa-chart-area"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">TRANSAKSI</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= $jTransaksi['jumlahtransaksi'] ?></a>
                            <div class="large text-white"><i class="fas fa-shopping-cart fa-fw"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Laporan Penjualan Paket
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Paket</th>
                                    <th>Jumlah Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                 $no=1; foreach($penjualan as $transaksi): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['nama_paket'] ?></td>
                                    <td><?= $transaksi['jumlah_paket'] ?></td>
                                    <td><?= $transaksi['tgl_bayar'] ?></td>
                                    <td><?= rupiah($transaksi['total']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php 
require 'layout_footer.php';
?>