<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {

  function load_jadwal($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->from('jadwal');
    $this->db->join('hari', 'hari.id_hari = jadwal.id_hari_jadwal', 'left');
    $this->db->join('rombel', 'rombel.id_rombel = jadwal.id_rombel_jadwal', 'left');
    $this->db->join('waktu', 'waktu.id_waktu = jadwal.id_waktu_jadwal', 'left');
    $this->db->join('mapel', 'mapel.id_mapel = jadwal.id_mapel_jadwal', 'left');
    $this->db->join('pegawai', 'pegawai.id_pegawai = jadwal.id_pegawai_jadwal', 'left');
    $this->db->where('id_ta_jadwal', $ta);
    if ($post['hari'] != null) {
      $this->db->where('id_hari_jadwal', $post['hari']);
    }
    if ($post['kelas'] != null) {
      $this->db->where('id_kelas_rombel', $post['kelas']);
    }
    return $this->db->get();
  }

  function load_waktu()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('waktu', ['id_ta_waktu' => $ta]);
  }

  function load_rombel($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('rombel', ['id_ta_rombel' => $ta, 'id_kelas_rombel' => $post['kelas']]);
  }

  function load_hari()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('hari', ['id_ta_hari' => $ta]);
  }

  function load_kelas()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('kelas', ['id_ta_kelas' => $ta]);
  }

  function load_mapel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('mapel', ['id_ta_mapel' => $ta]);
  }

  function load_pegawai()
  {
    $ta = $this->fungsi->ta()->id_ta;
    return $this->db->get_where('pegawai', ['id_ta_pegawai' => $ta, 'level_pegawai' => 2]);
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('jadwal', [
      'id_ta_jadwal' => $ta,
      'id_hari_jadwal' => $post['hari'],
      'id_rombel_jadwal' => $post['rombel'],
      'id_waktu_jadwal' => $post['waktu'],
      'id_mapel_jadwal' => $post['mapel'],
      'id_pegawai_jadwal' => $post['pegawai'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_jadwal', $post['id']);
    $this->db->update('jadwal', [
      'id_mapel_jadwal' => $post['mapel'],
      'id_pegawai_jadwal' => $post['pegawai'],
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
