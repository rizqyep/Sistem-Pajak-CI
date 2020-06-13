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
                        <h3 class="card-title">Input Data Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url(); ?>admin/insertdatapg" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bukti">Upload Foto Pegawai</label>
                                <input type="file" class="form-control-file" name="foto" id="foto">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama pegawai">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" name="unit" id="unit" placeholder="Unit">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan">
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <label for="lahir">Tanggal Kelahiran</label>
                                <input type="date" class="form-control" name="lahir" id="lahir" placeholder="lahir">
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