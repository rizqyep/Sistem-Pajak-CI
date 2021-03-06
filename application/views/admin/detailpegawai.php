<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Data Pegawai</h2>
                        <img src="<?= base_url(); ?>upload/user/<?= $user['foto']; ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h3> <?= $user['nama']; ?></h3>
                        <br>
                        <h5 class="card-text">
                            Jumlah Kendaraan : <?= $user['jumlah_kendaraan'] ?>
                        </h5>
                        <h5 class="card-text">
                            NIP :
                            <?= $user['nip']; ?>
                        </h5>
                        <h5 class="card-text">
                            Unit : <?= $user['unit'] ?>
                        </h5>
                        <h5 class="card-text">
                            Jabatan : <?= $user['jabatan'] ?>
                        </h5>
                        <h5 class="card-text">
                            Agama : <?= $user['agama'] ?>
                        </h5>
                        <h5 class="card-text">
                            Pendidikan: <?= $user['pendidikan'] ?>
                        </h5>
                        <h5 class="card-text">
                            Tanggal Kelahiran : <?= $user['tanggal_lahir'] ?>
                        </h5>
                        <h5 class="card-text">
                            No. Telepon : <?= $user['telp'] ?>
                        </h5>
                        <a href="<?= base_url(); ?>admin/datapegawai" class="btn btn-success mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>