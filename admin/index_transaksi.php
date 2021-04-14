<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Transaksi
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="transaksi_tambah.php" class="btn btn-primary box-title"><i
                                class="fa fa-plus fa-fw"></i>
                            Tambah</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Member</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Total Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>DRY202003213927</td>
                                    <td>Ananta Wira</td>
                                    <td>Selesai</td>
                                    <td>Dibayar</td>
                                    <td>25000</td>
                                    <td></td>
                                </tr>
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