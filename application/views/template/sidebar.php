<?php
$notif_izin      = $this->db->get_where('perizinan', ['status' => 'Proses', 'id_siswa' => $user['id']])->num_rows();
$notif_konseling = $this->db->get_where('konseling', ['status' => 'Respon', 'id_siswa' => $user['id']])->num_rows();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i aria-hidden="true"><img src="<?= base_url(); ?>assets/img/logo_sbh.png" width="85"></i>
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Tracer Study</sup></div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard_alumni') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- <li class="nav-item <?= ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('siswa/payout'); ?>">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Data Transaksi </span>
        </a>
    </li> -->
    <li class="nav-item <?= ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('alumni/kusioner'); ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Form Kusioner  </span>
        </a>
    </li>

    
        <li class="nav-item active">

        <li class="nav-item">

        <a class="nav-link" href="<?= base_url('siswa/konseling'); ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Career Study</span>
           
            
   
        </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
       

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Setting
                </div>

                <!-- Nav Item - Charts -->
                <?php if ($menu == 'menu-3') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('siswa/profile') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>ProfIle</span>
                    </a>
                    </li>

                    <?php if ($menu == 'menu-4') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('siswa/edit_pass') ?>">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Password</span>
                        </a>
                        </li>

                        <!-- Nav Item - Tables -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Keluar</span>
                            </a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

</ul>
<!-- End of Sidebar -->