<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n">
            <i class="fas fa-trash"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>My</sup>TPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider"><!--ini adalah garis yang ada dibawah tulisan S5 TANK-->

    <!-- Heading -->
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



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin') ?>">
            <i class="fas fa-fw  fa-solid fa-user-lock"></i>
            <span>Data Admin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Nasabah') ?>">
            <i class="fas fa-fw  fa-duotone fa-users"></i>
            <span>Data Nasabah</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Kategori') ?>">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Kategori Sampah</span></a>

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Sampah
        </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Sampah_masuk') ?>">
            <i class="fas fa-fw fa-truck-moving"></i>
            <span>Sampah Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Prodi2') ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Sampah Terjual</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- End of Sidebar -->