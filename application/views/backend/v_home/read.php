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
                            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
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
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow">
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
            <div class="card shadow mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk dan Terjual</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bar Pendapatan -->
            <div class="card shadow mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapatan dari Penjualan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myPendapatanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- HTML untuk Drop-Down dan Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sampah Berdasarkan Kategori</h6>
                            <div>
                                <select id="chartType" class="form-control">
                                    <option value="masuk">Sampah Masuk</option>
                                    <option value="terjual">Sampah Terjual</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie">
                                <canvas id="myDonutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk dan Sampah Terjual</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie">
                                <canvas id="myPieChart"></canvas>
                            </div>
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
                            callback: function(value, index, values) {
                                // Format angka dengan koma 2 angka desimal
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2
                                }).format(value) + ' Kg';
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
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Format tooltip dengan koma 2 angka desimal
                                var value = tooltipItem.raw;
                                return tooltipItem.dataset.label + ': ' + new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2
                                }).format(value) + ' Kg';
                            }
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
                                // Format angka dengan koma 2 angka desimal
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2
                                }).format(value) + ' Kg';
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
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Format tooltip dengan koma 2 angka desimal
                                var value = tooltipItem.raw;
                                return tooltipItem.dataset.label + ': ' + new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2
                                }).format(value) + ' Kg';
                            }
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
        /// Ambil data total pendapatan per bulan dari PHP
        var labels = <?= json_encode(array_column($total_pendapatan_per_bulan, 'bulan')); ?>;
        var data = <?= json_encode(array_column($total_pendapatan_per_bulan, 'total_pendapatan')); ?>;

        // Warna merah dari Bootstrap "danger"
        var dangerColor = 'rgb(220, 53, 69)'; // Sesuaikan dengan nilai RGB untuk warna merah di Bootstrap

        // Bar Chart
        var ctxBar = document.getElementById('myPendapatanChart').getContext('2d');
        var myBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Pendapatan',
                    data: data,
                    backgroundColor: dangerColor, // Gunakan warna merah dari Bootstrap
                    borderColor: dangerColor, // Gunakan warna merah dari Bootstrap
                    hoverBackgroundColor: 'rgba(220, 53, 69, 0.9)', // Opacity 0.9 untuk efek hover
                    hoverBorderColor: 'rgba(220, 53, 69, 1)', // Opacity 1 untuk efek hover
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
                                return 'Rp ' + value.toLocaleString('id-ID', {
                                    minimumFractionDigits: 2
                                });
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
                plugins: {
                    tooltip: {
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
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Rp ' + tooltipItem.formattedValue;
                            }
                        }
                    }
                },
                legend: {
                    display: false
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
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                return tooltipItem.label + ': ' + new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2
                                }).format(value) + ' Kg';
                            }
                        }
                    }
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80
            }
        });

        // Donut Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myDonutChart').getContext('2d');
            const chartTypeSelect = document.getElementById('chartType');

            const dataMasuk = <?= json_encode($sampah_masuk_per_kategori); ?>;
            const dataTerjual = <?= json_encode($sampah_terjual_per_kategori); ?>;

            const chartData = {
                labels: Object.keys(dataMasuk),
                datasets: [{
                    data: Object.values(dataMasuk),
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                    hoverBackgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
                }]
            };

            const donutChart = new Chart(ctx, {
                type: 'doughnut',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    var value = tooltipItem.raw;
                                    return tooltipItem.label + ': ' + new Intl.NumberFormat('id-ID', {
                                        style: 'decimal',
                                        minimumFractionDigits: 2
                                    }).format(value) + ' Kg';
                                }
                            }
                        }
                    }
                }
            });

            chartTypeSelect.addEventListener('change', function() {
                if (this.value === 'masuk') {
                    donutChart.data.labels = Object.keys(dataMasuk);
                    donutChart.data.datasets[0].data = Object.values(dataMasuk);
                } else {
                    donutChart.data.labels = Object.keys(dataTerjual);
                    donutChart.data.datasets[0].data = Object.values(dataTerjual);
                }
                donutChart.update();
            });
        });
    </script>