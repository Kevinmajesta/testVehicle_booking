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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>List Driver</h5>
                            <a href="<?= base_url('driver/create') ?>" class="btn btn-primary btn-sm">Tambah
                                Driver</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Driver</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($drivers as $d): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><strong><?= $d['name'] ?></strong></td>
                                                <td>
                                                    <span
                                                        class="badge <?= $d['status'] == 'Tersedia' ? 'bg-light-success' : 'bg-light-warning' ?>">
                                                        <?= $d['status'] ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('driver/edit/' . $d['id']) ?>"
                                                        class="btn btn-sm btn-icon btn-light-warning">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form action="<?= base_url('driver/delete/' . $d['id']) ?>"
                                                        method="post" class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-icon btn-light-danger">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
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
    <?= view('layouts/footer-block') ?>
    <?= view('layouts/footer-js') ?>
</body>

</html>