<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran_m extends CI_Model {

  function load_data($post)
  {
    $this->datatables->from('ta');

    // Filter
    if ($post['tahun'] != null) {
      $this->datatables->like('tahun_ta', $post['tahun']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $this->db->insert('ta', [
      'tahun_ta' => $post['tahun'],
      'status_ta' => 2,
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_ta', $post['id']);
    $this->db->update('ta', [
      'tahun_ta' => $post['tahun'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_ta', $id);
    $this->db->delete('ta');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('ta', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
