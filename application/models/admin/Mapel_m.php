<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('mapel');
    $this->datatables->where('id_ta_mapel', $ta);
    // Filter
    if ($post['kode'] != null) {
      $this->datatables->like('kode_mapel', $post['kode']);
    }
    if ($post['nama'] != null) {
      $this->datatables->like('nama_mapel', $post['nama']);
    }

    return $this->datatables->generate();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('mapel', [
      'id_ta_mapel' => $ta,
      'kode_mapel' => $post['kode'],
      'nama_mapel' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_mapel', $post['id']);
    $this->db->update('mapel', [
      'kode_mapel' => $post['kode'],
      'nama_mapel' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_mapel', $id);
    $this->db->delete('mapel');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('mapel', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
