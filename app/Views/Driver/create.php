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
                            <h5>Tambah Driver Baru</h5>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>

                            <form action="<?= base_url('driver/store') ?>" method="post">
                                <?= csrf_field() ?>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Lengkap Driver</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama driver" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Status Awal</label>
                                    <select name="status" class="form-select" required>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Libur">Libur</option>
                                        <option value="Bertugas">Bertugas</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('driver') ?>" class="btn btn-light-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan Driver</button>
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