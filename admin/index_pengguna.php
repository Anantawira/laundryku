<?php
$title = 'Pengguna';
require 'functions.php';
require 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengguna</li>
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ananta Admin</td>
                                    <td>Admin</td>
                                    <td>Admin</td>
                                    <td align="center">
                                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="pengguna_edit.php?id=<?= $user['id_user']; ?>"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            &nbsp;
                                            <a href="pengguna_hapus.php?id=<?= $user['id_user']; ?>"
                                                onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip"
                                                data-placement="bottom" title="Hapus" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
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