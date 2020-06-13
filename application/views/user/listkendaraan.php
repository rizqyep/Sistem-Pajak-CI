<style>
    td {
        width: 20%;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <?php if ($this->session->flashdata()) : ?>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="alert alert-success alert-dismissable fade show">
                        Bukti pembayaran berhasil <strong><?= $this->session->flashdata('user_bayar'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mt-3">
            <div class="col-12">
                <?php
                $rows = 0;
                foreach ($kendaraan_user as $kendaraan) : ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Data Kendaraan</h2>
                        </div>
                        <div class="card-body">
                            <h3> <?= $kendaraan['jenis']; ?></h3>
                            <br>
                            <h5 class="card-text">
                                Nama Pemilik :
                                <?= $kendaraan['pemilik']; ?>
                            </h5>
                            <?php

                            // Declare and define two dates 
                            $date1 = strtotime($kendaraan['tenggat']);
                            $date2 = strtotime(date("Y-m-d"));
                            // Formulate the Difference between two dates 
                            $diff = abs($date2 - $date1);
                            // To get the year divide the resultant date into 
                            // total seconds in a year (365*60*60*24) 
                            $years = floor($diff / (365 * 60 * 60 * 24));
                            // To get the month, subtract it with years and 
                            // divide the resultant date into 
                            // total seconds in a month (30*60*60*24) 
                            $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                                / (30 * 60 * 60 * 24));
                            // To get the day, subtract it with years and  
                            // months and divide the resultant date into 
                            // total seconds in a days (60*60*24) 
                            $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                                $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                            $msg = "";
                            if ($years > 0) {
                                $msg .= $years . " tahun ";
                            }
                            if ($months > 0) {
                                $msg .= $months . " bulan ";
                            }
                            if ($days > 0) {
                                $msg .= $days . " hari";
                            }
                            ?>
                            <h5 class="card-text">
                                Tenggat Pajak : <?= $kendaraan['tenggat'] ?>
                                <?php if ($msg != "") { ?>
                                    (Berakhir dalam : <?= $msg; ?>)
                                <?php } else { ?>
                                    Pajak sudah jatuh tempo
                                <?php } ?>
                            </h5>
                            <h5 class="card-text">
                                Nominal yang harus dibayar :
                                <?= $kendaraan['nominal_pajak']; ?>
                            </h5>
                            <h5 class="card-text">
                                Status Pajak Terkini :
                                <?= $kendaraan['status_pajak']; ?>
                            </h5>
                            <h5 class="card-text">
                                Status Pembayaran Pajak Terkini :
                                <?= $kendaraan['status_bayar']; ?>
                            </h5>
                            <a class="btn btn-primary float-right mt-2" href="<?= base_url(); ?>user/uploadbayar/<?= $kendaraan['id']; ?>">Upload Bukti Pembayaran</a>
                        </div>
                    </div>
                <?php
                    $rows += 1;
                endforeach; ?>

            </div>
        </div>
        <?php if ($rows == 0) { ?>
            <div class="row">
                <h1>Semua Pajak Kendaraan Anda Sudah Terverifikasi!</h1>
            </div>
        <?php } ?>
        <!--End row  -->
    </div>
</div>