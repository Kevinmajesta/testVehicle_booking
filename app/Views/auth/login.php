<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login | Vehicle Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>">
</head>

<body>
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login | Vehicle Booking</b></h3>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/loginProcess') ?>" method="post">
              <?= csrf_field() ?> <div class="form-group mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
              </div>

              <div class="form-group mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/pcoded.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>

  <script>
    layout_change('light');
    preset_change("preset-1");
    font_change("Public-Sans");
  </script>
</body>

</html>