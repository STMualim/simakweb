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
                    <input type="text" class="form-control" id="namaFilter" placeholder="Nama">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control select" id="jurusanFilter">
                      <option value="">Semua Jurusan</option>
                      <?php foreach ($jurusan as $key => $row) { ?>
                        <option value="<?= $row->id_jurusan ?>"><?= $row->kode_jurusan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control select" id="rombelFilter">
                      <option value="">Semua Rombel</option>
                      <?php foreach ($rombel as $key => $row) { ?>
                        <option value="<?= $row->id_rombel ?>"><?= $row->nama_rombel ?></option>
                      <?php } ?>
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
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Jurusan</th>
                    <th>Rombel</th>
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
                    <span class="step-label text-muted d-none d-lg-inline">Data Siswa</span>
                  </li>
                  <div class="step-line"></div>
                  <li class="step-item" id="stepItem2">
                    <span class="step-circle">2</span>
                    <span class="step-label text-muted d-none d-lg-inline">Data Ortu</span>
                  </li>
                  <div class="step-line"></div>
                  <li class="step-item" id="stepItem3">
                    <span class="step-circle">3</span>
                    <span class="step-label text-muted d-none d-lg-inline">Akun Siswa</span>
                  </li>
                </ul>
                <!--  -->

                <!-- Step Content -->
                <div class="step-content-wrapper active" id="stepContent1">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jurusan</label>
                      <div class="col-sm-8 form-jurusan">
                        <select class="form-control select" name="jurusan" id="jurusan">
                          <option value="">Pilih Jurusan</option>
                          <?php foreach ($jurusan as $key => $row) { ?>
                            <option value="<?= $row->id_jurusan ?>"><?= "$row->kode_jurusan-$row->nama_jurusan" ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Rombel</label>
                      <div class="col-sm-8 form-rombel">
                        <select class="form-control select" name="rombel" id="rombel">
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Lengkap Siswa</label>
                      <div class="col-sm-8 form-nama">
                        <input type="text" name="nama" class="form-control" id="nama">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NISN</label>
                      <div class="col-sm-8">
                        <input type="text" name="nisn" class="form-control" id="nisn">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIS</label>
                      <div class="col-sm-8">
                        <input type="text" name="nis" class="form-control" id="nis">
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
                      <label class="col-sm-4 col-form-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" maxlength="200" placeholder="(max. 200)"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-2 mb-2">
                        <input type="text" name="rt" class="form-control" id="rt" placeholder="RT">
                      </div>
                      <div class="col-sm-2 mb-2">
                        <input type="text" name="rw" class="form-control" id="rw" placeholder="RW">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" name="kode_pos" class="form-control" id="kodePos" placeholder="Kode Pos">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-4 mb-2">
                        <input type="text" name="kel" class="form-control" id="kel" placeholder="Kelurahan">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" name="kec" class="form-control" id="kec" placeholder="Kecamatan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-4 mb-2">
                        <input type="text" name="kota" class="form-control" id="kota" placeholder="Kota/Kab.">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Asal Sekolah</label>
                      <div class="col-sm-8">
                        <input type="text" name="asal_sekolah" class="form-control" id="asalSekolah">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Tempat Tinggal</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="tmp_tinggal" id="tmpTinggal">
                          <option value="1">Milik Sendiri</option>
                          <option value="2">Sewa</option>
                          <option value="3">Bersama Orang Tua</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jumlah Saudara</label>
                      <div class="col-sm-8">
                        <input type="number" name="jml_saudara" class="form-control" id="jmlSaudara">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Anak Ke-</label>
                      <div class="col-sm-8">
                        <input type="number" name="anak_ke" class="form-control" id="anakKe">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Status Dalam Keluarga</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="status_kel" id="statusKel">
                          <option value="1">Anak Kandung</option>
                          <option value="2">Anak Tiri</option>
                          <option value="3">Anak Angkat</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="step-content-wrapper" id="stepContent2">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Ayah</label>
                      <div class="col-sm-8 form-nama_ayah">
                        <input type="text" name="nama_ayah" class="form-control" id="namaAyah">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pekerjaan Ayah</label>
                      <div class="col-sm-8">
                        <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaanAyah">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Penghasilan Ayah</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="penghasilan_ayah" id="penghasilanAyah">
                          <option value="">Tidak Ada</option>
                          <option value="1">&plusmn; 1 Juta</option>
                          <option value="2">1-3 Juta</option>
                          <option value="3">4-6 Juta</option>
                          <option value="4">Lebih Dari 7 Juta</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIK Ayah</label>
                      <div class="col-sm-8">
                        <input type="text" name="nik_ayah" class="form-control" id="nikAyah">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No.Tlp./HP Ayah</label>
                      <div class="col-sm-8 form-tlp_ayah">
                        <input type="text" name="tlp_ayah" class="form-control" id="tlpAyah">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Ibu</label>
                      <div class="col-sm-8 form-nama_ibu">
                        <input type="text" name="nama_ibu" class="form-control" id="namaIbu">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                      <div class="col-sm-8">
                        <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaanIbu">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Penghasilan Ibu</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="penghasilan_ibu" id="penghasilanIbu">
                          <option value="">Tidak Ada</option>
                          <option value="1">&plusmn; 1 Juta</option>
                          <option value="2">1-3 Juta</option>
                          <option value="3">4-6 Juta</option>
                          <option value="4">Lebih Dari 7 Juta</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NIK Ibu</label>
                      <div class="col-sm-8">
                        <input type="text" name="nik_ibu" class="form-control" id="nikIbu">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No.Tlp./HP Ibu</label>
                      <div class="col-sm-8 form-tlp_ibu">
                        <input type="text" name="tlp_ibu" class="form-control" id="tlpIbu">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="step-content-wrapper" id="stepContent3">
                  <div class="step-content">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">No. Tlp./HP Siswa</label>
                      <div class="col-sm-8 form-tlp">
                        <input type="text" name="tlp" class="form-control" id="tlpSiswa">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email Siswa</label>
                      <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="emailSiswa">
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

    // Select2
    $('.select').select2();

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

    // Pilih Jurusan
    $('#jurusan').change(function(){
      var jurusan = $(this).val();
      getRombel(jurusan);
    });

    // Tambah Data
    $('.btn-tambah').click(function(){
      simpan = "tambah";
      $('#mdlData').modal({backdrop:'static'});
      $('.modal-title').text("Tambah Data");
      $('#formData').trigger('reset');
      $('#jurusan').val("").trigger('change');
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
      });
    });

    // Edit Data
    $('#tblData').on('click', '.edit-data', function(){
      var id = $(this).data('id');
      var jurusan = $(this).data('jurusan');
      var rombel = $(this).data('rombel');
      var nama = $(this).data('nama');
      var nisn = $(this).data('nisn');
      var nis = $(this).data('nis');
      var tmpLahir = $(this).data('tmp-lahir');
      var tglLahir = $(this).data('tgl-lahir');
      var jenkel = $(this).data('jenkel');
      var agama = $(this).data('agama');
      var alamat = $(this).data('alamat');
      var rt = $(this).data('rt');
      var rw = $(this).data('rw');
      var kodePos = $(this).data('kode-pos');
      var kel = $(this).data('kel');
      var kec = $(this).data('kec');
      var kota = $(this).data('kota');
      var provinsi = $(this).data('provinsi');
      var asalSekolah = $(this).data('asal-sekolah');
      var tmpTinggal = $(this).data('tmp-tinggal');
      var jmlSdr = $(this).data('jml-sdr');
      var anakKe = $(this).data('anak-ke');
      var statusKel = $(this).data('status-kel');
      var namaAyah = $(this).data('nama-ayah');
      var pekerjaanAyah = $(this).data('pekerjaan-aya');
      var penghasilanAyah = $(this).data('penghasilan-ayah');
      var nikAyah = $(this).data('nik-ayah');
      var tlpAyah = $(this).data('tlp-ayah');
      var namaIbu = $(this).data('nama-ibu');
      var pekerjaanIbu = $(this).data('pekerjaan-ibu');
      var penghasilanIbu = $(this).data('penghasilan-ib');
      var nikIbu = $(this).data('nik-ibu');
      var tlpIbu = $(this).data('tlp-ibu');
      var tlp = $(this).data('tlp');
      var email = $(this).data('email');
      var pin = $(this).data('pin');

      $('#id').val(id);
      $('#jurusan').val(jurusan).trigger('change');
      $('#rombel').val(rombel);
      $('#nama').val(nama);
      $('#nisn').val(nisn);
      $('#nis').val(nis);
      $('#tmpLahir').val(tmpLahir);
      $('#tglLahir').val(tglLahir == null ? "" : tgl(tglLahir));
      $('#jenkel').val(jenkel);
      $('#agama').val(agama);
      $('#alamat').val(alamat);
      $('#rt').val(rt);
      $('#rw').val(rw);
      $('#kodePos').val(kodePos);
      $('#kel').val(kel);
      $('#kec').val(kec);
      $('#kota').val(kota);
      $('#provinsi').val(provinsi);
      $('#asalSekolah').val(asalSekolah);
      $('#tmpTinggal').val(tmpTinggal);
      $('#jmlSaudara').val(jmlSaudara);
      $('#anakKe').val(anakKe);
      $('#statusKel').val(statusKel);
      $('#namaAyah').val(namaAyah);
      $('#pekerjaanAyah').val(pekerjaanAyah);
      $('#penghasilanAyah').val(penghasilanAyah);
      $('#nikAyah').val(nikAyah);
      $('#tlpAyah').val(tlpAyah);
      $('#namaIbu').val(namaIbu);
      $('#pekerjaanIbu').val(pekerjaanIbu);
      $('#penghasilanIbu').val(penghasilanIbu);
      $('#nikIbu').val(nikIbu);
      $('#tlpIbu').val(tlpIbu);
      $('#tlpSiswa').val(tlp);
      $('#emailSiswa').val(email);
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
      var jurusan = $(this).data('jurusan');
      var rombel = $(this).data('rombel');
      var nama = $(this).data('nama');
      var nisn = $(this).data('nisn');
      var nis = $(this).data('nis');
      var tmpLahir = $(this).data('tmp-lahir');
      var tglLahir = $(this).data('tgl-lahir');
      var jenkel = $(this).data('jenkel');
      var agama = $(this).data('agama');
      var alamat = $(this).data('alamat');
      var rt = $(this).data('rt');
      var rw = $(this).data('rw');
      var kodePos = $(this).data('kode-pos');
      var kel = $(this).data('kel');
      var kec = $(this).data('kec');
      var kota = $(this).data('kota');
      var provinsi = $(this).data('provinsi');
      var asalSekolah = $(this).data('asal-sekolah');
      var tmpTinggal = $(this).data('tmp-tinggal');
      var jmlSdr = $(this).data('jml-sdr');
      var anakKe = $(this).data('anak-ke');
      var statusKel = $(this).data('status-kel');
      var namaAyah = $(this).data('nama-ayah');
      var pekerjaanAyah = $(this).data('pekerjaan-aya');
      var penghasilanAyah = $(this).data('penghasilan-ayah');
      var nikAyah = $(this).data('nik-ayah');
      var tlpAyah = $(this).data('tlp-ayah');
      var namaIbu = $(this).data('nama-ibu');
      var pekerjaanIbu = $(this).data('pekerjaan-ibu');
      var penghasilanIbu = $(this).data('penghasilan-ib');
      var nikIbu = $(this).data('nik-ibu');
      var tlpIbu = $(this).data('tlp-ibu');
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
        url = "<?= site_url('admin/siswa/tambah') ?>"
      } else {
        url = "<?= site_url('admin/siswa/edit') ?>"
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
        url: '<?= site_url('admin/siswa/hapus') ?>',
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
        url = "<?= site_url('admin/siswa/tambah') ?>"
      } else {
        url = "<?= site_url('admin/siswa/edit') ?>"
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

  function getRombel(jurusan)
  {
    $.ajax({
        url : "<?= site_url('admin/siswa/get_rombel') ?>",
        method : "get",
        data : {jurusan},
        async : false,
        dataType : "json",
        success: function(data){
          var i;
          var html = `<option selected="selected" value="">Pilih Rombel</option>`;
          for(i=0; i < data.length; i++){
            html += `<option value="`+data[i].id_rombel+`">`+data[i].nama_rombel+`</option>`;
          }
          $('#rombel').html(html);
        }
    });
  }

  // Load DataTables
  function loadData()
  {
    var nama = $('#namaFilter').val();
    var jurusan = $('#jurusanFilter').val();
    var rombel = $('#rombelFilter').val();

    $('#tblData').DataTable({
      ajax: {
        url: '<?= site_url('admin/siswa/load_data') ?>',
        type: 'post',
        data: {nama, jurusan, rombel}
      },
      columns:
      [
        {data: 'nis_siswa', render: function(data) {
          return data == null ? "-" : data;
        }},
        {data: 'nama_siswa'},
        {data: 'jenkel_siswa', render: function(data) {
          return data == 1 ? "L" : "P";
        }},
        {data: 'nama_jurusan'},
        {data: 'nama_rombel'},
        {data: "id_siswa", orderable: false, searchable: false, render: function(data, type, row) {
          return `<div class="text-center">
                    <button type="button" class="btn btn-rounded btn-teal btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item edit-data" href="javascript:void(0)"
                      data-id="`+data+`"
                      data-jurusan="`+row.id_jurusan_siswa+`"
                      data-rombel="`+row.id_rombel_siswa+`"
                      data-nama="`+row.nama_siswa+`"
                      data-nisn="`+row.nisn_siswa+`"
                      data-nis="`+row.nis_siswa+`"
                      data-tmp-lahir="`+row.tmp_lahir_siswa+`"
                      data-tgl-lahir="`+row.tgl_lahir_siswa+`"
                      data-jenkel="`+row.jenkel_siswa+`"
                      data-agama="`+row.agama_siswa+`"
                      data-alamat="`+row.alamat_siswa+`"
                      data-rt="`+row.rt_siswa+`"
                      data-rw="`+row.rw_siswa+`"
                      data-kode-pos="`+row.kode_pos_siswa+`"
                      data-kel="`+row.kel_siswa+`"
                      data-kec="`+row.kec_siswa+`"
                      data-kota="`+row.kota_siswa+`"
                      data-provinsi="`+row.provinsi_siswa+`"
                      data-asal-sekolah="`+row.asal_sekolah_siswa+`"
                      data-tmp-tinggal="`+row.tmp_tinggal_siswa+`"
                      data-jml-sdr="`+row.jml_sdr_siswa+`"
                      data-anak-ke="`+row.anak_ke_siswa+`"
                      data-status-kel="`+row.status_kel_siswa+`"
                      data-nama-ayah="`+row.ayah_siswa+`"
                      data-pekerjaan-ayah="`+row.pekerjaan_ayah_siswa+`"
                      data-penghasilan-ayah="`+row.penghasilan_ayah_siswa+`"
                      data-nik-ayah="`+row.nik_ayah_siswa+`"
                      data-tlp-ayah="`+row.tlp_ayah_siswa+`"
                      data-nama-ibu="`+row.ibu_siswa+`"
                      data-pekerjaan-ibu="`+row.pekerjaan_ibu_siswa+`"
                      data-penghasilan-ibu="`+row.penghasilan_ibu_siswa+`"
                      data-nik-ibu="`+row.nik_ibu_siswa+`"
                      data-tlp-ibu="`+row.tlp_ibu_siswa+`"
                      data-tlp="`+row.tlp_siswa+`"
                      data-email="`+row.email_siswa+`"
                      data-pin="`+row.pin_siswa+`">
                      <i class="bx bx-edit"></i> Edit</a>

                      <a class="dropdown-item detail-data" href="javascript:void(0)"
                      data-jurusan="`+row.id_jurusan_siswa+`"
                      data-rombel="`+row.id_rombel_siswa+`"
                      data-nama="`+row.nama_siswa+`"
                      data-nisn="`+row.nisn_siswa+`"
                      data-nis="`+row.nis_siswa+`"
                      data-tmp-lahir="`+row.tmp_lahir_siswa+`"
                      data-tgl-lahir="`+row.tgl_lahir_siswa+`"
                      data-jenkel="`+row.jenkel_siswa+`"
                      data-agama="`+row.agama_siswa+`"
                      data-alamat="`+row.alamat_siswa+`"
                      data-rt="`+row.rt_siswa+`"
                      data-rw="`+row.rw_siswa+`"
                      data-kode-pos="`+row.kode_pos_siswa+`"
                      data-kel="`+row.kel_siswa+`"
                      data-kec="`+row.kec_siswa+`"
                      data-kota="`+row.kota_siswa+`"
                      data-provinsi="`+row.provinsi_siswa+`"
                      data-asal-sekolah="`+row.asal_sekolah_siswa+`"
                      data-tmp-tinggal="`+row.tmp_tinggal_siswa+`"
                      data-jml-sdr="`+row.jml_sdr_siswa+`"
                      data-anak-ke="`+row.anak_ke_siswa+`"
                      data-status-kel="`+row.status_kel_siswa+`"
                      data-nama-ayah="`+row.ayah_siswa+`"
                      data-pekerjaan-ayah="`+row.pekerjaan_ayah_siswa+`"
                      data-penghasilan-ayah="`+row.penghasilan_ayah_siswa+`"
                      data-nik-ayah="`+row.nik_ayah_siswa+`"
                      data-tlp-ayah="`+row.tlp_ayah_siswa+`"
                      data-nama-ibu="`+row.ibu_siswa+`"
                      data-pekerjaan-ibu="`+row.pekerjaan_ibu_siswa+`"
                      data-penghasilan-ibu="`+row.penghasilan_ibu_siswa+`"
                      data-nik-ibu="`+row.nik_ibu_siswa+`"
                      data-tlp-ibu="`+row.tlp_ibu_siswa+`"
                      data-tlp="`+row.tlp_siswa+`"
                      data-email="`+row.email_siswa+`"
                      data-pin="`+row.pin_siswa+`">
                      <i class="bx bx-search"></i> Detail</a>

                      <a class="dropdown-item hapus-data" href="javascript:void(0)" data-id="`+row.id_siswa+`"><i class="bx bx-trash"></i> Hapus</a>
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
