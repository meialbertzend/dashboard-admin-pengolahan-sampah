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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Sampah Masuk dan Terjual</h6>
                    <div>
                        <select id="chartType" class="form-control">
                            <option value="area">Area Chart</option>
                            <option value="bar">Bar Chart</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="combinedChart"></canvas>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Donut Sampah Masuk dan Terjual</h6>
                            <div>
                                <select id="donutChartType" class="form-control">
                                    <option value="masuk">Sampah Masuk</option>
                                    <option value="terjual">Sampah Terjual</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myDonutChart"></canvas>
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
        document.addEventListener('DOMContentLoaded', function() {
            const combinedChartCtx = document.getElementById('combinedChart').getContext('2d');
            let combinedChart;

            const sampahMasukData = <?= json_encode($sampah_masuk_data); ?>;
            const sampahTerjualData = <?= json_encode($sampah_terjual_data); ?>;
            const labels = <?= json_encode($labels); ?>;

            function createCombinedChart(chartType) {
                if (combinedChart) {
                    combinedChart.destroy();
                }

                let datasets;
                if (chartType === 'area') {
                    datasets = [{
                        label: 'Sampah Masuk',
                        data: sampahMasukData,
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
                        data: sampahTerjualData,
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
                    }];
                } else if (chartType === 'bar') {
                    datasets = [{
                        label: 'Sampah Masuk',
                        data: sampahMasukData,
                        backgroundColor: 'rgba(78, 115, 223, 1)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        hoverBackgroundColor: 'rgba(78, 115, 223, 0.9)',
                        hoverBorderColor: 'rgba(78, 115, 223, 1)',
                    }, {
                        label: 'Sampah Terjual',
                        data: sampahTerjualData,
                        backgroundColor: 'rgba(28, 200, 138, 1)',
                        borderColor: 'rgba(28, 200, 138, 1)',
                        hoverBackgroundColor: 'rgba(28, 200, 138, 0.9)',
                        hoverBorderColor: 'rgba(28, 200, 138, 1)',
                    }];
                }

                combinedChart = new Chart(combinedChartCtx, {
                    type: (chartType === 'area') ? 'line' : 'bar',
                    data: {
                        labels: labels,
                        datasets: datasets
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
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true
                            }
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
            }

            createCombinedChart('area'); // Default chart type

            const combinedChartTypeSelect = document.getElementById('chartType');
            combinedChartTypeSelect.addEventListener('change', function() {
                const selectedChartType = combinedChartTypeSelect.value;
                createCombinedChart(selectedChartType);
            });

            // Event listener untuk reset chart jika membutuhkan
            window.addEventListener('resize', function() {
                if (combinedChart) {
                    combinedChart.resize();
                }
            });
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

        //h
        document.addEventListener('DOMContentLoaded', function() {
            const donutChartCtx = document.getElementById('myDonutChart').getContext('2d');
            let donutChart;

            const dataMasuk = <?= json_encode($sampah_masuk_per_kategori); ?>;
            const dataTerjual = <?= json_encode($sampah_terjual_per_kategori); ?>;

            function createDonutChart(data) {
                if (donutChart) {
                    donutChart.destroy();
                }

                donutChart = new Chart(donutChartCtx, {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(data),
                        datasets: [{
                            data: Object.values(data),
                            backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                            hoverBackgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
                        }]
                    },
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
            }

            createDonutChart(dataMasuk); // Default: Sampah Masuk

            const donutChartTypeSelect = document.getElementById('donutChartType');
            donutChartTypeSelect.addEventListener('change', function() {
                const selectedDonutChartType = donutChartTypeSelect.value;
                let data;
                if (selectedDonutChartType === 'masuk') {
                    data = dataMasuk;
                } else if (selectedDonutChartType === 'terjual') {
                    data = dataTerjual;
                }
                createDonutChart(data);
            });

            // Event listener untuk reset chart jika membutuhkan
            window.addEventListener('resize', function() {
                if (donutChart) {
                    donutChart.resize();
                }
            });
        });
    </script>