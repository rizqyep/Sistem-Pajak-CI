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
                        <h3 class="card-title">Upload Bukti Pembayaran Untuk <?= $kendaraan['jenis'] . " Nomor Polisi " . $kendaraan['nopol']; ?></h3>
                    </div>
                    <form action="<?= base_url(); ?>user/updatebukti/<?= $kendaraan['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bukti">Foto/Dokumen Bukti Pembayaran</label>
                                <input type="file" class="form-control-file" name="bukti" id="bukti">
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