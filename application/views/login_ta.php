
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAK | Login Tahun Ajaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Boxicon -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/boxicons/css/boxicons.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.css">
</head>
<body class="hold-transition">

  <div class="login-page" style="background: url(<?= base_url() ?>assets/dist/img/bg-login.svg) center center no-repeat; background-size: cover;">
    <div class="col-xl-4 col-md-4 col-sm-11">

      <div class="card shadow">
        <div class="card-body text-center ">
          <div class="d-sm-block d-md-none">
            <img class="brand-image mb-4" style="width: 70%" src="<?= base_url() ?>assets/dist/img/logo-name-color.svg">
          </div>
          <?php if ($this->fungsi->level() == 0) { ?>
            <h4 class="text-teal">Halo, <b><?= $this->fungsi->user()->nama_user ?></b></h4>
          <?php } else { ?>
            <h4 class="text-teal">Halo, <b><?= $this->fungsi->pegawai()->nama_pegawai ?></b></h4>
          <?php } ?>
          <p class="text-muted">Pilih Tahun Ajaran Untuk Masuk</p>
        </div>

        <div class="card-body overflow-auto" style="max-height: 300px;">
          <ul class="products-list product-list-in-card" id="daftarTahun">
            <!-- Tampil Daftar Tahun -->
          </ul>
        </div>
        <div class="card-footer text-right">
          <a href="<?= site_url('auth/logout') ?>" class="btn btn-orange btn-rounded"><i class="bx bx-power-off"></i> Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="mdlData">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-muted"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Form Data -->
        <form id="formData">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group form-tahun">
                  <label>Tahun</label>
                  <input type="text" name="tahun" class="form-control" id="tahun">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <a href="javascript:void(0)" data-dismiss="modal"><b>Batal</b></a>
            <button type="submit" class="btn btn-teal btn-rounded btn-loading" id="btnSimpan"> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- App -->
<script src="<?= base_url() ?>assets/dist/js/app.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    loadData();

    // Pilih Tahun Ajaran
    $('#daftarTahun').on('click', '.list-ta', function(){
      var id = $(this).data('id');

      $.ajax({
        url: '<?= site_url('login_ta/pilih_ta') ?>',
        type: 'post',
        data: {id},
        success: function(){
          window.location.href="<?= site_url('dashboard') ?>";
        }
      });
    });

    // Tambah Tahun
    $('#daftarTahun').on('click', '#btnTambah', function(){
      $('#mdlData').modal('show');
      $('.modal-title').text("Tambah Data");
      $('#formData').trigger('reset');
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();
      $('#mdlData').on('shown.bs.modal', function(){
        $('#tahun').focus();
      });
    });

    // Submit Data
    $('#formData').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?= site_url('login_ta/tambah') ?>',
        type: 'post',
        data: $('#formData').serialize(),
        dataType: 'json',
        beforeSend: function(){
          loadingBtnOn();
        },
        success: function(data){
          loadingBtnOff();
          if(data.sukses == true){
            alertSukses("Berhasil disimpan");
            loadData();
            $('#tahun').focus();
            $('#formData').trigger('reset');
            $('.form-control').removeClass('is-invalid');
            $('.invalid-message').remove();
          }else{
            alertError("Gagal disimpan");
            $.each(data.error,function(key, value){
              var element = $('[name="'+key+'"]');
              var form = $('.form-'+key+'');
              element.closest('.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : '');
              element.closest('.form-group')
              .find('.invalid-message')
              .remove();
              form.append(value);
            });
          }
        }
      });
    });

  });

  function loadData()
  {
    $.getJSON('<?= site_url('login_ta/load_data') ?>', function(data) {
      var html;
      if (data.length != 0) {
        html = $.map(data, function(data, i) {
          return `<div class="callout callout-teal shadow-sm list-ta" style="cursor: pointer;" data-id="`+data.id_ta+`">
                    <h5 class="text-teal"><b>`+data.tahun_ta+`</b></h5>
                    <p class="text-muted">`+(data.status_ta == 1 ? '<span class="badge bg-teal">Aktif</span>' : '<span class="badge bg-orange">Tidak Aktif</span>')+`</p>
                  </div>`;
        });
        $('#daftarTahun').html(html);
      } else {
        html = `<div class="text-center">
                  <h1 class="text-soft-teal mb-0" style="font-size: 100px;" disabled>
                    <i class="bx bx-calendar"></i>
                  </h1>
                  <p class="text-muted">Tahun ajaran belum dibuat</p>
                  <button type="button" class="btn btn-teal btn-rounded" id="btnTambah"><i class="fas fa-plus"></i> Buat Tahun Ajaran</button>
                </div>`;
       $('#daftarTahun').html(html);
      }
    });
  }
</script>
</body>
</html>
