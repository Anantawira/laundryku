<?php
$title = 'Dashboard';
require 'functions.php';
require 'layout_header.php';

$jPengguna  = ambilsatubaris($conn,'SELECT COUNT(id_user) as jumlahpengguna FROM tb_user');
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM tb_transaksi');
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM tb_member');
$joutlet    = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM tb_outlet');
$query = "SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi ORDER BY tb_transaksi.id_transaksi DESC LIMIT 10";
$data = ambildata($conn,$query);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_pengguna.php">PENGGUNA</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white"><?= $jPengguna['jumlahpengguna'] ?></a>
                            <div class="small text-white"><i class="fas fa-user fa-fw"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_outlet.php">OUTLET</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white"><?= $joutlet['jumlahoutlet'] ?></a>
                            <div class="small text-white"><i class="fas fa-building fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_pelanggan.php">PELANGGAN</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white"><?= $jPelanggan['jumlahmember'] ?></a>
                            <div class="small text-white"><i class="fas fa-users fa-fw"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_pelanggan.php">TRANSAKSI</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white"><?= $jTransaksi['jumlahtransaksi'] ?></a>
                            <div class="small text-white"><i class="fas fa-shopping-cart fa-fw"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Transaksi Terbaru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Invoice</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                 $no=1; foreach($data as $transaksi): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['kode_invoice'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['status_bayar'] ?></td>
                                    <td><?= rupiah($transaksi['total_harga']) ?></td>
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