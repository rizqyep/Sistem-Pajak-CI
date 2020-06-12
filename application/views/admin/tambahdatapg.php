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
                    <form action="<?= base_url(); ?>admin/insertdatapg" method="POST">
                        <div class="card-body">
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