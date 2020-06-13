<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h1>Selamat Datang Administrator!</h1>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlah_input ?></h3>
                        <p>Menunggu Verifikasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-model-s"></i>
                    </div>
                    <a href="<?= base_url(); ?>admin/pembayaran" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlah_bayar; ?></h3>
                        <p>Pembayaran Terverifikasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= base_url(); ?>admin/historypembayaran" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlah_kendaraan ?></h3>
                        <p>Jumlah Kendaraan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-model-s"></i>
                    </div>
                    <a href="<?= base_url() ?>admin/datakendaraan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlah_pegawai; ?></h3>

                        <p>Jumlah Pegawai</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url(); ?>admin/datapegawai" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kendaraan Yang Akan Jatuh Tempo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width : 100px">Pemilik Kendaraan</th>
                                    <th style="width : 200px">Jenis Kendaraan</th>
                                    <th style="width : 100px">Tenggat Pajak</th>
                                    <th style="width : 200px">Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($kendaraan as $kd) : ?>
                                    <?php

                                    // Declare and define two dates 
                                    $date1 = strtotime($kd['tenggat']);
                                    $date2 = strtotime(date("Y-m-d"));
                                    $diff = abs($date2 - $date1);
                                    $years = floor($diff / (365 * 60 * 60 * 24));
                                    $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                                        / (30 * 60 * 60 * 24));
                                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                                        $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                    $msg = "";
                                    if ($months > 0 && $months < 13) {
                                        $msg .= $months . " bulan ";
                                    }
                                    if ($days > 0 && $days <= 30 && $months < 1) {
                                        $msg .= $days . " hari";
                                    }
                                    if ($years < 1 && $months < 1 && $days < 1) {
                                        $msg .= "Sudah jatuh tempo";
                                    }

                                    if ($years < 1 && $months < 1 && $days < 31 && $kd['status_pajak'] == 'Aman') {
                                    ?>
                                        <tr>
                                            <td><?= $num ?></td>
                                            <td><a href="<?= base_url(); ?>admin/detailkendaraan/<?= $kd['id']; ?>"><?= $kd['pemilik']; ?></a></td>
                                            <td><?= $kd['jenis']; ?></td>
                                            <td><?= $kd['tenggat']; ?></td>
                                            <td><?= $msg; ?></td>
                                            <td><span>
                                                    <a class="btn btn-primary mt-2" href="<?= base_url(); ?>admin/kirimnotif/<?= $kd['id']; ?>">Kirim Notifikasi Pajak</a>
                                                </span>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                    $num += 1;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</div>
</div>