<div class="content-wrapper">
    <div class="container">
        <?php if ($this->session->flashdata()) : ?>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="alert alert-success alert-dismissable fade show">
                        Notifikasi himbauan pembayaran pajak berhasil <strong><?= $this->session->flashdata('notifikasi'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Data Pembayaran</h2>
                    </div>
                    <div class="card-body">
                        <h3> <?= $pembayaran['jenis']; ?></h3>
                        <br>
                        <h5 class="card-text">
                            Nama Pemilik :
                            <?= $pembayaran['pemilik']; ?>
                        </h5>
                        <?php

                        // Declare and define two dates 
                        $date1 = strtotime($pembayaran['tenggat']);
                        $date2 = strtotime(date("Y-m-d"));
                        $diff = abs($date2 - $date1);
                        $years = floor($diff / (365 * 60 * 60 * 24));
                        $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                            / (30 * 60 * 60 * 24));
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
                            Tenggat Pajak : <?= $pembayaran['tenggat'] ?>
                            <?php if ($msg != "") { ?>
                                (Berakhir dalam : <?= $msg; ?>)
                            <?php } else { ?>
                                Pajak sudah jatuh tempo
                            <?php } ?>
                        </h5>
                        <h5 class="card-text">
                            Status Pajak Terkini :
                            <?= $pembayaran['status_pajak']; ?>
                        </h5>
                        <h5 class="card-text">
                            Status Pembayaran Pajak Terkini :
                            <?= $pembayaran['status_bayar']; ?>
                        </h5>
                        <h5 class="card-text">
                            Bukti Pembayaran

                            <?php if ($pembayaran['bukti_pembayaran'] != NULL) { ?>
                                <div>
                                    <img width="300" src="<?= base_url(); ?>upload/bukti/<?= $pembayaran['bukti_pembayaran']; ?>" alt="">
                                </div>
                            <?php } else {
                                echo "<br><h4>Belum upload bukti pembayaran</h4>";
                            } ?>
                        </h5>
                        <a href="<?= base_url(); ?>admin/pembayaran" class="btn btn-success mt-2">Kembali</a>
                        <a class="btn btn-primary float-right mt-2" href="<?= base_url(); ?>admin/verifikasi/<?= $pembayaran['id']; ?>">Verifikasi Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>