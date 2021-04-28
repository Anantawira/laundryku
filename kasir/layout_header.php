<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="../assets/main/dist/assets/img/laundry-icon.ico">
    <title>Kasir - Laundryku</title>
    <link href="../assets/main/dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>

    <style type="text/css">
    #paragraf1 {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><b>KASIR LAUNDRYKU</b></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link <?php if($title=='Laporan'){echo'active';} ?>" href="index_laporan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt fa-fw"></i></div>
                            Laporan
                        </a>
                        <div class="sb-sidenav-menu-heading">Transaksi</div>
                        <a class="nav-link <?php if($title=='Pelanggan'){echo'active';} ?>" href="index_pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></div>
                            Pelanggan
                        </a>
                        <a class="nav-link <?php if($title=='Transaksi'){echo'active';} ?>" href="index_transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart fa-fw"></i></div>
                            Transaksi
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login Sebagai :</div> Kasir
                </div>
            </nav>
        </div>