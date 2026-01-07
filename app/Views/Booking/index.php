<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/loader') ?>
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="pc-container">
        <div class="pc-content">
            <?= view('layouts/breadcrumb') ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Daftar Pemesanan Kendaraan</h5>
                            <div>
                                <a href="<?= base_url('booking/export') ?>" class="btn btn-success">
                                    <i class="ti ti-file-spreadsheet"></i> Export Excel
                                </a>
                                <a href="<?= base_url('booking/create') ?>" class="btn btn-primary">Buat Pesanan
                                    Baru</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kendaraan</th>
                                            <th>Driver</th>
                                            <th>Periode</th>
                                            <th>Penyetuju (1 / 2)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($bookings)): ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Belum ada riwayat pemesanan.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $no = 1;
                                            foreach ($bookings as $b): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td>
                                                        <span class="d-block font-weight-bold"><?= $b['vehicle_name'] ?></span>
                                                    </td>
                                                    <td><?= $b['driver_name'] ?></td>
                                                    <td>
                                                        <small class="text-muted">
                                                            <?= date('d M Y, H:i', strtotime($b['start_date'])) ?> <br>
                                                            s/d <br>
                                                            <?= date('d M Y, H:i', strtotime($b['end_date'])) ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <small class="d-block">1. <?= $b['approver_1'] ?></small>
                                                        <small class="d-block">2. <?= $b['approver_2'] ?></small>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $badgeClass = 'bg-light-secondary';
                                                        if ($b['status'] == 'Approved')
                                                            $badgeClass = 'bg-light-success';
                                                        if ($b['status'] == 'Rejected')
                                                            $badgeClass = 'bg-light-danger';
                                                        if ($b['status'] == 'Waiting Level 2')
                                                            $badgeClass = 'bg-light-info';
                                                        if ($b['status'] == 'Pending')
                                                            $badgeClass = 'bg-light-warning';
                                                        ?>
                                                        <span class="badge <?= $badgeClass ?>"><?= $b['status'] ?></span>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('booking/edit/' . $b['id']) ?>"
                                                            class="btn btn-sm btn-icon btn-light-warning"><i
                                                                class="ti ti-edit"></i></a>
                                                        <form action="<?= base_url('booking/delete/' . $b['id']) ?>"
                                                            method="post" class="d-inline"
                                                            onsubmit="return confirm('Hapus pesanan ini?')">
                                                            <?= csrf_field() ?>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-icon btn-light-danger"><i
                                                                    class="ti ti-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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