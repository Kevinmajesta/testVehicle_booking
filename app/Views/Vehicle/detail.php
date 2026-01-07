<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/loader') ?>
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <?= view('layouts/breadcrumb') ?>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="mb-0"><?= $vehicle['model'] ?></h3>
                                    <p class="text-muted mb-0"><?= $vehicle['plate_number'] ?> |
                                        <?= $vehicle['region_name'] ?>
                                    </p>
                                </div>
                                <a href="<?= base_url('vehicle') ?>" class="btn btn-secondary btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                        <div class="card-header">
                            <h5>Riwayat Operasional</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="pill"
                                        data-bs-target="#pills-bbm">Riwayat BBM</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="pill"
                                        data-bs-target="#pills-service">Riwayat Service</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-usage">Riwayat
                                        Pemakaian</button>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-bbm">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Konsumsi (L)</th>
                                                <th>Biaya</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($logs as $l):
                                                if ($l['log_type'] == 'BBM'): ?>
                                                    <tr>
                                                        <td><?= date('d M Y', strtotime($l['date_logged'])) ?></td>
                                                        <td><?= $l['fuel_consumption'] ?> L</td>
                                                        <td>Rp <?= number_format($l['cost'], 0, ',', '.') ?></td>
                                                        <td><?= $l['description'] ?></td>
                                                    </tr>
                                                <?php endif; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-service">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Biaya</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($logs as $l):
                                                if ($l['log_type'] == 'Service'): ?>
                                                    <tr>
                                                        <td><?= date('d M Y', strtotime($l['date_logged'])) ?></td>
                                                        <td>Rp <?= number_format($l['cost'], 0, ',', '.') ?></td>
                                                        <td><?= $l['description'] ?></td>
                                                    </tr>
                                                <?php endif; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-usage">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Driver</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usage_history as $usage): ?>
                                                <tr>
                                                    <td>
                                                        <?= $usage['driver_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= date('d M Y H:i', strtotime($usage['start_date'])) ?>
                                                    </td>
                                                    <td>
                                                        <?= date('d M Y H:i', strtotime($usage['end_date'])) ?>
                                                    </td>
                                                    <td><span class="badge bg-success">
                                                            <?= $usage['status'] ?>
                                                        </span></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('layouts/footer-block') ?>
    <?= view('layouts/footer-js') ?>
</body>

</html>