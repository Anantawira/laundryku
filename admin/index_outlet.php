<?php
$title = 'Outlet';
require 'functions.php';
require 'layout_header.php';

$query = 'Call GetAllOutlet()';
$data = ambildata($conn,$query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Outlet</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Outlet
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="outlet_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i>
                            Tambah</a>
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
                                    <th>Pengguna</th>
                                    <th>No. Telp</th>
                                    <th>Alamat</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                 $no=1; foreach($data as $user): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $user['nama_outlet'] ?></td>
                                    <td>
                                        <?php if($user['nama_user'] == null){
                                            echo '<i>Belum Ada Pengguna</i>';
                                        }else{
                                            echo $user['nama_user'];
                                        } ?>
                                    </td>
                                    <td><?= $user['telp_outlet'] ?></td>
                                    <td><?= $user['alamat_outlet'] ?></td>
                                    <td align="center">
                                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="outlet_ubah.php?id=<?= $user['id_outlet']; ?>"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="outlet_hapus.php?id=<?= $user['id_outlet']; ?>"
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
        </div>
    </main>

    <?php 
require 'layout_footer.php';
?>