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
                        Pembayaran berhasil <strong><?= $this->session->flashdata('pembayaran'); ?></strong>
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
                        <h3 class="card-title">Daftar pembayaran yang menunggu verifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Kendaraan</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                foreach ($pembayaran as $bayar) : ?>
                                    <tr>
                                        <td><?= $num ?></td>
                                        <td><a href="<?= base_url(); ?>admin/detailpembayaran/<?= $bayar['id']; ?>"><?= $bayar['pemilik']; ?></a></td>
                                        <td><?= $bayar['jenis']; ?></td>

                                        <td><span>

                                                <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>admin/detailpembayaran/<?= $bayar['id']; ?>">Lihat Detail</a>
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

    </div>
</div>