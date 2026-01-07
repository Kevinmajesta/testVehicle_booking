<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="<?= base_url('') ?>" class="b-brand text-primary">
        <h4 class="logo-lg mb-0" style="font-weight: 700; letter-spacing: 1px;">
          Nikel <span class="text-secondary">PT. BBB</span>
        </h4>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="<?= base_url('') ?>" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <?php if (session()->get('role') == 'admin'): ?>
          <li class="pc-item pc-caption">
            <label>Manajemen Data</label>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('vehicle') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-car"></i></span>
              <span class="pc-mtext">Data Kendaraan</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('driver') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></span>
              <span class="pc-mtext">Data Driver</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('booking') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-clipboard"></i></span>
              <span class="pc-mtext">Riwayat Booking</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (session()->get('role') == 'approver'): ?>
          <li class="pc-item pc-caption">
            <label>Persetujuan</label>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('booking/approval') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-clipboard"></i></span>
              <span class="pc-mtext">Daftar Persetujuan</span>
            </a>
          </li>
        <?php endif; ?>

        <li class="pc-item pc-caption">
          <label>Akun</label>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('logout') ?>" class="pc-link">
            <span class="pc-micon"><i class="ti ti-power"></i></span>
            <span class="pc-mtext">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>