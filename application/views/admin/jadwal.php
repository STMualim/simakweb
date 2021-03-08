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
            <div class="card-body table-responsive p-0">
              <table id="tblData" class="table table-bordered table-hover table-striped table-sm text-nowrap text-center" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;">Jam</th>
                    <th style="width: 150px;">Waktu</th>
                    <?php foreach ($rombel as $key => $row) { ?>
                      <th style="width: 10px;"><?= $row->nama_rombel ?></th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody id="loadJadwal">
                  <!-- <?php foreach ($waktu as $key => $row) { ?>
                    <tr>
                      <td class="text-center"><b><?= $row->jam_waktu ?></b></td>
                      <td><b><?= $row->nama_waktu ?></b></td>
                      <?php foreach ($rombel as $key => $col) { ?>
                        <?php foreach ($jadwal as $key => $jdl) { ?>
                          <?php if ($jdl->id_rombel_jadwal == $col->id_rombel && $jdl->id_waktu_jadwal == $row->id_waktu) { ?>
                            <td><a href="javascript:void(0)" data-waktu="<?= $row->id_waktu ?>" data-rombel="<?= $col->id_rombel ?>" data-toggle="tooltip" data-placement="top" title="<?= "$jdl->nama_mapel-$jdl->nama_pegawai" ?>"><?= "$jdl->kode_mapel-$jdl->kode_pegawai" ?></a></td>
                          <?php } else { ?>
                            <td><a href="javascript:void(0)" data-waktu="<?= $row->id_waktu ?>" data-rombel="<?= $col->id_rombel ?>">...</a></td>
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
                    </tr>
                  <?php } ?> -->
                </tbody>
              </table>
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
            <form id="formData" autocomplete="off">
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="id" id="id">

                  <div class="col-md-12">
                    <div class="form-group form-nama">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama">
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
      $('#tblData').DataTable().destroy();
      loadData();
    });

    // Reset Filter
    $('#resetFilter').click(function(){
      $('#namaFilter').val("");
      $('#tblData').DataTable().destroy();
      loadData();
    });

    // Tambah Data
    $('.btn-tambah').click(function(){
      simpan = "tambah";
      $('#mdlData').modal('show');
      $('.modal-title').text("Tambah Data");
      $('#formData').trigger('reset');
      $('.select').val("").trigger('change.select2');
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();
      $('#mdlData').on('shown.bs.modal', function(){
        $('#nama').focus();
      });
    });

    // Edit Data
    $('#tblData').on('click', '.edit-data', function(){
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#id').val(id);
      $('#nama').val(nama);

      simpan = "edit";
      $('#mdlData').modal('show');
      $('.modal-title').text("Edit Data");
      $('.form-control').removeClass('is-invalid');
      $('.invalid-message').remove();
    });

    // Submit Data
    $('#formData').submit(function(e){
      e.preventDefault();
      var url;
      if (simpan == "tambah") {
        url = "<?= site_url('admin/kelas/tambah') ?>"
      } else {
        url = "<?= site_url('admin/kelas/edit') ?>"
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
            reloadTable('#tblData');
            if(simpan == 'edit'){
              $('#mdlData').modal('hide');
            }
            $('#nama').focus();
            $('#formData').trigger('reset');
            $('.select').val("").trigger('change.select2');
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
        url: '<?= site_url('admin/kelas/hapus') ?>',
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
        var jadwal = "";

        if (data.jadwal.length > 0) {
          $.each(data.waktu, function(i, wkt) {
            jadwal += `<tr>
                        <td><b>`+wkt.jam_waktu+`</b></td>
                        <td><b>`+wkt.nama_waktu+`</b></td>`+
                        $.each(data.rombel, function(i, rom) {
                          $.each(data.jadwal, function(i, jdl) {
                            if (jdl.id_rombel_jadwal == rom.id_rombel && jdl.id_waktu_jadwal == rom.id_waktu && jdl.id_hari_jadwal == hari) {
                              jadwal = `<td><a href="javascript:void(0)" data-id="`+jdl.id_jadwal+`" data-toggle="tooltip" data-placement="top" title="`+jdl.nama_mapel+`-`+jdl.nama_pegawai+`"></a></td>`
                            } else {
                              jadwal = `<td><a href="javascript:void(0)" data-hari="`+hari+`" data-waktu="`+wkt.id_waktu+`" data-rombel="`+rom.id_rombel+`">...</a></td>`
                            }
                          })
                        })
                      +`</tr>`
          });
          // for (var i = 0; i < data.length; i++) {
          //   log += `<li class="event-list">
          //             <div class="event-timeline-dot text-primary">
          //               <i class="bx bx-right-arrow-circle"></i>
          //             </div>
          //             <div class="media">
          //               <div class="mr-3">
          //                 <i class="bx bx-copy-alt h2 text-primary"></i>
          //               </div>
          //               <div class="media-body">
          //                 <div>
          //                   <h5 class="font-size-14">`+tglIndo(data[i].tgl_log)+` (`+data[i].nama_user+`)</h5>
          //                   <p class="text-muted">`+data[i].ket_log+`</p>
          //                 </div>
          //               </div>
          //             </div>
          //           </li>`;
          // }
          $('#loadJadwal').html(jadwal);
        } else {
          jadwal = `oke`;

          $('#loadJadwal').html(jadwal);
        }
      }
    });
  }

</script>
</body>
</html>
