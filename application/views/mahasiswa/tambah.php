<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-warning">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control" id="nrp" name="nrp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="Teknik Komputer">Teknik Komputer</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                            </select>
                        </div>
                        <button name="tambah" class="btn btn-primary float-right" type="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>