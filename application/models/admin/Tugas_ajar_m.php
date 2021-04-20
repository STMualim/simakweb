<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_ajar_m extends CI_Model {

  function load_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->datatables->from('tugas_ajar');
    $this->datatables->join('mapel', 'mapel.id_mapel = tugas_ajar.id_mapel_tugas_ajar', 'left');
    $this->datatables->join('rombel', 'rombel.id_rombel = tugas_ajar.id_rombel_tugas_ajar', 'left');
    $this->datatables->join('pegawai', 'pegawai.id_pegawai = tugas_ajar.id_pegawai_tugas_ajar', 'left');
    $this->datatables->where('id_ta_tugas_ajar', $ta);
    // Filter
    if ($post['mapel'] != null) {
      $this->datatables->where('id_mapel_tugas_ajar', $post['mapel']);
    }
    if ($post['rombel'] != null) {
      $this->datatables->where('id_rombel_tugas_ajar', $post['rombel']);
    }
    if ($post['pegawai'] != null) {
      $this->datatables->where('id_pegawai_tugas_ajar', $post['pegawai']);
    }

    return $this->datatables->generate();
  }

  function load_mapel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('mapel', ['id_ta_mapel' => $ta]);
  }

  function load_rombel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('rombel', ['id_ta_rombel' => $ta]);
  }

  function load_pegawai()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('pegawai', ['id_ta_pegawai' => $ta, 'level_pegawai' => 2]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('tugas_ajar', [
      'id_ta_tugas_ajar' => $ta,
      'id_mapel_tugas_ajar' => $post['mapel'],
      'id_rombel_tugas_ajar' => $post['rombel'],
      'id_pegawai_tugas_ajar' => $post['pegawai'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_tugas_ajar', $post['id']);
    $this->db->update('tugas_ajar', [
      'id_mapel_tugas_ajar' => $post['mapel'],
      'id_rombel_tugas_ajar' => $post['rombel'],
      'id_pegawai_tugas_ajar' => $post['pegawai'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_tugas_ajar', $id);
    $this->db->delete('tugas_ajar');
  }

  function cek_data($where, $limit)
  {
    $query = $this->db->get_where('tugas_ajar', $where, $limit);
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }


}
