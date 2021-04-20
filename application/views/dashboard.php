<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_part/header');
?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span class="text-muted"><i class="far fa-calendar-alt mr-2"></i> <?= tgl_indo(date('Y-m-d')) ?> | <span id="waktu"></span></span>
        </div>
        <div class="col-sm-6 text-right">

        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Alert -->
      <div class="row">
        <div class="col-md-12">
          <div id="tampilAlert">
            <!-- Tampil Alert -->
          </div>
        </div>
      </div>

      <!-- Julah Data -->
      <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
            <div class="info-box mb-3 bg-teal">
              <span class="info-box-icon"><i class="far fa-user-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Siswa</span>
                <h3><span class="info-box-number"><?= angka($jml_siswa) ?></span></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-12">
            <div class="info-box mb-3 bg-orange">
              <span class="info-box-icon"><i class="far fa-address-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Guru</span>
                <h3><span class="info-box-number"><?= angka($jml_guru) ?></span></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-12">
            <div class="info-box mb-3 bg-teal">
              <span class="info-box-icon"><i class="fas fa-chair"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Rombel</span>
                <h3><span class="info-box-number"><?= angka($jml_rombel) ?></span></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-12">
            <div class="info-box mb-3 bg-orange">
              <span class="info-box-icon"><i class="fas fa-door-open"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Ruangan</span>
                <h3><span class="info-box-number"><?= angka($jml_ruangan) ?></span></h3>
              </div>
            </div>
          </div>
        </div>

      <!-- Modal Konfirmasi -->
      <div class="modal fade" id="mdlKonfirm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <div class="row justify-content-center align-items-center">
                <input type="hidden" name="id" class="form-control" id="idKonfirm">
                <h5 class="text-center text-muted" id="titleKonfirm"></h5>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="javascript:void(0)" data-dismiss="modal"><b>Tidak</b></a>
              <span id="btnKonfirm"></span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /Main content -->

</div>

<?php $this->load->view('_part/footer'); ?>
<script type="text/javascript">
  $(document).ready(function(){

    requestAnimationFrame(jam);
    loadAlertTa();

    $('#tampilAlert').on('click', '#btnAktif', function(){
      var id = $(this).data('id');
      $('#idKonfirm').val(id);
      $('#mdlKonfirm').modal('show');
      $('#titleKonfirm').text('INGIN MENGAKTIFKAN TAHUN AJARAN?');
      $('#btnKonfirm').html('<button type="button" class="btn btn-teal btn-rounded btn-loading" id="btnKonfirmAktif"> Aktifkan</button>');
    });

    $('#mdlKonfirm').on('click', '#btnKonfirmAktif', function(){
      var id = $('#idKonfirm').val();
      $('#mdlKonfirm').modal('hide');
      loadingScreenOn();
      $.get('<?= site_url('dashboard/aktifkan_ta') ?>', {id}, function() {
        loadAlertTa();
        loadingScreenOff();
      });
    });

  });

  function loadAlertTa()
  {
    $.getJSON('<?= site_url('dashboard/load_alert_ta') ?>', function(data) {
      var html;
      if (data.status_ta == 1) {
        html = `<div class="alert bg-teal">
                  <h6 class="mb-0"><i class="icon fas fa-check"></i>TA <b>`+data.tahun_ta+`</b> (Aktif)</h6>
                </div>`;
        $('#tampilAlert').html(html);
      } else {
        html = `<div class="alert bg-gray">
                  <h6><i class="icon fas fa-ban"></i>TA <b>`+data.tahun_ta+`</b> (Tidak Aktif)</h6>
                  <p>Mengaktifkan tahun ajaran akan merubah dan menyebarkan data untuk diakses pada semua user.</p>
                  <button type="button" class="btn btn-outline-light btn-rounded btn-sm" id="btnAktif" data-id="`+data.id_ta+`">Aktifkan Tahun Ajaran ini</button>
                </div>`;
        $('#tampilAlert').html(html);
      }
    });
  }

  function jam()
  {
    var now = new Date();
    var secs = ('0' + now.getSeconds()).slice(-2);
    var mins = ('0' + now.getMinutes()).slice(-2);
    var hr = now.getHours();
    var Time = hr + " : " + mins + " : " + secs;
    $('#waktu').html(Time);
    requestAnimationFrame(jam);
  }
</script>
</body>
</html>
