<style>
    td {
        width: 20%;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <?php if ($this->session->flashdata()) : ?>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="alert alert-success alert-dismissable fade show">
                        Kendaraan berhasil <strong><?= $this->session->flashdata('kendaraan'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kendaraan Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Pemilik Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Status Pajak</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($kendaraan as $kd) : ?>
                                    <tr>
                                        <td><?= $num ?></td>
                                        <td><a href="<?= base_url(); ?>admin/detailkendaraan/<?= $kd['id']; ?>"><?= $kd['pemilik']; ?></a></td>
                                        <td><?= $kd['jenis']; ?></td>
                                        <td><?= $kd['status_pajak']; ?></td>
                                        <td><span>
                                                <a class="btn btn-sm btn-warning" href="<?= base_url(); ?>admin/ubahkendaraan/<?= $kd['id']; ?>">Ubah</a>
                                                <div class="mt-2 d-lg-none"></div>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url(); ?>admin/hapuskendaraan/<?= $kd['id']; ?>">Hapus</a>
                                            </span></td>
                                    </tr>
                                <?php
                                    $num += 1;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!--End row  -->
        <div class="row mt-3">
            <div class="col-8">

            </div>
            <div class="col-4 pr-3">
                <a class="btn btn-success float-right" href="<?= base_url(); ?>admin/tambahdatakd">Tambah Data Kendaraan</a>
            </div>


        </div>
        <!--End row  -->
    </div>
</div>