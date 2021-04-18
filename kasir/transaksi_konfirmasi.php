<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$query = "SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi 
    INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member 
    INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi 
    WHERE tb_transaksi.status_bayar='belum'";
$data = ambildata($conn, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Konfirmasi Transaksi</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Transaksi
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="index_transaksi.php" onclick="window.history.back();"
                            class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="4%">#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                    $no = 1;
                                    foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['kode_invoice'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= rupiah($transaksi['total_harga']) ?></td>
                                    <td>
                                        <a href="transaksi_bayar.php?id=<?= $transaksi['id_transaksi']; ?>">
                                            <button type="button" class="btn btn-success">
                                                <i class="fa fa-check fa-fw"></i> Konfirmasi
                                            </button>
                                        </a>
                                    </td>
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