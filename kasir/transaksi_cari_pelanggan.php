<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout_header.php';

$query = 'SELECT * FROM tb_member';
$data = ambildata($conn, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pilih Data Pelanggan</b></li>
            </ol>
            <div class="alert alert-info">
                Jika pelanggan belum terdaftar, maka daftarkan dulu lewat <a href="index_pelanggan.php"
                    class="alert-link">Menu Pelanggan</a>.
            </div>
            <div class="card mb-4">
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
                                    <th width="3%">#</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>JK</th>
                                    <th>Telepon</th>
                                    <th>No. KTP</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                    $no = 1;
                                    foreach ($data as $member) : ?>
                                <tr class="odd gradeX">
                                    <td><?= $no++ ?></td>
                                    <td><?= $member['nama_member'] ?></td>
                                    <td><?= $member['alamat_member'] ?></td>
                                    <td><?= $member['jenis_kelamin'] ?></td>
                                    <td><?= $member['telp_member'] ?></td>
                                    <td><?= $member['no_ktp'] ?></td>
                                    <td align="center">
                                        <a href="transaksi_tambah.php?id=<?= $member['id_member']; ?>">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-check fa-fw"></i> Pilih
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