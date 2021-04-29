<?php
$title = 'Dashboard';
require 'functions.php';
require 'layout_header.php';

$jPengguna  = ambilsatubaris($conn,'SELECT COUNT(id_user) as jumlahpengguna FROM tb_user');
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM tb_transaksi');
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM tb_member');
$joutlet    = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM tb_outlet');
$query = "Call GetTransaksiTerbaru()";
$data = ambildata($conn,$query);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Dashboard</b></li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_pengguna.php">PENGGUNA</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= $jPengguna['jumlahpengguna'] ?></a>
                            <div class="large text-white"><i class="fas fa-user fa-fw"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_outlet.php">OUTLET</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= $joutlet['jumlahoutlet'] ?></a>
                            <div class="large text-white"><i class="fas fa-building fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_pelanggan.php">PELANGGAN</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="large text-white"><?= $jPelanggan['jumlahmember'] ?></a>
                            <div class="large text-white"><i class="fas fa-users fa-fw"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><a class="text-white" href="index_transaksi.php">TRANSAKSI</a></div>
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
                    Data Transaksi Terbaru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th width="4%">#</th>
                                    <th>Kode Transaksi</th>
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
                                    <td><?= $transaksi['kode_transaksi'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>

                                    <?php if ($transaksi['status'] == 'baru') : ?>
                                    <td align="center"><label class="p-1 bg-warning text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status'] ?></label>
                                    </td>
                                    <?php elseif ($transaksi['status'] == 'proses') : ?>
                                    <td align="center"><label class="p-1 bg-primary text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status'] ?></label>
                                    </td>
                                    <?php elseif ($transaksi['status'] == 'selesai') : ?>
                                    <td align="center"><label class="p-1 bg-secondary text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status'] ?></label>
                                    </td>
                                    <?php elseif ($transaksi['status'] == 'diambil') : ?>
                                    <td align="center"><label class="p-1 bg-success text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status'] ?></label>
                                    </td>
                                    <?php endif; ?>

                                    <?php if ($transaksi['status_bayar'] == 'dibayar') : ?>
                                    <td align="center"><label class="p-1 bg-success text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status_bayar'] ?></label>
                                    </td>
                                    <?php else : ?>
                                    <td align="center"><label class="p-1 bg-danger text-white"
                                            style="border-radius: 3px;"><?= $transaksi['status_bayar'] ?></label>
                                    </td>
                                    <?php endif; ?>

                                    <td align="right"><?= rupiah($transaksi['total_harga']) ?></td>
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