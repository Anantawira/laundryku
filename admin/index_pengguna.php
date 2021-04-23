<?php
$title = 'Pengguna';
require 'functions.php';
require 'layout_header.php';

$query = 'Call GetAllPengguna()';
$data = ambildata($conn, $query);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Pengguna</b></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data Pengguna
                </div>
                <div class="card-body">
                    <div class="col-m-6">
                        <a href="pengguna_tambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i>
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
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                $no=1; foreach($data as $user): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $user['nama_user'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['role'] ?></td>
                                    <td align="center">
                                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="pengguna_ubah.php?id=<?= $user['id_user']; ?>"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="pengguna_hapus.php?id=<?= $user['id_user']; ?>"
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