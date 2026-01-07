<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="card">
                <div class="card-header"><h5>Persetujuan Pemesanan Kendaraan</h5></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kendaraan</th>
                                    <th>Peminjam</th>
                                    <th>Status Saat Ini</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($bookings as $b) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $b['vehicle_name'] ?></td>
                                    <td><?= $b['username'] ?></td>
                                    <td><span class="badge bg-light-warning"><?= $b['status'] ?></span></td>
                                    <td>
                                        <?php if ($b['status'] == 'Pending' && $b['approver_1_id'] == session()->get('user_id')) : ?>
                                            <a href="<?= base_url('booking/approve/'.$b['id'].'/1') ?>" class="btn btn-sm btn-primary">Setujui (Level 1)</a>
                                        
                                        <?php elseif ($b['status'] == 'Waiting Level 2' && $b['approver_2_id'] == session()->get('user_id')) : ?>
                                            <a href="<?= base_url('booking/approve/'.$b['id'].'/2') ?>" class="btn btn-sm btn-success">Setujui (Level 2)</a>
                                        
                                        <?php else : ?>
                                            <span class="text-muted small">Menunggu giliran / Selesai</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>