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
    $this->db->join('tugas_ajar', 'tugas_ajar.id_tugas_ajar = jadwal.id_tugas_ajar_jadwal', 'left');
    $this->db->join('mapel', 'mapel.id_mapel = tugas_ajar.id_mapel_tugas_ajar', 'left');
    $this->db->join('pegawai', 'pegawai.id_pegawai = tugas_ajar.id_pegawai_tugas_ajar', 'left');
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

  function load_tugas_ajar($rombel)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->from('tugas_ajar');
    $this->db->join('mapel', 'mapel.id_mapel = tugas_ajar.id_mapel_tugas_ajar', 'left');
    $this->db->join('rombel', 'rombel.id_rombel = tugas_ajar.id_rombel_tugas_ajar', 'left');
    $this->db->join('pegawai', 'pegawai.id_pegawai = tugas_ajar.id_pegawai_tugas_ajar', 'left');
    $this->db->where('id_ta_tugas_ajar', $ta)->where('id_rombel_tugas_ajar', $rombel);
    return $this->db->get();
  }

  function tambah($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $this->db->insert('jadwal', [
      'id_ta_jadwal' => $ta,
      'id_hari_jadwal' => $post['hari'],
      'id_rombel_jadwal' => $post['rombel'],
      'id_waktu_jadwal' => $post['waktu'],
      'id_tugas_ajar_jadwal' => $post['tugas_ajar'],
    ]);
  }

  function edit($post)
  {
    $this->db->where('id_jadwal', $post['id']);
    $this->db->update('jadwal', [
      'id_tugas_ajar_jadwal' => $post['tugas_ajar'],
    ]);
  }

  function hapus($id)
  {
    $this->db->where('id_jadwal', $id);
    $this->db->delete('jadwal');
  }

  function cek_data($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $pgw = $this->db->get_where('tugas_ajar', ['id_tugas_ajar' => $post['tugas_ajar']])->row_array();

    $this->db->from('jadwal');
    $this->db->join('tugas_ajar', 'tugas_ajar.id_tugas_ajar = jadwal.id_tugas_ajar_jadwal', 'left');
    $this->db->where('id_pegawai_tugas_ajar', $pgw['id_pegawai_tugas_ajar'])->where('id_hari_jadwal', $post['hari'])->where('id_waktu_jadwal', $post['waktu'])->where('id_ta_jadwal', $ta);
    return $this->db->get();
  }

  function cek_data_edit($post)
  {
    $ta = $this->fungsi->ta()->id_ta;
    $pgw = $this->db->get_where('tugas_ajar', ['id_tugas_ajar' => $post['tugas_ajar']])->row_array();
    $jdl = $this->db->get_where('jadwal', ['id_jadwal' => $post['id']])->row_array();

    $this->db->from('jadwal');
    $this->db->join('tugas_ajar', 'tugas_ajar.id_tugas_ajar = jadwal.id_tugas_ajar_jadwal', 'left');
    $this->db->where('id_pegawai_tugas_ajar', $pgw['id_pegawai_tugas_ajar'])->where('id_hari_jadwal', $jdl['id_hari_jadwal'])->where('id_waktu_jadwal', $jdl['id_waktu_jadwal'])->where('id_jadwal !=', $post['id'])->where('id_ta_jadwal', $ta);
    return $this->db->get();
  }

}
