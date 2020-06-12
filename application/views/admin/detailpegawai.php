<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Data Pegawai</h2>
                    </div>
                    <div class="card-body">
                        <h3> <?= $user['nama']; ?></h3>
                        <br>

                        <h5 class="card-text">
                            NIP :
                            <?= $user['nip']; ?>
                        </h5>
                        <h5 class="card-text">
                            Jumlah Kendaraan : <?= $user['jumlah_kendaraan'] ?>
                        </h5>
                        <a href="<?= base_url(); ?>admin/datapegawai" class="btn btn-success mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>