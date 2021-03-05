<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('hari');
    $this->datatables->where('id_ta_hari', $ta);
    // Filter
    if ($post['nama'] != null) {
      $this->datatables->like('nama_hari', $post['nama']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('hari', [
      'id_ta_hari' => $ta,
      'nama_hari' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_hari', $post['id']);
    $this->db->update('hari', [
      'nama_hari' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_hari', $id);
    $this->db->delete('hari');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('hari', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
