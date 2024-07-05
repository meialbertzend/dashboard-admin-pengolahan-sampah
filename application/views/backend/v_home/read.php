<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    </h1>
<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        NASABAH</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nasabah_count; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        KATEGORI SAMPAH</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kategori_count; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SAMPAH MASUK
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $sampah_masuk_count; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-truck-moving fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        SAMPAH TERJUAL</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sampah_terjual_count; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Begin Page Content -->
<div class="container-fluid">
<div class="card">
        <div class="card-header">
            <h5>Chart Sampah Terjual</h5>
        </div>
        <div class="card-body">
            <canvas id="chart-sampah_terjual"></canvas>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = [
	'Jan','Feb','March','Apr','May','Jun','Jul','Agst','Sept','Oct','Nov','Dec',
    ];

const data = {
	labels: labels,
	datasets: [{
		label: 'Harga Sampah Terjual',
		backgroundColor: 'rgb(255, 99, 132)',
		borderColor: 'rgb(255, 99, 132)',
		data: [0, 15, 10, 45, 25, 50, 10],
	}]
};

const config = {
	type: 'line',
	data: data,
	options: {}
	};

    const myChart = new Chart(
	document.getElementById('chart-sampah_terjual'),
	config
    );

</script>