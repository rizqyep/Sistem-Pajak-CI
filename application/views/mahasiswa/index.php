<div class="container">
    <?php if ($this->session->flashdata()) : ?>
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="alert alert-success alert-dismissable fade show">
                    Data Mahasiswa berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <a class="btn btn-primary" href="<?= base_url(); ?>mahasiswa/tambah">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if (empty($mahasiswa)) { ?>
                <div class="alert alert-warning">
                    Data Mahasiswa tidak ditemukan!
                </div>
            <?php } ?>

            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="float-right badge badge-danger" onClick="return confirm('yakin?');">Hapus</a>
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="float-right badge badge-primary">Detail</a>
                        <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id']; ?>" class="float-right badge badge-success">Ubah</a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>