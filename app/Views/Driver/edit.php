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
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Data Driver: <?= $driver['name'] ?></h5>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>

                            <form action="<?= base_url('driver/update/' . $driver['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Lengkap Driver</label>
                                    <input type="text" name="name" class="form-control" value="<?= $driver['name'] ?>" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Status Driver</label>
                                    <select name="status" class="form-select" required>
                                        <option value="Tersedia" <?= $driver['status'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                                        <option value="Bertugas" <?= $driver['status'] == 'Bertugas' ? 'selected' : '' ?>>Bertugas</option>
                                        <option value="Libur" <?= $driver['status'] == 'Libur' ? 'selected' : '' ?>>Libur</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('driver') ?>" class="btn btn-light-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-warning">Update Data</button>
                                </div>
                            </form>
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