<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/loader') ?>
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="card">
                <div class="card-header"><h5>Form Pemesanan Kendaraan</h5></div>
                <div class="card-body">
                    <form action="<?= base_url('booking/store') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilih Kendaraan</label>
                                <select name="vehicle_id" class="form-select" required>
                                    <?php foreach($vehicles as $v): ?>
                                        <option value="<?= $v['id'] ?>"><?= $v['model'] ?> (<?= $v['plate_number'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilih Driver</label>
                                <select name="driver_id" class="form-select" required>
                                    <?php foreach($drivers as $d): ?>
                                        <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="datetime-local" name="start_date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="datetime-local" name="end_date" class="form-control" required>
                            </div>
                        </div>

                        <hr>
                        <h6>Pihak Penyetuju (Approval)</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Atasan Level 1</label>
                                <select name="approver_1_id" class="form-select" required>
                                    <?php foreach($approvers as $a): ?>
                                        <option value="<?= $a['id'] ?>"><?= $a['username'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Atasan Level 2</label>
                                <select name="approver_2_id" class="form-select" required>
                                    <?php foreach($approvers as $a): ?>
                                        <option value="<?= $a['id'] ?>"><?= $a['username'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= view('layouts/footer-js') ?>
</body>