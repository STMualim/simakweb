<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('ruangan');
    $this->datatables->join('kelas', 'kelas.id_kelas = ruangan.id_kelas_ruangan', 'left');
    $this->datatables->where('id_ta_ruangan', $ta);
    // Filter
    if ($post['kode'] != null) {
      $this->datatables->like('kode_ruangan', $post['kode']);
    }
    if ($post['nama'] != null) {
      $this->datatables->like('nama_ruangan', $post['nama']);
    }
    if ($post['kelas'] != null) {
      $this->datatables->where('id_kelas_ruangan', $post['kelas']);
    }

    return $this->datatables->generate();
  }

  function load_kelas()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('kelas', ['id_ta_kelas' => $ta]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('ruangan', [
      'id_ta_ruangan' => $ta,
      'id_kelas_ruangan' => $post['kelas'],
      'kode_ruangan' => $post['kode'],
      'nama_ruangan' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_ruangan', $post['id']);
    $this->db->update('ruangan', [
      'id_kelas_ruangan' => $post['kelas'],
      'kode_ruangan' => $post['kode'],
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
