<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('waktu');
    $this->datatables->where('id_ta_waktu', $ta);
    // Filter
    if ($post['jam'] != null) {
      $this->datatables->like('jam_waktu', $post['jam']);
    }
    if ($post['waktu'] != null) {
      $this->datatables->like('nama_waktu', $post['waktu']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('waktu', [
      'id_ta_waktu' => $ta,
      'jam_waktu' => $post['jam'],
      'nama_waktu' => $post['waktu'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_waktu', $post['id']);
    $this->db->update('waktu', [
      'jam_waktu' => $post['jam'],
      'nama_waktu' => $post['waktu'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_waktu', $id);
    $this->db->delete('waktu');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('waktu', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
