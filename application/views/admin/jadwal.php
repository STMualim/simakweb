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
                    <select class="form-control select" id="hariFilter" style="width: 100%;">
                      <option value="">Pilih Hari</option>
                      <?php foreach ($hari as $key => $row) { ?>
                        <option value="<?= $row->id_hari ?>"><?= $row->nama_hari ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control select" id="kelasFilter" style="width: 100%;">
                      <option value="">Pilih Kelas</option>
                      <?php foreach ($kelas as $key => $row) { ?>
                        <option value="<?= $row->id_kelas ?>"><?= $row->nama_kelas ?></option>
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
            <div class="card-body table-responsive p-0" id="loadJadwal">
            <!-- Load Jadwal -->
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="mdlData">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-muted"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Form Data -->
            <form id="formData" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="hari" id="idHari">
                  <input type="hidden" name="rombel" id="idRombel">
                  <input type="hidden" name="waktu" id="idWaktu">

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="bx bx-group"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="rombel" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="bx bx-time"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="waktu" readonly>
                      </div>
                    </div>
                    <div class="form-group form-mapel">
                      <select class="form-control select" name="mapel" id="mapel">
                        <option value="">Pilih Mapel</option>
                        <?php foreach ($mapel as $key => $row) { ?>
                          <option value="<?= $row->id_mapel ?>"><?= "$row->kode_mapel-$row->nama_mapel" ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group form-pegawai">
                      <select class="form-control select" name="pegawai" id="pegawai">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($pegawai as $key => $row) { ?>
                          <option value="<?= $row->id_pegawai ?>"><?= "$row->kode_pegawai-$row->nama_pegawai" ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <a href="javascript:void(0)" data-dismiss="modal"><b>Batal</b></a>
                <button type="button" class="btn btn-outline-danger btn-rounded" id="btnHapus"> Hapus</button>
                <button type="submit" class="btn btn-teal btn-rounded btn-loading" id="btnSimpan"> Simpan</button>
              </div>
            </form>
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
    loadData();

    // Select2
    $('.select').select2();

    // Filter
    $('#btnFilter').click(function(){
      var hari = $('#hariFilter').val();
      var kelas = $('#kelasFilter').val();

      if (hari == "" || kelas == "") {
        alertError("Filter Belum Lengkap");
      } else {
        loadingElementOn('#loadJadwal');
        loadData();
      }
    });

    // Reset Filter
    $('#resetFilter').click(function(){
      $('#hariFilter').val("").trigger('change.select2');
      $('#kelasFilter').val("").trigger('change.select2');
      loadData();
    });

    // Tambah Data
    $('#loadJadwal').on('click', '.tambah-jadwal', function(){
      var idHari = $('#hariFilter').val();
      var idRombel = $(this).data('idrombel');
      var idWaktu = $(this).data('idwaktu');
      var namaRombel = $(this).data('namarombel');
      var namaWaktu = $(this).data('namawaktu');
      $('#mdlData').on('shown.bs.modal', function(){
        $('#idHari').val(idHari);
        $('#idRombel').val(idRombel);
        $('#idWaktu').val(idWaktu);
        $('#rombel').val(namaRombel);
        $('#waktu').val(namaWaktu);
        $('#mapel, #pegawai').val("").trigger('change.select2');
      });

      simpan = "tambah";
      $('#mdlData').modal('show');
      $('#btnHapus').prop('hidden', true);
      $('.modal-title').text("Tambah Jadwal");
      $('#formData').trigger('reset');
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();
    });

    // Edit Data
    $('#loadJadwal').on('click', '.edit-jadwal', function(){
      var id = $(this).data('id');
      var idMapel = $(this).data('idmapel');
      var idPegawai = $(this).data('idpegawai');
      var namaRombel = $(this).data('namarombel');
      var namaWaktu = $(this).data('namawaktu');
      $('#mdlData').on('shown.bs.modal', function(){
        $('#id').val(id);
        $('#mapel').val(idMapel).trigger('change.select2');
        $('#pegawai').val(idPegawai).trigger('change.select2');
        $('#rombel').val(namaRombel);
        $('#waktu').val(namaWaktu);
      });

      simpan = "edit";
      $('#mdlData').modal('show');
      $('#btnHapus').prop('hidden', false);
      $('.modal-title').text("Edit Jadwal");
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();
    });

    // Submit Data
    $('#formData').submit(function(e){
      e.preventDefault();
      var url;
      if (simpan == "tambah") {
        url = "<?= site_url('admin/jadwal/tambah') ?>"
      } else {
        url = "<?= site_url('admin/jadwal/edit') ?>"
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
            alertSukses("Berhasil disimpan");
            loadData();
            $('#mdlData').modal('hide');
            $('#formData').trigger('reset');
            $('#mapel, #pegawai').val("").trigger('change.select2');
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

    // Hapus Data
    $('#mdlData').on('click','#btnHapus',function(){
      var id = $('#id').val();
      $.ajax({
        url: '<?= site_url('admin/jadwal/hapus') ?>',
        type: 'get',
        data: {id},
        beforeSend: function(){
          loadingBtnOn();
        },
        success: function(){
          loadingBtnOff();
          loadData();
          alertSukses("Berhasil dihapus");
          $('#mdlData').modal('hide');
        }
      });
    });


  });

  // LOAD LOG
  function loadData()
  {
    var hari = $('#hariFilter').val();
    var kelas = $('#kelasFilter').val();

    $.ajax({
      url: "<?= site_url('admin/jadwal/load_data') ?>",
      type: "post",
      data: {hari, kelas},
      async : false,
      dataType: "json",
      success: function(data){
        var rombel = "";
        var waktu = "";
        var jadwal = "";

        if (hari != "") {
          if (data.rombel.length != 0 && data.waktu.length != 0) {
            $.each(data.rombel, function(i, rmb) {
              rombel += `<th>`+rmb.nama_rombel+`</th>`;
            });

            $.each(data.waktu, function(i, wkt) {
              waktu += `<tr>
                          <td class="text-center"><b>`+wkt.jam_waktu+`</b></td>
                          <td><b>`+wkt.nama_waktu+`</b></td>`;
                          if (data.jadwal.length > 0) {
                            $.each(data.rombel, function(i, rmb) {
                              waktu += `<td id="jdl`+wkt.id_waktu+rmb.id_rombel+hari+`"><a href="javascript:void(0)" class="tambah-jadwal" data-idwaktu="`+wkt.id_waktu+`" data-namawaktu="`+wkt.nama_waktu+`" data-idrombel="`+rmb.id_rombel+`" data-namarombel="`+rmb.nama_rombel+`">...</a></td>`;
                            });
                          } else {
                            $.each(data.rombel, function(i, rmb) {
                              waktu += `<td><a href="javascript:void(0)" class="tambah-jadwal" data-idwaktu="`+wkt.id_waktu+`" data-namawaktu="`+wkt.nama_waktu+`" data-idrombel="`+rmb.id_rombel+`" data-namarombel="`+rmb.nama_rombel+`">...</a></td>`;
                            })
                          }
              waktu += `</tr>`;
            });

            jadwal = `<table id="tblData" class="table table-bordered table-hover table-striped table-sm text-nowrap text-center" style="width: 100%;">
                        <thead>
                          <tr>
                            <th class="text-center" style="width: 10px;">Jam</th>
                            <th>Waktu</th>
                            `+rombel+`
                          </tr>
                        </thead>
                        <tbody>
                          `+waktu+`
                        </tbody>
                      </table>`;

            $('#loadJadwal').html(jadwal);
            loadJadwal();
          } else {
            jadwal = `<div class="text-center">
                        <i class="text-soft-teal bx bx-table" style="font-size: 150px;"></i>
                        <p class="text-muted mt-0">Waktu atau rombel tidak tersedia</p>
                      </div>`;
            $('#loadJadwal').html(jadwal);
            loadingElementOff('#loadJadwal')
          }
        } else {
          jadwal = `<div class="text-center">
                      <i class="text-soft-teal bx bx-table" style="font-size: 150px;"></i>
                      <p class="text-muted mt-0">Filter hari dan kelas untuk menampilkan jadwal</p>
                    </div>`;
          $('#loadJadwal').html(jadwal);
          loadingElementOff('#loadJadwal');
        }
      }
    });
  }

  function loadJadwal()
  {
    var hari = $('#hariFilter').val();
    var kelas = $('#kelasFilter').val();

    $.ajax({
      url: "<?= site_url('admin/jadwal/load_jadwal') ?>",
      type : "post",
      data : {hari, kelas},
      dataType : "json",
      success: function(data){
        loadingElementOff('#loadJadwal');
        $.each(data, function(i, jdl) {
          $('#jdl'+jdl.id_waktu_jadwal+jdl.id_rombel_jadwal+jdl.id_hari_jadwal).html(`<a href="javascript:void(0)" class="edit-jadwal" data-id="`+jdl.id_jadwal+`" data-idmapel="`+jdl.id_mapel_jadwal+`" data-idpegawai="`+jdl.id_pegawai_jadwal+`" data-namawaktu="`+jdl.nama_waktu+`" data-namarombel="`+jdl.nama_rombel+`" data-toggle="tooltip" data-placement="top" title="`+jdl.nama_mapel+`-`+jdl.nama_pegawai+`">`+jdl.kode_mapel+`-`+jdl.kode_pegawai+`</a>`);
        });
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  }

</script>
</body>
</html>
