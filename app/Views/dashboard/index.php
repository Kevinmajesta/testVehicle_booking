<?= view('layouts/head-page-meta') ?>
<?= view('layouts/head-css') ?>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <?= view('layouts/sidebar') ?>
    <?= view('layouts/topbar') ?>

    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-body d-flex align-items-center"
                                style="background-color: #87BAC3; min-height: 120px;">
                                <div class="flex-grow-1 text-white">
                                    <h6 class="text-white-50 mb-1">Total Kendaraan</h6>
                                    <h2 class="text-white mb-0"><?= $total_vehicle ?></h2>
                                </div>
                                <div class="flex-shrink-0 text-white-50">
                                    <i class="ti ti-car fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-body d-flex align-items-center"
                                style="background-color: #53629E; min-height: 120px;">
                                <div class="flex-grow-1 text-white">
                                    <h6 class="text-white-50 mb-1">Booking Pending</h6>
                                    <h2 class="text-white mb-0"><?= $total_pending ?></h2>
                                </div>
                                <div class="flex-shrink-0 text-white-50">
                                    <i class="ti ti-clock fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-body d-flex align-items-center"
                                style="background-color: #8FABD4; min-height: 120px;">
                                <div class="flex-grow-1 text-white">
                                    <h6 class="text-white-50 mb-1">Booking Disetujui</h6>
                                    <h2 class="text-white mb-0"><?= $total_approved ?></h2>
                                </div>
                                <div class="flex-shrink-0 text-white-50">
                                    <i class="ti ti-circle-check fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Pemakaian Kendaraan</h5>
                        </div>
                        <div class="card-body">
                            <div id="vehicle-chart" style="min-height: 365px;"></div>
                        </div>
                    </div>

                    <?= view('layouts/footer-js') ?>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.41.0/dist/apexcharts.min.js"></script>

                    <script>
                        (function () {
                            // Fungsi untuk merender grafik
                            function renderMyChart() {
                                const el = document.querySelector("#vehicle-chart");
                                if (!el) return; // Jika elemen belum ada, batalkan

                                const rawData = <?= json_encode($chart_results) ?>;

                                const options = {
                                    chart: {
                                        type: 'bar',
                                        height: 350,
                                        parentHeightOffset: 0
                                    },
                                    plotOptions: {
                                        bar: { borderRadius: 4, horizontal: false }
                                    },
                                    colors: ['#4680ff'],
                                    series: [{
                                        name: 'Total Pemakaian',
                                        data: rawData.map(item => parseInt(item.y))
                                    }],
                                    xaxis: {
                                        categories: rawData.map(item => item.label)
                                    }
                                };

                                const chart = new ApexCharts(el, options);
                                chart.render().catch(err => console.log("Gagal render:", err));
                            }

                            // Jalankan setelah semua resource selesai di-load
                            if (document.readyState === "complete") {
                                renderMyChart();
                            } else {
                                window.addEventListener('load', renderMyChart);
                            }
                        })();
                    </script>
</body>