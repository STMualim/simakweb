<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('jurusan');
    $this->datatables->where('id_ta_jurusan', $ta);
    // Filter
    if ($post['kode'] != null) {
      $this->datatables->like('kode_jurusan', $post['kode']);
    }
    if ($post['nama'] != null) {
      $this->datatables->like('nama_jurusan', $post['nama']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('jurusan', [
      'id_ta_jurusan' => $ta,
      'kode_jurusan' => $post['kode'],
      'nama_jurusan' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_jurusan', $post['id']);
    $this->db->update('jurusan', [
      'kode_jurusan' => $post['kode'],
      'nama_jurusan' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_jurusan', $id);
    $this->db->delete('jurusan');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('jurusan', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
