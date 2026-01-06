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
              <h5>List Armada</h5>
              <a href="<?= base_url('vehicle/create') ?>" class="btn btn-primary btn-sm">Tambah Kendaraan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Model</th>
                      <th>Plat Nomor</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($vehicles)): ?>
                      <tr>
                        <td colspan="6" class="text-center">Data masih kosong.</td>
                      </tr>
                    <?php else: ?>
                      <?php $no = 1;
                      foreach ($vehicles as $v): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><strong><?= $v['model'] ?></strong></td>
                          <td><?= $v['plate_number'] ?></td>
                          <td><?= $v['type'] ?></td>
                          <td><?= $v['ownership'] ?></td>
                          <td><?= $v['region_name'] ?></td>
                          <td>
                            <a href="<?= base_url('vehicle/edit/' . $v['id']) ?>"
                              class="btn btn-sm btn-icon btn-light-warning">
                              <i class="ti ti-edit"></i>
                            </a>
                            <form action="<?= base_url('vehicle/delete/' . $v['id']) ?>" method="post" class="d-inline"
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