
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAK | Login</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.css">
</head>
<body class="hold-transition">

  <div class="login-page" style="background: url(<?= base_url() ?>assets/dist/img/bg-login.svg) center center no-repeat; background-size: cover;">
    <div class="col-xl-8 col-11">
      <div class="card-group shadow-lg">
        <div class="card p-2 bg-teal d-md-block d-none">
          <img class="brand-image m-2" style="width: 30%" src="<?= base_url() ?>assets/dist/img/logo-name.svg">
          <div class="text-center">
            <img class="img-fluid" style="width: 80%" src="<?= base_url() ?>assets/dist/img/illust/login.svg">
          </div>
        </div>

        <div class="card p-4">
          <div class="card-body">
            <div class="text-center d-sm-block d-md-none">
              <img class="brand-image mb-5" style="width: 70%" src="<?= base_url() ?>assets/dist/img/logo-name-color.svg">
            </div>
            <h3 class="text-teal"><b>Selamat Datang!</b></h3>
            <p class="text-muted">Sistem Informasi Manajemen Administrasi Kurikulum</p>
            <hr>
            <form id="formLogin" autocomplete="off">
              <div class="form-group form-tlp_email">
                <div class="input-group">
                  <input type="text" name="tlp_email" class="form-control" placeholder="No. Tlp./Email" id="tlpEmail" autofocus>
                </div>
              </div>
              <div class="form-group form-pin">
                <div class="input-group">
                  <input type="password" name="pin" class="form-control" maxlength="6" placeholder="PIN 6 angka" id="pin">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-eye" id="showPin"></span>
                      <span class="fas fa-eye-slash" style="display: none" id="hidePin"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn bg-teal btn-block shadow">Login</button>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-12 d-flex justify-content-end">
                  <small class="text-muted font-size-12">Powered By Donnelworks</small>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#showPin').click(function(){
      $(this).hide();
      $('#hidePin').show();
      $('#pin').prop('type', "text");
    });

    $('#hidePin').click(function(){
      $(this).hide();
      $('#showPin').show();
      $('#pin').prop('type', "password");
    });


    // Login
    $('#formLogin').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?= site_url('auth/proses') ?>',
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data){
          if(data.sukses == true){
            $('.form-control').removeClass('is-invalid');
            $('.invalid-message').remove();
            // document.cookie = "login=true";
            window.location.href="<?= site_url('login_ta') ?>";
          }else{
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

  })
</script>
</body>
</html>
