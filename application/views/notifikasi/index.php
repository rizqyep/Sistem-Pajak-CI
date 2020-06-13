<div class="content-wrapper">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <?php
                $rows = 0;
                foreach ($notifikasi as $notif) : ?>
                    <div class="card">
                        <?php
                        // Declare and define two dates 
                        $date1 = strtotime($notif['waktu']);
                        $date2 = strtotime(date("Y-m-d H:i:s"));
                        $diff = abs($date2 - $date1);
                        $years = floor($diff / (365 * 60 * 60 * 24));
                        $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                            / (30 * 60 * 60 * 24));
                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                            $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        $hours = floor(($diff - $years * 365 * 60 * 60 * 24
                            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
                            / (60 * 60));

                        $minutes = floor(($diff - $years * 365 * 60 * 60 * 24
                            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
                            - $hours * 60 * 60) / 60);

                        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24
                            - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
                            - $hours * 60 * 60 - $minutes * 60));
                        $msg = "";
                        if ($years > 0) {
                            $msg .= $years . " tahun ";
                        }
                        if ($months > 0 && $months < 13) {
                            $msg .= $months . " bulan ";
                        }
                        if ($days > 0 && $days <= 30 && $months < 1) {
                            $msg .= $days . " hari";
                        }
                        if ($hours > 0 && $hours <= 24 && $days < 1) {
                            $msg .= $hours . " jam";
                        }
                        if ($minutes > 0 && $minutes <= 60 && $hours < 1) {
                            $msg .= $minutes . " menit";
                        }
                        if ($seconds > 0 && $seconds <= 60 && $minutes < 1) {
                            $msg .= $seconds . " detik";
                        }

                        ?>

                        <div class="card-header">
                            <h4 class="float-left">Notifikasi Pembayaran Pajak</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text"> <?= $notif['isi']; ?></p>
                        </div>
                        <div class="card-footer">
                            <span class="float-right text-muted "><?= $msg; ?> yang lalu</span>
                        </div>
                    </div>
                <?php
                    $rows += 1;
                endforeach; ?>
                <!--End Card-->
            </div>
        </div>
        <div class="row">
            <?php if ($rows == 0) { ?>
                <h3>Anda Tidak memiliki notifikasi apapun</h3>
            <?php } ?>
        </div>
    </div>
</div>