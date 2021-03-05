<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Body Section -->
<body class="hold-transition sidebar-mini layout-fixed accent-teal">
  <!-- Wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="bx bx-menu bx-sm"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button">
            <i class="bx bx-fullscreen bx-sm"></i>
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
            <i class="bx bx-bell bx-tada bx-sm"></i>
            <span class="badge badge-primary bg-orange navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

        <!-- Users -->
        <li class="nav-item dropdown user-menu">
          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-0" alt="User">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <span class="dropdown-header">
              <?php if ($this->fungsi->level() == 0) { ?>
                <strong><?= $this->fungsi->user()->nama_user ?></strong> <br>
              <?php } else { ?>
                <strong><?= $this->fungsi->pegawai()->nama_pegawai ?></strong> <br>
              <?php } ?>
              <?= ($this->fungsi->level() == 0 ? "Super Admin" : ($this->fungsi->level() == 1 ? "Admin" : "Guru")) ?>
            </span>
            <div class="dropdown-divider"></div>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="bx bx-user-circle mr-2"></i> Profile
            </a>
            <a href="javascript:void(0)" class="dropdown-item">
              <i class="bx bx-cog mr-2"></i> Setting Akun
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url('auth/logout_ta') ?>" class="dropdown-item mb-2">
              <i class="bx bx-calendar mr-2"></i> Ganti Tahun Ajaran
            </a>
            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item mb-2">
              <i class="bx bx-power-off mr-2"></i> Keluar
            </a>
          </div>
        </li>

      </ul>
    </nav>
