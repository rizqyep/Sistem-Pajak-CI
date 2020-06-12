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
                        <h2>Notifikasi Pembayaran Pajak</h2>

                    </div>
                    <div class="card-body">
                        <h3> <?= $pembayaran['jenis']; ?></h3>
                        <br>
                        <h5 class="card-text">
                            Nama Pemilik :
                            <?= $pembayaran['pemilik']; ?>
                        </h5>
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
                                <img src="<?= $pembayaran['bukti_pembayaran']; ?>" alt="">
                            <?php } else {
                                echo "Belum upload bukti pembayaran";
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