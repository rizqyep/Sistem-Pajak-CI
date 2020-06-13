<style>
    td {
        width: 20%;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <?php
                $rows = 0;
                foreach ($pembayaran as $bayar) :
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Riwayat Pembayaran</h2>
                        </div>
                        <div class="card-body">
                            <h3> Pembayaran Untuk Kendaraan : <?= $bayar['kendaraan']; ?></h3>
                            <br>
                            <h5 class="card-text">
                                Nama Pemilik :
                                <?= $bayar['pemilik']; ?>
                            </h5>

                            <h5 class="card-text">
                                Nominal :
                                <?= $bayar['nominal_pajak']; ?>
                            </h5>
                        </div>
                    </div>
                <?php
                    $rows += 1;
                endforeach; ?>
            </div>
        </div>
        <!--End row  -->
        <div class="row">
            <?php if ($rows == 0) { ?>
                <h3>Anda Belum Melakukan pembayaran</h3>
            <?php } ?>
        </div>
    </div>
</div>