<style>
    td {
        width: 20%;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat pembayaran terverifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Kendaraan</th>

                                    <th>Tenggat Pajak</th>
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
                                        <td><?= $bayar['tenggat']; ?></td>
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