<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('siswa');
    $this->datatables->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan_siswa', 'left');
    $this->datatables->join('rombel', 'rombel.id_rombel = siswa.id_rombel_siswa', 'left');
    $this->datatables->where('id_ta_siswa', $ta);
    // Filter
    if ($post['nama'] != null) {
      $this->datatables->like('nama_siswa', $post['nama']);
    }
    if ($post['jurusan'] != null) {
      $this->datatables->where('id_jurusan_siswa', $post['jurusan']);
    }
    if ($post['rombel'] != null) {
      $this->datatables->where('id_rombel_siswa', $post['rombel']);
    }

    return $this->datatables->generate();
  }

  function load_jurusan()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('jurusan', ['id_ta_jurusan' => $ta]);
  }

  function load_rombel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('rombel', ['id_ta_rombel' => $ta]);
  }

  function get_rombel($jurusan)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->from('rombel');
    $this->db->where('id_ta_rombel', $ta)->where('id_jurusan_rombel', $jurusan);
    return $this->db->get();
  }

  function load_ruangan()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('ruangan', ['id_ta_ruangan' => $ta]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('siswa', [
      'id_ta_siswa' => $ta,
      'id_jurusan_siswa' => empty($post['jurusan']) ? null : $post['jurusan'],
      'id_rombel_siswa' => empty($post['rombel']) ? null : $post['rombel'],
      'nama_siswa' => $post['nama'],
      'nisn_siswa' => empty($post['nisn']) ? null : $post['nisn'],
      'nis_siswa' => empty($post['nis']) ? null : $post['nis'],
      'tmp_lahir_siswa' => empty($post['tmp_lahir']) ? null : $post['tmp_lahir'],
      'tgl_lahir_siswa' => empty($post['tgl_lahir']) ? null : date('Y-m-d', strtotime($post['tgl_lahir'])),
      'jenkel_siswa' => $post['jenkel'],
      'agama_siswa' => $post['agama'],
      'alamat_siswa' => empty($post['alamat']) ? null : $post['alamat'],
      'rt_siswa' => empty($post['rt']) ? null : $post['rt'],
      'rw_siswa' => empty($post['rw']) ? null : $post['rw'],
      'kode_pos_siswa' => empty($post['kode_pos']) ? null : $post['kode_pos'],
      'kel_siswa' => empty($post['kel']) ? null : $post['kel'],
      'kec_siswa' => empty($post['kec']) ? null : $post['kec'],
      'kota_siswa' => empty($post['kota']) ? null : $post['kota'],
      'provinsi_siswa' => empty($post['provinsi']) ? null : $post['provinsi'],
      'asal_sekolah_siswa' => empty($post['asal_sekolah']) ? null : $post['asal_sekolah'],
      'tmp_tinggal_siswa' => $post['tmp_tinggal'],
      'jml_sdr_siswa' => empty($post['jml_saudara']) ? null : $post['jml_saudara'],
      'anak_ke_siswa' => empty($post['anak_ke']) ? null : $post['anak_ke'],
      'status_kel_siswa' => $post['status_kel'],
      'ayah_siswa' => $post['nama_ayah'],
      'pekerjaan_ayah_siswa' => empty($post['pekerjaan_ayah']) ? null : $post['pekerjaan_ayah'],
      'penghasilan_ayah_siswa' => empty($post['penghasilan_ayah']) ? null : $post['penghasilan_ayah'],
      'nik_ayah_siswa' => empty($post['nik_ayah']) ? null : $post['nik_ayah'],
      'tlp_ayah_siswa' => empty($post['tlp_ayah']) ? null : $post['tlp_ayah'],
      'ibu_siswa' => $post['nama_ibu'],
      'pekerjaan_ibu_siswa' => empty($post['pekerjaan_ibu']) ? null : $post['pekerjaan_ibu'],
      'penghasilan_ibu_siswa' => empty($post['penghasilan_ibu']) ? null : $post['penghasilan_ibu'],
      'nik_ibu_siswa' => empty($post['nik_ibu']) ? null : $post['nik_ibu'],
      'tlp_ibu_siswa' => empty($post['tlp_ibu']) ? null : $post['tlp_ibu'],
      'tlp_siswa' => $post['tlp'],
      'email_siswa' => empty($post['email']) ? null : $post['email'],
      'pin_siswa' => $post['pin']
    ]);
  }

  function edit($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->where('id_siswa', $post['id']);
    $this->db->update('siswa', [
      'id_ta_siswa' => $ta,
      'id_jurusan_siswa' => empty($post['jurusan']) ? null : $post['jurusan'],
      'id_rombel_siswa' => empty($post['rombel']) ? null : $post['rombel'],
      'nama_siswa' => $post['nama'],
      'nisn_siswa' => empty($post['nisn']) ? null : $post['nisn'],
      'nis_siswa' => empty($post['nis']) ? null : $post['nis'],
      'tmp_lahir_siswa' => empty($post['tmp_lahir']) ? null : $post['tmp_lahir'],
      'tgl_lahir_siswa' => empty($post['tgl_lahir']) ? null : date('Y-m-d', strtotime($post['tgl_lahir'])),
      'jenkel_siswa' => $post['jenkel'],
      'agama_siswa' => $post['agama'],
      'alamat_siswa' => empty($post['alamat']) ? null : $post['alamat'],
      'rt_siswa' => empty($post['rt']) ? null : $post['rt'],
      'rw_siswa' => empty($post['rw']) ? null : $post['rw'],
      'kode_pos_siswa' => empty($post['kode_pos']) ? null : $post['kode_pos'],
      'kel_siswa' => empty($post['kel']) ? null : $post['kel'],
      'kec_siswa' => empty($post['kec']) ? null : $post['kec'],
      'kota_siswa' => empty($post['kota']) ? null : $post['kota'],
      'provinsi_siswa' => empty($post['provinsi']) ? null : $post['provinsi'],
      'asal_sekolah_siswa' => empty($post['asal_sekolah']) ? null : $post['asal_sekolah'],
      'tmp_tinggal_siswa' => $post['tmp_tinggal'],
      'jml_sdr_siswa' => empty($post['jml_saudara']) ? null : $post['jml_saudara'],
      'anak_ke_siswa' => empty($post['anak_ke']) ? null : $post['anak_ke'],
      'status_kel_siswa' => $post['status_kel'],
      'ayah_siswa' => $post['nama_ayah'],
      'pekerjaan_ayah_siswa' => empty($post['pekerjaan_ayah']) ? null : $post['pekerjaan_ayah'],
      'penghasilan_ayah_siswa' => empty($post['penghasilan_ayah']) ? null : $post['penghasilan_ayah'],
      'nik_ayah_siswa' => empty($post['nik_ayah']) ? null : $post['nik_ayah'],
      'tlp_ayah_siswa' => empty($post['tlp_ayah']) ? null : $post['tlp_ayah'],
      'ibu_siswa' => $post['nama_ibu'],
      'pekerjaan_ibu_siswa' => empty($post['pekerjaan_ibu']) ? null : $post['pekerjaan_ibu'],
      'penghasilan_ibu_siswa' => empty($post['penghasilan_ibu']) ? null : $post['penghasilan_ibu'],
      'nik_ibu_siswa' => empty($post['nik_ibu']) ? null : $post['nik_ibu'],
      'tlp_ibu_siswa' => empty($post['tlp_ibu']) ? null : $post['tlp_ibu'],
      'tlp_siswa' => $post['tlp'],
      'email_siswa' => empty($post['email']) ? null : $post['email'],
      'pin_siswa' => $post['pin']
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_siswa', $id);
    $this->db->delete('siswa');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('siswa', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
