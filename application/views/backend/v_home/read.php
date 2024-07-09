<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Nasabah Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                NASABAH
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nasabah_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sampah Masuk Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-custom shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-custom text-uppercase mb-1">
                                SAMPAH MASUK
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($sampah_masuk_count, 2, ",", ".") ?> Kg</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-truck-moving fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sampah Terjual Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                SAMPAH TERJUAL
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($sampah_terjual_count, 2, ",", ".") ?> Kg
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan Dari Jual Sampah -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                TOTAL PENDAPATAN
                            </div>
                            <?php if (isset($pendapatan_count)) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp. <?= number_format($pendapatan_count, 0, ",", ".") ?>
                                </div>
                            <?php else : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Data tidak tersedia
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Grafik Area Sampah Masuk & Terjual -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk dan Terjual</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bar Sampah Masuk dan Terjual-->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk dan Terjual</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Donut Chart Sampah Masuk dan Keluar -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk VS Sampah Terjual</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Area Chart
    var ctxArea = document.getElementById('myAreaChart').getContext('2d');
    var myAreaChart = new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: <?= json_encode($labels); ?>,
            datasets: [{
                label: 'Sampah Masuk',
                data: <?= json_encode($sampah_masuk_data); ?>,
                borderColor: 'rgba(78, 115, 223, 1)',
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverRadius: 3,
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
                tension: 0.3,
            }, {
                label: 'Sampah Terjual',
                data: <?= json_encode($sampah_terjual_data); ?>,
                borderColor: 'rgba(28, 200, 138, 1)',
                backgroundColor: 'rgba(28, 200, 138, 0.05)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(28, 200, 138, 1)',
                pointBorderColor: 'rgba(28, 200, 138, 1)',
                pointHoverRadius: 3,
                pointHoverBackgroundColor: 'rgba(28, 200, 138, 1)',
                pointHoverBorderColor: 'rgba(28, 200, 138, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
                tension: 0.3,
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    time: {
                        unit: 'date'
                    },
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                },
                y: {
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return value + ' kg';
                        }
                    },
                    grid: {
                        color: 'rgb(234, 236, 244)',
                        zeroLineColor: 'rgb(234, 236, 244)',
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: 'rgb(255, 255, 255)',
                bodyColor: '#858796',
                titleColor: '#6e707e',
                titleMarginBottom: 10,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            }
        }
    });

    // Bar Chart
    var ctxBar = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels); ?>,
            datasets: [{
                label: 'Sampah Masuk',
                data: <?= json_encode($sampah_masuk_data); ?>,
                backgroundColor: 'rgba(78, 115, 223, 1)',
                borderColor: 'rgba(78, 115, 223, 1)',
                hoverBackgroundColor: 'rgba(78, 115, 223, 0.9)',
                hoverBorderColor: 'rgba(78, 115, 223, 1)',
            }, {
                label: 'Sampah Terjual',
                data: <?= json_encode($sampah_terjual_data); ?>,
                backgroundColor: 'rgba(28, 200, 138, 1)',
                borderColor: 'rgba(28, 200, 138, 1)',
                hoverBackgroundColor: 'rgba(28, 200, 138, 0.9)',
                hoverBorderColor: 'rgba(28, 200, 138, 1)',
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                },
                y: {
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return value + ' kg';
                        }
                    },
                    grid: {
                        display: true,
                        drawBorder: false,
                        color: 'rgb(234, 236, 244)',
                        zeroLineColor: 'rgb(234, 236, 244)',
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: 'rgb(255, 255, 255)',
                bodyColor: '#858796',
                titleColor: '#6e707e',
                titleMarginBottom: 10,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            }
        }
    });

    // Pie Chart
    var ctxPie = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Sampah Masuk', 'Sampah Terjual'],
            datasets: [{
                data: [<?= json_encode(array_sum($sampah_masuk_data)); ?>, <?= json_encode(array_sum($sampah_terjual_data)); ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)'
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: 'rgb(255, 255, 255)',
                bodyColor: '#858796',
                titleColor: '#6e707e',
                titleMarginBottom: 10,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80
        }
    });
</script>