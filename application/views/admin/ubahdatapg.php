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
                        <h3 class="card-title">Ubah Data Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url(); ?>admin/updatedatapg/<?= $user['id']; ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama pegawai" value="<?= $user['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value=<?= $user['username']; ?>>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?= $user['nip']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kd">Jumlah Kendaraan</label>
                                <input type="text" class="form-control" name="jumlah_kd" id="jumlah_kd" placeholder="Jumlah Kendaraan" value="<?= $user['jumlah_kendaraan']; ?>">
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