<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('rombel');
    $this->datatables->join('kelas', 'kelas.id_kelas = rombel.id_kelas_rombel', 'left');
    $this->datatables->join('pegawai', 'pegawai.id_pegawai = rombel.id_pegawai_rombel', 'left');
    $this->datatables->where('id_ta_rombel', $ta);
    // Filter
    if ($post['nama'] != null) {
      $this->datatables->like('nama_rombel', $post['nama']);
    }
    if ($post['pegawai'] != null) {
      $this->datatables->like('nama_pegawai', $post['pegawai']);
    }
    if ($post['kelas'] != null) {
      $this->datatables->where('id_kelas_rombel', $post['kelas']);
    }

    return $this->datatables->generate();
  }

  function load_kelas()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('kelas', ['id_ta_kelas' => $ta]);
  }

  function load_pegawai()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('pegawai', ['id_ta_pegawai' => $ta, 'level_pegawai' => 2]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('rombel', [
      'id_ta_rombel' => $ta,
      'id_kelas_rombel' => $post['kelas'],
      'id_pegawai_rombel' => $post['pegawai'],
      'nama_rombel' => $post['nama'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_rombel', $post['id']);
    $this->db->update('rombel', [
      'id_kelas_rombel' => $post['kelas'],
      'id_pegawai_rombel' => $post['pegawai'],
      'nama_rombel' => $post['nama'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_rombel', $id);
    $this->db->delete('rombel');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('rombel', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
