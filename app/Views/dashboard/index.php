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
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Page Views</h6>
                            <h4 class="mb-3">4,42,236 <span class="badge bg-light-primary border border-primary">
                                <i class="ti ti-trending-up"></i> 59.3%</span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">You made an extra <span class="text-primary">35,000</span> this year</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
                            <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success">
                                <i class="ti ti-trending-up"></i> 70.5%</span>
                            </h4>
                            <p class="mb-0 text-muted text-sm">You made an extra <span class="text-success">8,900</span> this year</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Grafik Pemakaian Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            <div id="customer-rate-graph"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('layouts/footer-block') ?>
    <?= view('layouts/footer-js') ?>

    <script src="<?= base_url('assets/js/plugins/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/pages/dashboard-default.js') ?>"></script>
</body>
</html>