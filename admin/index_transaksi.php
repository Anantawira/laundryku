<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$query = "Call GetAllTransaksi() ";
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
                        <button type="button" value="print" onclick="PrintDiv();" class="btn btn-secondary"><i
                                class="fa fa-print fa-fw"></i> Cetak Laporan
                        </button>
                    </div>
                    <br>
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
                                    foreach ($data as $transaksi) :                                                          
                                    ?>
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
                    </>
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
                                    foreach ($data as $transaksi) :                                                          
                                    ?>
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