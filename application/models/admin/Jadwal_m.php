<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('jadwal');
    $this->datatables->where('id_ta_jadwal', $ta);
    // Filter
    if ($post['nama'] != null) {
      $this->datatables->like('nama_jadwal', $post['nama']);
    }

    return $this->datatables->generate();
  }

  function load_waktu()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('waktu', ['id_ta_waktu' => $ta]);
  }

  function load_rombel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('rombel', ['id_ta_rombel' => $ta]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('jadwal', [
      'id_ta_jadwal' => $ta,
      'nama_jadwal' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_jadwal', $post['id']);
    $this->db->update('jadwal', [
      'nama_jadwal' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_jadwal', $id);
    $this->db->delete('jadwal');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('jadwal', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
