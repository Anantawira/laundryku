<?php
$title = 'Pelanggan';
require 'functions.php';
require 'layout_header.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pelanggan</li>
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
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telp</th>
                                    <th>No KTP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mbak Elsa</td>
                                    <td>Jl. Pahlawan Trip 1</td>
                                    <td>Perempuan</td>
                                    <td>0345798454</td>
                                    <td>23423423423423</td>
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