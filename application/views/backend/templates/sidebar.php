<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar style=" position: fixed; height: 100%; overflow-y: auto;"">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="<?= base_url('Home'); ?>">
        <div class="sidebar-brand-icon rotate-n">
            <img src="<?= base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block p-1" alt="Logo" style="max-width: 100%; height: auto;">
        </div>
        <div class="sidebar-brand-text mx-3"><sup>GO</sup>SARI</div>
    </a>

    <!-- Divider -->

    <!-- Nav Item - Data Admin (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <hr class="sidebar-divider"><!--ini adalah garis yang ada dibawah-->
        <div class="sidebar-heading">
            Administrator
        </div>
        <!-- Divider -->
    <?php endif; ?>
    <!-- Nav Item - Dashboard -->
    <?php if ($this->session->userdata('level') == 'admin') : ?>
        <hr class="sidebar-divider"><!--ini adalah garis yang ada dibawah-->
        <div class="sidebar-heading">
            Admin
        </div>
    <?php endif; ?>

    <li class="nav-item <?= $this->uri->segment(1) == 'Home' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>
    <?php endif; ?>


    <!-- Nav Item - Data Admin (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Admin' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Admin'); ?>">
                <i class="fas fa-fw fa-user-lock"></i>
                <span>Data Admin</span></a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Data Nasabah (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Nasabah' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Nasabah'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Nasabah</span></a>

        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        KATEGORI
    </div>

    <!-- Nav Item - Kategori Sampah (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Kategori' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Kategori'); ?>">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Kategori Sampah</span></a>
        </li>
    <?php endif; ?>
    <!-- Nav Item - Sub Kategori Sampah (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Sub_kategori' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Sub_kategori'); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Sub Kategori Sampah</span></a>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        TRANSAKSI
    </div>
    <!-- Nav Item - Sampah Masuk -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Sampah_masuk' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Sampah_masuk'); ?>">
                <i class="fas fa-hand-holding-usd"></i>
                <span>Transaksi Setor</span></a>
        </li>
    <?php endif; ?>


    <!-- Nav Item - Transaksi Tarik -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Transaksi_tarik' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Transaksi_tarik'); ?>">
                <i class="fas fa-money-bill-wave-alt"></i>
                <span>Transaksi Tarik</span></a>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        PENJUALAN
    </div>
    <!-- Nav Item - Sampah Terjual -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'Sampah_terjual' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('Sampah_terjual'); ?>">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Sampah Terjual</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->