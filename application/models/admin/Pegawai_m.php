<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('pegawai');
    $this->datatables->where('id_ta_pegawai', $ta);
    // Filter
    if ($post['kode'] != null) {
      $this->datatables->like('kode_pegawai', $post['kode']);
    }
    if ($post['nama'] != null) {
      $this->datatables->like('nama_pegawai', $post['nama']);
    }
    if ($post['jenis'] != null) {
      $this->datatables->where('jenis_pegawai', $post['jenis']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $col = [
      'id_ta_pegawai' => $ta,
      'jenis_pegawai' => $post['jenis'],
      'kode_pegawai' => empty($post['kode']) ? null : $post['kode'],
      'nama_pegawai' => $post['nama'],
      'nip_pegawai' => empty($post['nip']) ? null : $post['nip'],
      'ktp_pegawai' => empty($post['ktp']) ? null : $post['ktp'],
      'npwp_pegawai' => empty($post['npwp']) ? null : $post['npwp'],
      'tmp_lahir_pegawai' => empty($post['tmp_lahir']) ? null : $post['tmp_lahir'],
      'tgl_lahir_pegawai' => empty($post['tgl_lahir']) ? null : date('Y-m-d', strtotime($post['tgl_lahir'])),
      'alamat_pegawai' => empty($post['alamat']) ? null : $post['alamat'],
      'jenkel_pegawai' => $post['jenkel'],
      'agama_pegawai' => $post['agama'],
      'status_kawin_pegawai' => $post['status_kawin'],
      'pend_akhir_pegawai' => $post['pend_akhir'],
      'jurusan_pend_pegawai' => empty($post['jurusan_pend']) ? null : $post['jurusan_pend'],
      'gelar_depan_pegawai' => empty($post['gelar_depan']) ? null : $post['gelar_depan'],
      'gelar_belakang_pegawai' => empty($post['gelar_belakang']) ? null : $post['gelar_belakang'],
      'mulai_tugas_pegawai' => empty($post['mulai_tugas']) ? null : date('Y-m-d', strtotime($post['mulai_tugas'])),
      'bp_pegawai' => empty($post['bp']) ? null : $post['bp'],
      'admin_pegawai' => empty($post['admin']) ? null : $post['admin'],
      'tlp_pegawai' => $post['tlp'],
      'email_pegawai' => empty($post['email']) ? null : $post['email'],
      'pin_pegawai' => empty($post['pin']) ? null : $post['pin'],
      'level_pegawai' => empty($post['pin']) ? null : $post['pin'],
    ];

    if ($post['jenis'] == 2 && $post['pin'] != null) {
      $col['level_pegawai'] = 1;
    } else if ($post['jenis'] == 1) {
      $col['level_pegawai'] = 2;
    } else if ($post['jenis'] == 2 && $post['pin'] == null) {
      $col['level_pegawai'] = null;
    }

    $this->db->insert('pegawai', $col);
  }

  function edit($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $col = [
      'id_ta_pegawai' => $ta,
      'jenis_pegawai' => $post['jenis'],
      'kode_pegawai' => empty($post['kode']) ? null : $post['kode'],
      'nama_pegawai' => $post['nama'],
      'nip_pegawai' => empty($post['nip']) ? null : $post['nip'],
      'ktp_pegawai' => empty($post['ktp']) ? null : $post['ktp'],
      'npwp_pegawai' => empty($post['npwp']) ? null : $post['npwp'],
      'tmp_lahir_pegawai' => empty($post['tmp_lahir']) ? null : $post['tmp_lahir'],
      'tgl_lahir_pegawai' => empty($post['tgl_lahir']) ? null : date('Y-m-d', strtotime($post['tgl_lahir'])),
      'alamat_pegawai' => empty($post['alamat']) ? null : $post['alamat'],
      'jenkel_pegawai' => $post['jenkel'],
      'agama_pegawai' => $post['agama'],
      'status_kawin_pegawai' => $post['status_kawin'],
      'pend_akhir_pegawai' => $post['pend_akhir'],
      'jurusan_pend_pegawai' => empty($post['jurusan_pend']) ? null : $post['jurusan_pend'],
      'gelar_depan_pegawai' => empty($post['gelar_depan']) ? null : $post['gelar_depan'],
      'gelar_belakang_pegawai' => empty($post['gelar_belakang']) ? null : $post['gelar_belakang'],
      'mulai_tugas_pegawai' => empty($post['mulai_tugas']) ? null : date('Y-m-d', strtotime($post['mulai_tugas'])),
      'bp_pegawai' => empty($post['bp']) ? null : $post['bp'],
      'admin_pegawai' => empty($post['admin']) ? null : $post['admin'],
      'tlp_pegawai' => $post['tlp'],
      'email_pegawai' => empty($post['email']) ? null : $post['email'],
      'pin_pegawai' => empty($post['pin']) ? null : $post['pin'],
      'level_pegawai' => empty($post['pin']) ? null : $post['pin'],
    ];

    if ($post['jenis'] == 2 && $post['pin'] != null) {
      $col['level_pegawai'] = 1;
    } else if ($post['jenis'] == 1) {
      $col['level_pegawai'] = 2;
    } else if ($post['jenis'] == 2 && $post['pin'] == null) {
      $col['level_pegawai'] = null;
    }

    $this->db->where('id_pegawai', $post['id']);
    $this->db->update('pegawai', $col);
  }


  function hapus($id)
  {
    $this->db->where('id_pegawai', $id);
    $this->db->delete('pegawai');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('pegawai', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
