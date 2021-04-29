<?php
$title = 'Pelanggan';
require 'functions.php';
require 'layout_header.php';

$tgl_sekarang = Date('Y-m-d h:i:s');

$query = 'Call GetAllPelanggan()';
$data = ambildata($conn,$query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pelanggan</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Pelanggan
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="pelanggan_tambah.php" class="btn btn-primary box-title"><i
                                class="fa fa-plus fa-fw"></i>
                            Tambah</a>
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
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>JK</th>
                                    <th>No. Telp</th>
                                    <th>No. KTP</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                 $no=1; foreach($data as $member): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $member['nama_member'] ?></td>
                                    <td><?= $member['alamat_member'] ?></td>
                                    <td><?= $member['jenis_kelamin'] ?></td>
                                    <td><?= $member['telp_member'] ?></td>
                                    <td><?= $member['no_ktp'] ?></td>
                                    <td align="center">
                                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="pelanggan_ubah.php?id=<?= $member['id_member']; ?>"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="pelanggan_hapus.php?id=<?= $member['id_member']; ?>"
                                                onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip"
                                                data-placement="bottom" title="Hapus" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div id="divToPrint" style="display:none;">
                <div style="width: 800px; margin: auto;">
                    <br>
                    <center><b>
                            LAPORAN DATA PELANGGAN</b><br>
                        <caption>"LAUNDRYKU"</caption> <br><br>
                        <table width="100%">
                            <tr>
                                <td>LAPORAN</td>
                                <td align="right"><?php echo $tgl_sekarang ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="left">
                                    <th width="4%">#</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>JK</th>
                                    <th>No. Telp</th>
                                    <th>No. KTP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                 $no=1; foreach($data as $member): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $member['nama_member'] ?></td>
                                    <td><?= $member['alamat_member'] ?></td>
                                    <td><?= $member['jenis_kelamin'] ?></td>
                                    <td><?= $member['telp_member'] ?></td>
                                    <td><?= $member['no_ktp'] ?></td>
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