<div class="content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="mt-5"></div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Data Kendaraan</h3><br>
                        <h5>Pemilik : <?= $kendaraan['pemilik']; ?></h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="<?= base_url(); ?>admin/updatedatakd/<?= $kendaraan['id']; ?>" method="POST">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="username">Jenis Kendaraan</label>
                                <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Kendaraan" value="<?= $kendaraan['jenis']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nopol">Nomor Polisi</label>
                                <input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nomor Polisi" required value="<?= $kendaraan['nopol']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal Pajak</label>
                                <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal Pajak" value="<?= $kendaraan['nominal_pajak']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tenggat">Tenggat Pajak</label>
                                <input type="date" class="form-control" name="tenggat" id="tenggat" placeholder="Tenggat Pajak" required value="<?= $kendaraan['tenggat']; ?>">
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>