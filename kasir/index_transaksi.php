<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$query = "SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi
    WHERE tb_transaksi.id_outlet = " . $_SESSION['id_outlet'];
$data = ambildata($conn, $query);
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
                    <i class="fas fa-table mr-1"></i>
                    Data Transaksi
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="transaksi_cari_pelanggan.php" class="btn btn-primary box-title"><i
                                class="fa fa-plus fa-fw"></i>
                            Tambah</a>
                        <a href="transaksi_konfirmasi.php" class="btn btn-success box-title"><i
                                class="fa fa-check fa-fw"></i>
                            Konfirmasi Pembayaran</a>
                        <button type="button" value="print" onclick="PrintDiv();" class="btn btn-secondary"><i
                                class="fa fa-print fa-fw"></i> Cetak Laporan
                        </button>
                    </div>
                    <br>

                    <?php 
                    if (isset($_GET['msg'])){ ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pesan:</strong> <?php echo $_GET['msg']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php } ?>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th width="4%">#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Status Pembayaran</th>
                                    <th>Total Harga</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                    $no = 1;
                                    foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['kode_transaksi'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['status_bayar'] ?></td>
                                    <td><?= rupiah($transaksi['total_harga']) ?></td>
                                    <td align="center">
                                        <a href="transaksi_detail.php?id=<?= $transaksi['id_transaksi']; ?>">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-eye fa-fw"></i> Detail
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


            <div id="divToPrint" style="display:none;">
                <div style="width: 750px; margin: auto;">
                    <br>
                    <center><b>
                            LAPORAN DATA TRANSAKSI</b><br>
                        <caption>"LAUNDRYKU"</caption> <br><br>
                        <table width="100%">
                            <tr>
                                <td>LAPORAN</td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="left">
                                    <th width="4%">#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Status Pembayaran</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                    $no = 1;
                                    foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $transaksi['kode_transaksi'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['status_bayar'] ?></td>
                                    <td><?= rupiah($transaksi['total_harga']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>


        </div>
    </main>

    <?php 
require 'layout_footer.php';
?>