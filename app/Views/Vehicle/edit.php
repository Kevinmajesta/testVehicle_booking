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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Data Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>

                            <form action="<?= base_url('vehicle/update/' . $vehicle['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                
                                <div class="form-group mb-3">
                                    <label class="form-label">Model/Nama Kendaraan</label>
                                    <input type="text" name="model" class="form-control" value="<?= $vehicle['model'] ?>" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Nomor Plat</label>
                                    <input type="text" name="plate_number" class="form-control" value="<?= $vehicle['plate_number'] ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Jenis Kendaraan</label>
                                            <select name="type" class="form-select" required>
                                                <option value="Orang" <?= $vehicle['type'] == 'Orang' ? 'selected' : '' ?>>Angkutan Orang</option>
                                                <option value="Barang" <?= $vehicle['type'] == 'Barang' ? 'selected' : '' ?>>Angkutan Barang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Kepemilikan</label>
                                            <select name="ownership" class="form-select" required>
                                                <option value="Perusahaan" <?= $vehicle['ownership'] == 'Perusahaan' ? 'selected' : '' ?>>Milik Perusahaan</option>
                                                <option value="Sewa" <?= $vehicle['ownership'] == 'Sewa' ? 'selected' : '' ?>>Sewa (Rental)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Lokasi Penempatan (Region)</label>
                                    <select name="region_id" class="form-select" required>
                                        <option value="">-- Pilih Lokasi --</option>
                                        <?php foreach ($regions as $r) : ?>
                                            <option value="<?= $r['id'] ?>" <?= $vehicle['region_id'] == $r['id'] ? 'selected' : '' ?>>
                                                <?= $r['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('vehicle') ?>" class="btn btn-light-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
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