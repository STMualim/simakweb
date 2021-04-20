<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Sidebar -->
<aside class="main-sidebar bg-teal sidebar-dark-orange elevation-0">
  <a href="<?= site_url('dashboard') ?>" class="brand-link text-center">
    <img src="<?= base_url() ?>assets/dist/img/logo.svg" alt="Logo" class="brand-image">
    <span style="font-family: 'Montserrat', cursive;" class="brand-text font-weight-bold text-light text-center">
      SIMAK
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="form-inline mt-3">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-3 pb-5">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">

        <!-- DASHBOARD -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>" class="nav-link">
            <i class="nav-icon bx bx-home-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php if ($this->fungsi->level() == 0 || $this->fungsi->pegawai()->admin_pegawai == 1) { ?>
          <li class="nav-header">ADMIN</li>

          <!-- TAHUN AJARAN -->
          <li class="nav-item">
            <a href="<?= site_url('admin/tahun_ajaran') ?>" class="nav-link">
              <i class="nav-icon bx bx-calendar"></i>
              <p>Tahun Ajaran</p>
            </a>
          </li>

          <!-- JURUSAN -->
          <li class="nav-item">
            <a href="<?= site_url('admin/jurusan') ?>" class="nav-link">
              <i class="nav-icon bx bx-book-reader"></i>
              <p>Jurusan</p>
            </a>
          </li>

          <!-- DATA GURU/STAF -->
          <li class="nav-item">
            <a href="<?= site_url('admin/pegawai') ?>" class="nav-link">
              <i class="nav-icon bx bx-id-card"></i>
              <p>Data Pegawai</p>
            </a>
          </li>

          <!-- MATA PELAJARAN -->
          <li class="nav-item">
            <a href="<?= site_url('admin/mapel') ?>" class="nav-link">
              <i class="nav-icon bx bx-book-bookmark"></i>
              <p>Mata Pelajaran</p>
            </a>
          </li>

          <!-- KELAS -->
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon bx bx-chair"></i>
              <p>Kelas<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('admin/kelas') ?>" class="nav-link">
                  <i class="bx bx-radio-circle nav-icon"></i>
                  <p>Tingkat Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/rombel') ?>" class="nav-link">
                  <i class="bx bx-radio-circle nav-icon"></i>
                  <p>Rombongan Belajar</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- RUANGAN -->
          <li class="nav-item">
            <a href="<?= site_url('admin/ruangan') ?>" class="nav-link">
              <i class="nav-icon bx bx-door-open"></i>
              <p>Ruangan</p>
            </a>
          </li>

          <!-- TUGAS AJAR -->
          <li class="nav-item">
            <a href="<?= site_url('admin/tugas_ajar') ?>" class="nav-link">
              <i class="nav-icon bx bx-task"></i>
              <p>Tugas Ajar</p>
            </a>
          </li>

          <!-- JADWAL PELAJARAN  -->
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon bx bx-time"></i>
              <p>Jadwal<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('admin/hari') ?>" class="nav-link">
                  <i class="bx bx-radio-circle nav-icon"></i>
                  <p>Hari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/waktu') ?>" class="nav-link">
                  <i class="bx bx-radio-circle nav-icon"></i>
                  <p>Waktu Mengajar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/jadwal') ?>" class="nav-link">
                  <i class="bx bx-radio-circle nav-icon"></i>
                  <p>Jadwal Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- DATA SISWA -->
          <li class="nav-item">
            <a href="<?= site_url('admin/siswa') ?>" class="nav-link">
              <i class="nav-icon bx bx-user-circle"></i>
              <p>Data Siswa</p>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->fungsi->level() != 0) { ?>
          <?php if ($this->fungsi->level() == 2 || $this->fungsi->pegawai()->admin_pegawai == null) { ?>
            <li class="nav-header">GURU</li>

            <!-- KOPETENSI DASAR -->
            <li class="nav-item">
              <a href="<?= site_url('guru/kd') ?>" class="nav-link">
                <i class="nav-icon bx bx-flag"></i>
                <p>Kopetensi Dasar</p>
              </a>
            </li>
          <?php } ?>
        <?php } ?>

      </ul>
    </nav>
    <!-- /Sidebar Menu -->
  </div>
  <!-- /Sidebar -->
</aside>
