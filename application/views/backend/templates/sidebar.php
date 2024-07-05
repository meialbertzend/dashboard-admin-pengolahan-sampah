<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="Home">
        <div class="sidebar-brand-icon rotate-n">
            <img src="<?= base_url('assets/img/logo.png'); ?>" class="img-fluid mx-auto d-block p-1" alt="Logo" style="max-width: 100%; height: auto; ">
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

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="Home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>
    <?php endif; ?>
    <!-- Heading -->




    <!-- Nav Item - Charts -->


    <!-- Nav Item - Sampah Terjual -->


    <!-- Nav Item - Data Admin (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Admin') ?>">
                <i class="fas fa-fw fa-user-lock"></i>
                <span>Data Admin</span></a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Data Nasabah (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Nasabah') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Nasabah</span></a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Kategori Sampah (Hanya untuk Administrator) -->
    <?php if ($this->session->userdata('level') == 'administrator') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Kategori') ?>">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Kategori Sampah</span></a>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA SAMPAH
    </div>
    <!-- Nav Item - Sampah Masuk -->
    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Sampah_masuk') ?>">
                <i class="fas fa-fw fa-truck-moving"></i>
                <span>Sampah Masuk</span></a>
        </li>
    <?php endif; ?>

    <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'admin') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Sampah_terjual') ?>">
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