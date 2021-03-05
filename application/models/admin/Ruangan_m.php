<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('ruangan');
    $this->datatables->join('rombel', 'rombel.id_rombel = ruangan.id_rombel_ruangan', 'left');
    $this->datatables->where('id_ta_ruangan', $ta);
    // Filter
    if ($post['nama'] != null) {
      $this->datatables->like('nama_ruangan', $post['nama']);
    }
    if ($post['rombel'] != null) {
      $this->datatables->where('id_rombel_ruangan', $post['rombel']);
    }

    return $this->datatables->generate();
  }

  function load_rombel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('rombel', ['id_ta_rombel' => $ta]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('ruangan', [
      'id_ta_ruangan' => $ta,
      'id_rombel_ruangan' => $post['rombel'],
      'nama_ruangan' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_ruangan', $post['id']);
    $this->db->update('ruangan', [
      'id_rombel_ruangan' => $post['rombel'],
      'nama_ruangan' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_ruangan', $id);
    $this->db->delete('ruangan');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('ruangan', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
