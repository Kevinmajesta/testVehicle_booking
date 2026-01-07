
<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                        <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                            <h5 class="mb-0 text-white">Detail Pemesanan Kendaraan #<?= $booking['id'] ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Nama Peminjam</div>
                                <div class="col-sm-8">: <?= $booking['peminjam'] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Kendaraan</div>
                                <div class="col-sm-8">: <?= $booking['vehicle_name'] ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Driver</div>
                                <div class="col-sm-8">: <?= $booking['driver_name'] ?></div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Tanggal Mulai</div>
                                <div class="col-sm-8">: <?= date('d M Y', strtotime($booking['start_date'])) ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Tanggal Selesai</div>
                                <div class="col-sm-8">: <?= date('d M Y', strtotime($booking['end_date'])) ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 font-weight-bold">Status Saat Ini</div>
                                <div class="col-sm-8">: 
                                    <span class="badge bg-light-info text-primary"><?= $booking['status'] ?></span>
                                </div>
                            </div>
                            <hr>
                            <div class="text-right">
                                <a href="<?= base_url('booking/approval') ?>" class="btn btn-secondary" style="border-radius: 10px;">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>