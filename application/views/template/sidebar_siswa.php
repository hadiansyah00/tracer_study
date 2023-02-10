<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex text-gardient-warning align-items-center bg-light justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i aria-hidden="true"><img src="<?= base_url(); ?>assets/img/logo_sbh.png" width="85"></i>
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('pmb/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item <?= ($this->uri->segment(2) == 'biodata') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pmb/biodata'); ?>">
            <i class="fas fa-fw  fa-file-contract"></i>
            <span> Pendaftaran <strong>PMB</strong> </span>
        </a>
    </li>

    <!-- <li class="nav-item <?= ($this->uri->segment(2) == 'biodata') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pmb/kusioner'); ?>">
            <i class="fas fa-fw  fa-file-contract"></i>
            <span> Kusioner</span>
        </a>
    </li> -->
    <!-- <?php if ($menu == 'pembayaran') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('pmb/pembayaran'); ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Pembayaran</span> &nbsp;
        </a>
        </li> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <?php if ($menu == 'pendaftaran') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('pmb/status_pmb') ?>">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>Status Pendaftaran</span> &nbsp;
            </a>
            </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Nav Item - Tables -->
    <li class="nav-item">

        <a class=" nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span> &nbsp;
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin meninggalkan dashboard?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih <b>Keluar</b> jika kamu ingin keluar dari dashboard</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= base_url('pmb/logout') ?>"><i class="bi bi-box-arrow-right"></i> Keluar</a>
            </div>
        </div>
    </div>
</div>