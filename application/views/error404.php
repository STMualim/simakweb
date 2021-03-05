
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <title><?= $judul ?> | YASIRAPP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>files/img/logo/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

  </head>

  <body>
    <!-- <div class="home-btn d-none d-sm-block">
        <a href="<?= site_url('dashboard') ?>" class="text-dark"><i class="bx bx-home-alt h2"></i></a>
      </div> -->

      <section class="my-5 pt-sm-5">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="home-wrapper">
                <div class="mb-2">
                  <img src="<?= base_url() ?>files/img/logo/logo-dark.svg" alt="logo" height="40" />
                </div>

                <div class="row justify-content-center">
                  <div class="col-sm-4">
                    <div class="maintenance-img">
                      <img src="<?= base_url() ?>files/img/illust/404.svg" alt="" class="img-fluid mx-auto d-block">
                    </div>
                  </div>
                </div>
                <h3 class="mt-5">Maaf Halaman Sedang Dalam Maintenance</h3>
                <p>
                  Silahkan kembali lagi nanti. <br>
                  Terima kasih.
                </p>
                <div class="mt-4 text-center">
                  <a class="btn btn-primary waves-effect waves-light" href="<?= site_url('dashboard') ?>">Kembali ke Dashboard</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>

  </body>

</html>
