<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Mantis Bootstrap 5 Admin Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <link rel="icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon"> 
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  
  <link rel="stylesheet" href="<?= base_url('assets/fonts/tabler-icons.min.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('assets/fonts/feather.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('assets/fonts/material.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" id="main-style-link" >
  <link rel="stylesheet" href="<?= base_url('assets/css/style-preset.css') ?>" >

</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="<?= base_url('dashboard') ?>" class="b-brand text-primary">
          <img src="<?= base_url('assets/images/logo-dark.svg') ?>" class="img-fluid logo-lg" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="<?= base_url('dashboard') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>UI Components</label>
            <i class="ti ti-dashboard"></i>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('typography') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-typography"></i></span>
              <span class="pc-mtext">Typography</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('color') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
              <span class="pc-mtext">Color</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('icons') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
              <span class="pc-mtext">Icons</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Pages</label>
            <i class="ti ti-news"></i>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('login') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-lock"></i></span>
              <span class="pc-mtext">Login</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('register') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
              <span class="pc-mtext">Register</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Other</label>
            <i class="ti ti-brand-chrome"></i>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="pc-item">
            <a href="<?= base_url('sample-page') ?>" class="pc-link">
              <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
              <span class="pc-mtext">Sample page</span>
            </a>
          </li>
        </ul>
        <div class="card text-center">
          <div class="card-body">
            <img src="<?= base_url('assets/images/img-navbar-card.png') ?>" alt="images" class="img-fluid mb-2">
            <h5>Upgrade To Pro</h5>
            <p>To get more features and components</p>
            <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank" class="btn btn-success">Buy Now</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <header class="pc-header">
    <div class="header-wrapper">
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="header-search">
              <i data-feather="search" class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search here. . .">
            </form>
          </li>
        </ul>
      </div>
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button">
              <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" alt="user-image" class="user-avtar">
              <span>Stebin Ben</span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                    <img src="<?= base_url('assets/images/user/avatar-2.jpg') ?>" alt="user-image" class="user-avtar wid-35">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Stebin Ben</h6>
                    <span>UI/UX Designer</span>
                  </div>
                </div>
              </div>
              <a href="#!" class="dropdown-item"><i class="ti ti-user"></i> <span>View Profile</span></a>
              <a href="#!" class="dropdown-item"><i class="ti ti-power text-danger"></i> <span>Logout</span></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="pc-container">
    <div class="pc-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Home</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item" aria-current="page">Home</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Page Views</h6>
              <h4 class="mb-3">4,42,236 <span class="badge bg-light-primary border border-primary"><i class="ti ti-trending-up"></i> 59.3%</span></h4>
              <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
              <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success"><i class="ti ti-trending-up"></i> 70.5%</span></h4>
              <p class="mb-0 text-muted text-sm">You made an extra <span class="text-success">8,900</span> this year</p>
            </div>
          </div>
        </div>
        </div>
      </div>
  </div>
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0">Mantis &#9829; crafted by Team <a href="https://themeforest.net/user/codedthemes" target="_blank">Codedthemes</a></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="<?= base_url() ?>">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?= base_url('assets/js/plugins/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/pages/dashboard-default.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/simplebar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/fonts/custom-font.js') ?>"></script>
  <script src="<?= base_url('assets/js/pcoded.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/feather.min.js') ?>"></script>

  <script>
    layout_change('light');
    change_box_container('false');
    layout_rtl_change('false');
    preset_change("preset-1");
    font_change("Public-Sans");
  </script>

</body>
</html>