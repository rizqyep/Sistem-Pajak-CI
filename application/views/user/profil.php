<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Profil</h2>
                        <img src="<?= base_url(); ?>upload/user/<?= $current['foto']; ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h3> <?= $current['nama']; ?></h3>
                        <br>
                        <h5 class="card-text">
                            Jumlah Kendaraan : <?= $current['jumlah_kendaraan'] ?>
                        </h5>
                        <h5 class="card-text">
                            NIP :
                            <?= $current['nip']; ?>
                        </h5>
                        <h5 class="card-text">
                            Unit : <?= $current['unit'] ?>
                        </h5>
                        <h5 class="card-text">
                            Jabatan : <?= $current['jabatan'] ?>
                        </h5>
                        <h5 class="card-text">
                            Agama : <?= $current['agama'] ?>
                        </h5>
                        <h5 class="card-text">
                            Pendidikan: <?= $current['pendidikan'] ?>
                        </h5>
                        <h5 class="card-text">
                            Tanggal Kelahiran : <?= $current['tanggal_lahir'] ?>
                        </h5>
                        <h5 class="card-text">
                            No. Telepon : <?= $current['telp'] ?>
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>