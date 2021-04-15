<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_part/header');
?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row align-items-center mb-2">
        <div class="col-6">
          <h4 class="m-0"><?= $judul ?></h4>
          <p class="text-muted content-subtitle"><?= $this->fungsi->ta()->tahun_ta ?></p>
        </div>
        <div class="col-6 text-right">
          <!-- Tombol -->
          <button type="button" class="btn btn-rounded btn-teal d-none d-sm-inline btn-tambah">
            <i class="fas fa-plus"></i> Tambah Data
          </button>
          <!--  -->
          <button type="button" class="btn btn-rounded btn-teal d-inline d-sm-none dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-plus"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item btn-tambah" href="javascript:void(0)">Tambah Data</a>
            <!-- <div class="dropdown-divider"></div> -->
          </div>
          <!-- /Tombol -->
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card shadow">
            <!-- Filter -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kodeFilter" placeholder="Kode">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input type="text" class="form-control" id="namaFilter" placeholder="Nama">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="jenisFilter">
                      <option value="">Semua Jenis</option>
                      <option value="1">Guru</option>
                      <option value="2">Staf</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-teal btn-rounded" id="btnFilter"><i class="bx bx-filter-alt"></i> Filter</button>
                  <a href="javascript:void(0)" class="ml-2" id="resetFilter"><b>Reset</b></a>
                </div>
              </div>
            </div>

            <!-- Table List -->
            <div class="card-body p-0">
              <table id="tblData" class="table table-hover table-striped dt-responsive" style="width: 100%;">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Dibuat</th>
                    <th></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="mdlData" style="max-height: 100vh;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-muted"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Form Data -->
            <form id="formData" autocomplete="off" class="form-horizontal">
              <div class="modal-body overflow-auto">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="step" id="step" value="1">

                <!-- Nav Form Step -->
                <ul class="step-nav justify-content-center">
                  <li class="step-item active" id="stepItem1">
                    <span class="step-circle">1</span>
                    <span class="step-label text-muted d-none d-lg-inline">Identitas Pegawai</span>
                  </li>
                  <div class="step-line"></div>
                  <li class="step-item" id="stepItem2">
                    <span class="step-circle">2</span>
                    <span class="step-label text-muted d-none d-lg-inline">Pend. Pegawai</span>
                  </li>
                  <div class="step-line"></div>
                  <li class="step-item" id="stepItem3">
                    <span class="step-circle">3</span>
                    <span class="step-label text-muted d-none d-lg-inline">Akun Pegawai</span>
                  </li>
                </ul>
                <!--  -->

                <!-- Step Content -->
                <div class="step-content-wrapper active" id="stepContent1">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Pegawai</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="jenis" id="jenis">
                          <option value="1">Guru</option>
                          <option value="2">Staf</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Kode</label>
                      <div class="col-sm-8 form-kode">
                        <input type="text" name="kode" class="form-control" id="kode">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Pegawai (tanpa gelar)</label>
                      <div class="col-sm-8 form-nama">
                        <input type="text" name="nama" class="form-control" id="nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIP</label>
                      <div class="col-sm-8">
                        <input type="text" name="nip" class="form-control" id="nip">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. KTP</label>
                      <div class="col-sm-8">
                        <input type="text" name="ktp" class="form-control" id="ktp">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NPWP</label>
                      <div class="col-sm-8">
                        <input type="text" name="npwp" class="form-control" id="npwp">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" name="tmp_lahir" class="form-control" id="tmpLahir">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Tgl. Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" name="tgl_lahir" class="form-control tgl" id="tglLahir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="200" placeholder="(max. 200)"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="jenkel" id="jenkel">
                          <option value="1">Laki-Laki</option>
                          <option value="2">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Agama</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="agama" id="agama">
                          <option value="1">Islam</option>
                          <option value="2">Kristen</option>
                          <option value="3">Katholik</option>
                          <option value="4">Buddha</option>
                          <option value="5">Hindu</option>
                          <option value="6">Konghucu</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Perkawinan</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="status_kawin" id="statusKawin">
                          <option value="1">Belum Kawin</option>
                          <option value="2">Kawin</option>
                          <option value="3">Janda/Duda</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="step-content-wrapper" id="stepContent2">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="pend_akhir" id="pendAkhir">
                          <option value="1">SMA/SMK</option>
                          <option value="2">D3</option>
                          <option value="3">S1/D4</option>
                          <option value="4">S2</option>
                          <option value="5">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jurusan Pendidikan</label>
                      <div class="col-sm-8">
                        <input type="text" name="jurusan_pend" class="form-control" id="jurusanPend">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Gelar Depan</label>
                      <div class="col-sm-8">
                        <input type="text" name="gelar_depan" class="form-control" id="gelarDepan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Gelar Belakang</label>
                      <div class="col-sm-8">
                        <input type="text" name="gelar_belakang" class="form-control" id="gelarBelakang">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="step-content-wrapper" id="stepContent3">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mulai Tugas</label>
                      <div class="col-sm-8">
                        <input type="text" name="mulai_tugas" class="form-control tgl" id="mulaiTugas" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Sebagai Guru BP/BK</label>
                      <div class="col-sm-8">
                        <div class="icheck-teal">
                          <input type="checkbox" name="bp" value="1" id="bp">
                          <label for="bp"></label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jadikan Sebagai Admin</label>
                      <div class="col-sm-8">
                        <div class="icheck-teal">
                          <input type="checkbox" name="admin" value="1" id="admin">
                          <label for="admin"></label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. Tlp/Hp</label>
                      <div class="col-sm-8 form-tlp">
                        <input type="number" name="tlp" class="form-control" id="tlp">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">PIN Akun</label>
                      <div class="col-sm-8 form-pin">
                        <div class="input-group">
                          <input type="text" name="pin" class="form-control" maxlength="6" id="pin" readonly>
                          <div class="input-group-append">
                            <button type="button" class="btn btn-teal" id="btnRandom"><i class="fas fa-sync"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--  -->

              </div>
              <div class="modal-footer justify-content-between">
                <a href="javascript:void(0)" data-dismiss="modal"><b>Batal</b></a>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-rounded btn-orange" id="btnStepPrev" disabled><i class="fas fa-angle-left"></i> Sebelumnya</button>
                  </div>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-rounded btn-orange" id="btnStepNext">Selanjutnya <i class="fas fa-angle-right"></i></button>
                  </div>
                </div>
                <button type="button" class="btn btn-teal btn-rounded btn-loading" id="btnSimpan" disabled> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="mdlDetail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-muted"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <tr>
                  <td class="text-right"><b>Nama</b></td>
                  <td id="namaDetail"></td>
                  <td class="text-right"><b>Kode</b></td>
                  <td id="kodeDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Jenis</b></td>
                  <td id="jenisDetail"></td>
                  <td class="text-right"><b>NIP</b></td>
                  <td id="nipDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>No. KTP</b></td>
                  <td id="ktpDetail"></td>
                  <td class="text-right"><b>NPWP</b></td>
                  <td id="npwpDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Tempat Lahir</b></td>
                  <td id="tmpLahirDetail"></td>
                  <td class="text-right"><b>Tgl. Lahir</b></td>
                  <td id="tglLahirDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Alamat</b></td>
                  <td colspan="3" id="alamatDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Jenis Kelamin</b></td>
                  <td id="jenkelDetail"></td>
                  <td class="text-right"><b>Agama</b></td>
                  <td id="agamaDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Status Perkawinan</b></td>
                  <td id="statusKawinDetail"></td>
                  <td class="text-right"><b>Pend. Terakhir</b></td>
                  <td id="pendAkhirDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Jurusan Pend.</b></td>
                  <td id="jurusanPendDetail"></td>
                  <td class="text-right"><b>Mulai Tugas</b></td>
                  <td id="mulaiTugasDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>Guru BP</b></td>
                  <td id="bpDetail"></td>
                  <td class="text-right"><b>Sebagai Admin</b></td>
                  <td id="adminDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>No. Tlp.</b></td>
                  <td id="tlpDetail"></td>
                  <td class="text-right"><b>Email</b></td>
                  <td id="emailDetail"></td>
                </tr>
                <tr>
                  <td class="text-right"><b>PIN</b></td>
                  <td colspan="3" id="pinDetail"></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="javascript:void(0)" data-dismiss="modal"><b>Tutup</b></a>
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

    var simpan;
    var step = 3;
    var s = 1;

    loadData();

    // Tanggal Mask
    $('.tgl').inputmask('dd-mm-yyyy', { 'placeholder': 'hh-bb-tttt' });

    // Filter
    $('#btnFilter').click(function(){
      $('#tblData').DataTable().destroy();
      loadData();
    });

    // Reset Filter
    $('#resetFilter').click(function(){
      $('#kodeFilter').val("");
      $('#namaFilter').val("");
      $('#jenisFilter').val("");
      $('#tblData').DataTable().destroy();
      loadData();
    });

    // Random Pin
    $('#btnRandom').click(function(){
      $('#pin').val(randNumb(111111, 999999));
    });

    // Pilih Jenis
    $('#jenis').change(function(){
      var jenis = $(this).val();
      if (jenis == 2) {
        $('#pin').val("");
        $('#btnRandom').prop('disabled', true);

        if ($('#admin').is(':checked') && jenis == 2) {
          $('#btnRandom').prop('disabled', false);
        }
      } else {
        $('#btnRandom').prop('disabled', false);
      }
    });

    // Admin Cek
    $('#admin').change(function(){
      var jenis = $('#jenis').val();
      if ($(this).is(':checked') && jenis == 2) {
        $('#btnRandom').prop('disabled', false);
      } else if ($(this).is(':checked') && jenis == 1) {
        $('#btnRandom').prop('disabled', false);
      } else if (jenis == 2) {
        $('#pin').val("");
        $('#btnRandom').prop('disabled', true);
      } else {
        $('#btnRandom').prop('disabled', false);
      }
    });

    // Tambah Data
    $('.btn-tambah').click(function(){
      simpan = "tambah";
      $('#mdlData').modal({backdrop:'static'});
      $('.modal-title').text("Tambah Data");
      $('#formData').trigger('reset');
      $('#jenis').val(1).trigger('change');
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();

      $('.step-item').removeClass('active');
      $('.step-content-wrapper').removeClass('active');
      $('#stepItem1').addClass('active');
      $('#stepContent1').addClass('active');
      $('#btnStepNext').prop('disabled', false);
      $('#btnSimpan').prop('disabled', true);
      $('#btnStepPrev').prop('disabled', true);
      $('#step').val(1);

      $('#mdlData').on('shown.bs.modal', function(){
        $('#kode').focus();
      });
    });

    // Edit Data
    $('#tblData').on('click', '.edit-data', function(){
      var id = $(this).data('id');
      var jenis = $(this).data('jenis');
      var kode = $(this).data('kode');
      var nama = $(this).data('nama');
      var nip = $(this).data('nip');
      var ktp = $(this).data('ktp');
      var npwp = $(this).data('npwp');
      var tmpLahir = $(this).data('tmp-lahir');
      var tglLahir = $(this).data('tgl-lahir');
      var alamat = $(this).data('alamat');
      var jenkel = $(this).data('jenkel');
      var agama = $(this).data('agama');
      var statusKawin = $(this).data('status-kawin');
      var pendAkhir = $(this).data('pend-akhir');
      var jurusanPend = $(this).data('jurusan-pend');
      var gelarDepan = $(this).data('gelar-depan');
      var gelarBelakang = $(this).data('gelar-belakang');
      var mulaiTugas = $(this).data('mulai-tugas');
      var bp = $(this).data('bp');
      var admin = $(this).data('admin');
      var tlp = $(this).data('tlp');
      var email = $(this).data('email');
      var pin = $(this).data('pin');

      $('#id').val(id);
      $('#jenis').val(jenis).trigger('change');
      $('#kode').val(kode);
      $('#nama').val(nama);
      $('#nip').val(nip);
      $('#ktp').val(ktp);
      $('#npwp').val(npwp);
      $('#tmpLahir').val(tmpLahir);
      $('#tglLahir').val(tglLahir == null ? "" : tgl(tglLahir));
      $('#alamat').val(alamat);
      $('#jenkel').val(jenkel);
      $('#agama').val(agama);
      $('#statusKawin').val(statusKawin);
      $('#pendAkhir').val(pendAkhir);
      $('#jurusanPend').val(jurusanPend);
      $('#gelarDepan').val(gelarDepan);
      $('#gelarBelakang').val(gelarBelakang);
      $('#mulaiTugas').val(mulaiTugas == null ? "-" : tgl(mulaiTugas));
      if (bp == 1) {
        $('#bp').prop('checked', true);
      } else {
        $('#bp').prop('checked', false);
      }
      if (admin == 1) {
        $('#admin').prop('checked', true);
      } else {
        $('#admin').prop('checked', false);
      }
      $('#tlp').val(tlp);
      $('#email').val(email);
      $('#pin').val(pin);

      simpan = "edit";
      $('#mdlData').modal({backdrop:'static'});
      $('.modal-title').text("Edit Data");
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();

      $('.step-item').removeClass('active');
      $('.step-content-wrapper').removeClass('active');
      $('#stepItem1').addClass('active');
      $('#stepContent1').addClass('active');
      $('#btnStepNext').prop('disabled', false);
      $('#btnSimpan').prop('disabled', true);
      $('#btnStepPrev').prop('disabled', true);
      $('#step').val(1);
    });

    // Detail Data
    $('#tblData').on('click', '.detail-data', function(){
      var jenis = $(this).data('jenis');
      var kode = $(this).data('kode');
      var nama = $(this).data('nama');
      var nip = $(this).data('nip');
      var ktp = $(this).data('ktp');
      var npwp = $(this).data('npwp');
      var tmpLahir = $(this).data('tmp-lahir');
      var tglLahir = $(this).data('tgl-lahir');
      var alamat = $(this).data('alamat');
      var jenkel = $(this).data('jenkel');
      var agama = $(this).data('agama');
      var statusKawin = $(this).data('status-kawin');
      var pendAkhir = $(this).data('pend-akhir');
      var jurusanPend = $(this).data('jurusan-pend');
      var gelarDepan = $(this).data('gelar-depan');
      var gelarBelakang = $(this).data('gelar-belakang');
      var mulaiTugas = $(this).data('mulai-tugas');
      var bp = $(this).data('bp');
      var admin = $(this).data('admin');
      var tlp = $(this).data('tlp');
      var email = $(this).data('email');
      var pin = $(this).data('pin');

      $('#jenisDetail').html(jenis == 1 ? "Guru" : "Staf");
      $('#kodeDetail').html(kode == null ? "-" : kode);
      $('#namaDetail').html((gelarDepan == null ? "" : gelarDepan+" ") + nama + (gelarBelakang == null ? "" : ", "+gelarBelakang));
      $('#nipDetail').html(nip == null ? "-" : nip);
      $('#ktpDetail').html(ktp == null ? "-" : ktp);
      $('#npwpDetail').html(npwp == null ? "-" : npwp);
      $('#tmpLahirDetail').html(tmpLahir == null ? "-" : tmpLahir);
      $('#tglLahirDetail').html(tglLahir == null ? "-" : tgl(tglLahir));
      $('#alamatDetail').html(alamat == null ? "-" : alamat);
      $('#jenkelDetail').html(jenkel == 1 ? "Laki-Laki" : "Perempuan");
      $('#agamaDetail').html(agama == 1 ? "Islam" : agama == 2 ? "Kristen" : agama == 3 ? "Katholik" : agama == 4 ? "Budhha" : agama == 5 ? "Hindu" : "Konghucu");
      $('#statusKawinDetail').html(statusKawin == 1 ? "Belum Kawin" : statusKawin == 2 ? "Kawin" : "Janda/Duda");
      $('#pendAkhirDetail').html(pendAkhir == 1 ? "SMA/SMK" : pendAkhir == 2 ? "D3" : pendAkhir == 3 ? "S1/D4" : pendAkhir == 4 ? "S2" : "S3");
      $('#jurusanPendDetail').html(jurusanPend == null ? "-" : jurusanPend);
      $('#mulaiTugasDetail').html(mulaiTugas == null ? "-" : tgl(mulaiTugas));
      $('#bpDetail').html(bp == null ? "Tidak" : "Iya");
      $('#adminDetail').html(admin == null ? "Tidak" : "Iya");
      $('#tlpDetail').html(tlp);
      $('#emailDetail').html(email == null ? "-" : email);
      $('#pinDetail').html(pin == null ? "-" : pin);

      $('.modal-title').text("Detail Data");
      $('#mdlDetail').modal('show');
    });

    // Submit Data
    $('#btnSimpan').click(function(){
      var url;
      if (simpan == "tambah") {
        url = "<?= site_url('admin/pegawai/tambah') ?>"
      } else {
        url = "<?= site_url('admin/pegawai/edit') ?>"
      }
      $.ajax({
        url: url,
        type: 'post',
        data: $('#formData').serialize(),
        dataType: 'json',
        beforeSend: function(){
          loadingBtnOn();
        },
        success: function(data){
          loadingBtnOff();
          if(data.sukses == true){
            s = 1;
            alertSukses("Berhasil disimpan");
            reloadTable('#tblData');
            if(simpan == 'edit'){
              $('#mdlData').modal('hide');
            }
            $('#kode').focus();
            $('#formData').trigger('reset');
            $('.form-control').removeClass('is-invalid');
            $('.invalid-message').remove();

            $('.step-item').removeClass('active');
            $('.step-content-wrapper').removeClass('active');
            $('#stepItem1').addClass('active');
            $('#stepContent1').addClass('active');
            $('#btnStepNext').prop('disabled', false);
            $('#btnSimpan').prop('disabled', true);
            $('#btnStepPrev').prop('disabled', true);
            $('#step').val(1);
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

    // Hapus Data
    $('#tblData').on('click', '.hapus-data', function(){
      var id = $(this).data('id');
      $('#idKonfirm').val(id);
      $('#mdlKonfirm').modal('show');
      $('#titleKonfirm').text('INGIN MENGHAPUS DATA?');
      $('#btnKonfirm').html('<button type="button" class="btn btn-danger btn-rounded btn-loading" id="btnKonfirmHapus"> Hapus</button>');
    });
    $('#mdlKonfirm').on('click','#btnKonfirmHapus',function(){
      var id = $('#idKonfirm').val();
      $.ajax({
        url: '<?= site_url('admin/pegawai/hapus') ?>',
        type: 'get',
        data: {id},
        beforeSend: function(){
          loadingBtnOn();
        },
        success: function(){
          loadingBtnOff();
          reloadTable('#tblData');
          alertSukses("Berhasil dihapus");
          $('#mdlKonfirm').modal('hide');
        }
      });
    });

    // Step Next
    $('#btnStepNext').click(function(){
      var url;
      if (simpan == "tambah") {
        url = "<?= site_url('admin/pegawai/tambah') ?>"
      } else {
        url = "<?= site_url('admin/pegawai/edit') ?>"
      }
      $.ajax({
        url: url,
        type: 'post',
        data: $('#formData').serialize(),
        dataType: 'json',
        success: function(data){
          if(data.sukses == true){
            s += 1;
            $('#step').val(s);
            if (s <= step) {
              $('.step-item').removeClass('active');
              $('#stepItem'+s).addClass('active');
              $('.step-content-wrapper').removeClass('active');
              $('#stepContent'+s).addClass('active');
            }
            if (s > 1) {
              $('#btnStepPrev').prop('disabled', false);
            }
            if (s == step) {
              $('#btnStepNext').prop('disabled', true);
              $('#btnSimpan').prop('disabled', false);
            } else {
              $('#btnSimpan').prop('disabled', true);
            }

            $('.form-control').removeClass('is-invalid');
            $('.invalid-message').remove();
          }else{
            alertError("Gagal disimpan");
            $('#btnSimpan').prop('disabled', true);
            $.each(data.error, function(key, value){
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

    // Step Prev
    $('#btnStepPrev').click(function(){
      s -= 1;
      $('#step').val(s);
      if (s <= step) {
        $('.step-item').removeClass('active');
        $('#stepItem'+s).addClass('active');

        $('.step-content-wrapper').removeClass('active');
        $('#stepContent'+s).addClass('active');

        if (s < step) {
          $('#btnStepNext').prop('disabled', false);
          $('#btnSimpan').prop('disabled', true);
        }
        if (s == 1) {
          $('#btnStepPrev').prop('disabled', true);
        }
      }
    });

    // Tutup Modal Data
    $('#mdlData').on('hidden.bs.modal', function () {
      s = 1;
    });


  });

  // Load DataTables
  function loadData()
  {
    var kode = $('#kodeFilter').val();
    var nama = $('#namaFilter').val();
    var jenis = $('#jenisFilter').val();

    $('#tblData').DataTable({
      ajax: {
        url: '<?= site_url('admin/pegawai/load_data') ?>',
        type: 'post',
        data: {kode, nama, jenis}
      },
      columns:
      [
        {data: 'kode_pegawai', render: function(data) {
          return data == null ? "-" : data;
        }},
        {data: 'nama_pegawai', render: function(data, type, row) {
          return (row.gelar_depan_pegawai == null ? "" : row.gelar_depan_pegawai+" ") + data + (row.gelar_belakang_pegawai == null ? "" : ", "+row.gelar_belakang_pegawai);
        }},
        {data: 'jenis_pegawai', render: function(data, type, row) {
          return (data == 1 ? "Guru" : "Staf") +` `+ (row.admin_pegawai == 1 ? "(Admin)" : "");
        }},
        {data: 'buat_pegawai', render: function(data) {
          return tglJam(data);
        }},
        {data: "id_pegawai", orderable: false, searchable: false, render: function(data, type, row) {
          return `<div class="text-center">
                    <button type="button" class="btn btn-rounded btn-teal btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item edit-data" href="javascript:void(0)"
                      data-id="`+row.id_pegawai+`"
                      data-jenis="`+row.jenis_pegawai+`"
                      data-kode="`+row.kode_pegawai+`"
                      data-nama="`+row.nama_pegawai+`"
                      data-nip="`+row.nip_pegawai+`"
                      data-ktp="`+row.ktp_pegawai+`"
                      data-npwp="`+row.npwp_pegawai+`"
                      data-tmp-lahir="`+row.tmp_lahir_pegawai+`"
                      data-tgl-lahir="`+row.tgl_lahir_pegawai+`"
                      data-alamat="`+row.alamat_pegawai+`"
                      data-jenkel="`+row.jenkel_pegawai+`"
                      data-agama="`+row.agama_pegawai+`"
                      data-status-kawin="`+row.status_kawin_pegawai+`"
                      data-pend-akhir="`+row.pend_akhir_pegawai+`"
                      data-jurusan-pend="`+row.jurusan_pend_pegawai+`"
                      data-gelar-depan="`+row.gelar_depan_pegawai+`"
                      data-gelar-belakang="`+row.gelar_belakang_pegawai+`"
                      data-mulai-tugas="`+row.mulai_tugas_pegawai+`"
                      data-bp="`+row.bp_pegawai+`"
                      data-admin="`+row.admin_pegawai+`"
                      data-tlp="`+row.tlp_pegawai+`"
                      data-email="`+row.email_pegawai+`"
                      data-pin="`+row.pin_pegawai+`">
                      <i class="bx bx-edit"></i> Edit</a>

                      <a class="dropdown-item detail-data" href="javascript:void(0)"
                      data-id="`+row.id_pegawai+`"
                      data-jenis="`+row.jenis_pegawai+`"
                      data-kode="`+row.kode_pegawai+`"
                      data-nama="`+row.nama_pegawai+`"
                      data-nip="`+row.nip_pegawai+`"
                      data-ktp="`+row.ktp_pegawai+`"
                      data-npwp="`+row.npwp_pegawai+`"
                      data-tmp-lahir="`+row.tmp_lahir_pegawai+`"
                      data-tgl-lahir="`+row.tgl_lahir_pegawai+`"
                      data-alamat="`+row.alamat_pegawai+`"
                      data-jenkel="`+row.jenkel_pegawai+`"
                      data-agama="`+row.agama_pegawai+`"
                      data-status-kawin="`+row.status_kawin_pegawai+`"
                      data-pend-akhir="`+row.pend_akhir_pegawai+`"
                      data-jurusan-pend="`+row.jurusan_pend_pegawai+`"
                      data-gelar-depan="`+row.gelar_depan_pegawai+`"
                      data-gelar-belakang="`+row.gelar_belakang_pegawai+`"
                      data-mulai-tugas="`+row.mulai_tugas_pegawai+`"
                      data-bp="`+row.bp_pegawai+`"
                      data-admin="`+row.admin_pegawai+`"
                      data-tlp="`+row.tlp_pegawai+`"
                      data-email="`+row.email_pegawai+`"
                      data-pin="`+row.pin_pegawai+`">
                      <i class="bx bx-search"></i> Detail</a>

                      <a class="dropdown-item hapus-data" href="javascript:void(0)" data-id="`+row.id_pegawai+`"><i class="bx bx-trash"></i> Hapus</a>
                    </div>
                  </div>`;
        }},
      ],
      order: [[1, 'asc']],
      pageLength: 25,
      responsive: true,
      processing: true,
      serverSide: true,
      searching: false,
      lengthChange: false,
      oLanguage: {
        sProcessing: 'Mohon Tunggu...',
        sInfo: '_START_ s/d _END_ dari _TOTAL_ data',
        sEmptyTable: '<span class="text-teal">Tidak Ada Data</span>',
        sInfoEmpty: '0 data'
      },
    });
  }




</script>
</body>
</html>
