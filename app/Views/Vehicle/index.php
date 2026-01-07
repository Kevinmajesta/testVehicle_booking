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
                            <button type="button" class="btn btn-sm btn-icon btn-light-success"
                              onclick="openModalLog(<?= $v['id'] ?>, 'BBM', '<?= $v['model'] ?>')" title="Input BBM">
                              <i class="ti ti-gas-station"></i>
                            </button>

                            <button type="button" class="btn btn-sm btn-icon btn-light-info"
                              onclick="openModalLog(<?= $v['id'] ?>, 'Service', '<?= $v['model'] ?>')"
                              title="Input Service">
                              <i class="ti ti-settings"></i>
                            </button>

                            <a href="<?= base_url('vehicle/detail/' . $v['id']) ?>"
                              class="btn btn-sm btn-icon btn-light-primary" title="Lihat Riwayat">
                              <i class="ti ti-eye"></i>
                            </a>

                            <a href="<?= base_url('vehicle/edit/' . $v['id']) ?>"
                              class="btn btn-sm btn-icon btn-light-warning" title="Edit Data">
                              <i class="ti ti-edit"></i>
                            </a>

                            <form action="<?= base_url('vehicle/delete/' . $v['id']) ?>" method="post" class="d-inline"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="Hapus">
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


  <div class="modal fade" id="modalLog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 15px;">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Input Monitoring</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formLog" method="POST" action="<?= base_url('vehicle/saveLog') ?>">
          <?= csrf_field() ?>
          <div class="modal-body">
            <input type="hidden" name="vehicle_id" id="logVehicleId">
            <input type="hidden" name="type" id="logType">

            <p class="text-muted">Kendaraan: <strong id="vehicleNameDisplay"></strong></p>

            <div id="fuelInputSection">
              <div class="mb-3">
                <label class="form-label">Jumlah Liter</label>
                <input type="number" step="0.01" name="amount" class="form-control" placeholder="0.00">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Total Biaya (Rp)</label>
              <input type="number" name="cost" class="form-control" placeholder="Contoh: 50000" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Keterangan / Deskripsi</label>
              <textarea name="description" class="form-control" rows="2"
                placeholder="Contoh: Pengisian Pertamax / Ganti Oli Mesin"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Tanggal</label>
              <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openModalLog(id, type, model) {
      document.getElementById('logVehicleId').value = id;
      document.getElementById('logType').value = type;
      document.getElementById('modalTitle').innerText = 'Input Data ' + type;
      document.getElementById('vehicleNameDisplay').innerText = model;

      // Sembunyikan input liter jika tipenya Service
      const fuelSection = document.getElementById('fuelInputSection');
      fuelSection.style.display = (type === 'BBM') ? 'block' : 'none';

      var myModal = new bootstrap.Modal(document.getElementById('modalLog'));
      myModal.show();
    }
  </script>

</body>

</html>