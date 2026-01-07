<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                        <div class="card-header"><h5>Tambah Wilayah</h5></div>
                        <div class="card-body">
                            <form action="<?= base_url('region/store') ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Nama Wilayah/Site</label>
                                    <input type="text" name="name" class="form-control" placeholder="Contoh: Tambang Lokasi 7" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="border-radius: 10px;">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                        <div class="card-header"><h5>Daftar Wilayah Operasional</h5></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Wilayah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($regions as $r) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r['name'] ?></td>
                                            <td>
                                                <a href="<?= base_url('region/delete/'.$r['id']) ?>" class="btn btn-sm btn-light-danger" onclick="return confirm('Hapus wilayah ini?')">
                                                    <i class="ti ti-trash"></i>
                                                </a>
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
        </div>
    </div>
</body>