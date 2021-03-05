<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('kelas');
    $this->datatables->join('pegawai', 'pegawai.id_pegawai = kelas.id_pegawai_kelas', 'left');
    $this->datatables->where('id_ta_kelas', $ta);
    // Filter
    if ($post['kode'] != null) {
      $this->datatables->like('kode_kelas', $post['kode']);
    }
    if ($post['nama'] != null) {
      $this->datatables->like('nama_kelas', $post['nama']);
    }
    if ($post['pegawai'] != null) {
      $this->datatables->like('nama_pegawai', $post['pegawai']);
    }

    return $this->datatables->generate();
  }

  function load_pegawai()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('pegawai', ['id_ta_pegawai' => $ta, 'level_pegawai' => 2]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('kelas', [
      'id_ta_kelas' => $ta,
      'id_pegawai_kelas' => $post['pegawai'],
      'kode_kelas' => $post['kode'],
      'nama_kelas' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_kelas', $post['id']);
    $this->db->update('kelas', [
      'id_pegawai_kelas' => $post['pegawai'],
      'kode_kelas' => $post['kode'],
      'nama_kelas' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_kelas', $id);
    $this->db->delete('kelas');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('kelas', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
