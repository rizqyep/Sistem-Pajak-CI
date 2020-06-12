<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Ubah Data Mahasiswa
                </div>
                <div class="card-body">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-warning">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control" id="nrp" name="nrp" value="<?= $mahasiswa['nrp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value=<?= $mahasiswa['email']; ?>>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <?php foreach ($jurusan as $jur) : ?>
                                    <?php if ($jur == $mahasiswa['jurusan']) { ?>
                                        <option value="<?= $jur ?>" selected><?= $jur ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $jur ?>"><?= $jur ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button name="ubah" class="btn btn-primary float-right" type="submit">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>