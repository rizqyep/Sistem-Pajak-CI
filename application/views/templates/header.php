<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"><?= $jumlah_notif ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?= $jumlah_notif ?> Notifikasi Baru</span>
                        <?php foreach ($notifikasi_new as $n) : ?>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> <?= substr($n['isi'], 0, 20) . ".."; ?>
                                <?php

                                // Declare and define two dates 
                                $date1 = strtotime($n['waktu']);
                                $date2 = strtotime(date("Y-m-d H:i:s"));
                                $diff = abs($date2 - $date1);
                                $years = floor($diff / (365 * 60 * 60 * 24));
                                $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                                    / (30 * 60 * 60 * 24));
                                $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                                    $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                $hours = floor(($diff - $years * 365 * 60 * 60 * 24
                                    - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
                                    / (60 * 60));

                                $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
                                    - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
                                    - $hours * 60 * 60) / 60);

                                $seconds = floor(($diff - $years * 365 * 60 * 60 * 24
                                    - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
                                    - $hours * 60 * 60 - $minutes * 60));
                                $msg = "";
                                if ($years > 0) {
                                    $msg .= $years . " tahun ";
                                }
                                if ($months > 0 && $months < 13) {
                                    $msg .= $months . " bulan ";
                                }
                                if ($days > 0 && $days <= 30 && $months < 1) {
                                    $msg .= $days . " hari";
                                }
                                if ($hours > 0 && $hours <= 24 && $days < 1) {
                                    $msg .= $hours . " jam";
                                }
                                if ($minutes > 0 && $minutes <= 60 && $hours < 1) {
                                    $msg .= $minutes . " menit";
                                }
                                if ($seconds > 0 && $seconds <= 60 && $minutes < 1) {
                                    $msg .= $seconds . " detik";
                                }

                                ?>
                                <span class="float-right text-muted text-sm"><?= $msg; ?></span>
                            </a>
                        <?php endforeach; ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url(); ?>notifikasi" class="dropdown-item dropdown-footer">Lihat Semua Pemberitahuan</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php if ($session['akses'] == 1) : ?>
                <a href="<?= base_url() ?>admin" class="brand-link">
                <?php endif; ?>
                <?php if ($session['akses'] == 2) : ?>
                    <a href="<?= base_url() ?>user" class="brand-link">
                    <?php endif; ?>
                    <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Sistem Pajak</span>
                    </a>


                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                            <div class="info">
                                <a href="#" class="d-block">Login Sebagai : <?= $session['ses_nama']; ?></a>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                <li class="nav-item has-treeview menu-open">
                                    <?php if ($session['akses'] == 1) { ?>
                                        <a href="<?= base_url(); ?>admin" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="<?= base_url(); ?>user" class="nav-link active">
                                            <?php } ?>
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                            </p>
                                            </a>
                                </li>

                                <li class="nav-header">MENU</li>
                                <?php if ($session['akses'] == 1) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>admin/datapegawai" class="nav-link">
                                            <i class="nav-icon far fa-user"></i>
                                            <p>
                                                Data Pegawai

                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>admin/datakendaraan" class="nav-link">
                                            <i class="nav-icon fa fa-car"></i>
                                            <p>
                                                Data Kendaraan Pegawai
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>admin/pembayaran" class="nav-link">
                                            <i class="nav-icon fa fa-bookmark"></i>
                                            <p>
                                                Kelola Pembayaran Pajak
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>admin/historypembayaran" class="nav-link">
                                            <i class="nav-icon fa fa-check"></i>
                                            <p>
                                                Pembayaran Terverifikasi
                                            </p>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>user/listkendaraan" class="nav-link">
                                            <i class="nav-icon fa fa-file"></i>
                                            <p>
                                                Status Pajak Kendaraan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url(); ?>user/historybayar" class="nav-link">
                                            <i class="nav-icon fa fa-book"></i>
                                            <p>
                                                Riwayat Pembayaran
                                            </p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>notifikasi" class="nav-link">
                                        <i class="nav-icon far fa-bell"></i>
                                        <p>
                                            Pusat Notifikasi
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>login/logout" class="nav-link">
                                        <i class="nav-icon fa fa-power-off"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
        </aside>