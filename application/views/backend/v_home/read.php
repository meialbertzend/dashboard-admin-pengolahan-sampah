<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Nasabah Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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

        <!-- Kategori Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                KATEGORI SAMPAH
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kategori_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sampah Masuk Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                SAMPAH MASUK
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sampah_masuk_count; ?></div>
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
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                SAMPAH TERJUAL
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sampah_terjual_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Area Sampah Terjual -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Terjual</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bar Sampah Masuk -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk</h6>
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
    // Grafik Sampah Terjual
    var ctxArea = document.getElementById('myAreaChart').getContext('2d');
    var myAreaChart = new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: <?= json_encode($labels_sampah_terjual); ?>,
            datasets: [{
                label: 'Sampah Terjual (kg)',
                data: <?= json_encode($data_sampah_terjual); ?>,
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointRadius: 3,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverRadius: 3,
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                pointHitRadius: 10,
                pointBorderWidth: 2,
                tension: 0.4
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Grafik Bar Sampah Masuk
    var ctxBar = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels_sampah_terjual); ?>,
            datasets: [{
                label: 'Sampah Terjual (kg)',
                backgroundColor: 'rgba(78, 115, 223, 0.5)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1,
                data: <?= json_encode($data_sampah_terjual); ?>,
                barPercentage: 0.5, // Setengah dari lebar default
                categoryPercentage: 0.5 // Setengah dari lebar default
            }, {
                label: 'Sampah Masuk (kg)',
                backgroundColor: 'rgba(54, 185, 204, 0.5)',
                borderColor: 'rgba(54, 185, 204, 1)',
                borderWidth: 1,
                data: <?= json_encode($data_sampah_masuk); ?>,
                barPercentage: 0.5, // Setengah dari lebar default
                categoryPercentage: 0.5 // Setengah dari lebar default
            }]
        },
        options: {
            indexAxis: 'y', // Mengubah sumbu x menjadi sumbu y
            scales: {
                x: {
                    stacked: false, // Tidak menumpuk bar
                    grid: {
                        display: true,
                    }
                },
                y: {
                    stacked: false, // Tidak menumpuk bar
                    grid: {
                        display: false,
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Donut Chart Sampah Masuk dan Keluar
    var ctxPie = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Sampah Masuk', 'Sampah Terjual'],
            datasets: [{
                data: [<?= $sampah_masuk_count; ?>, <?= $sampah_terjual_count; ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }]
        },
        options: {
            cutout: '60%',
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>