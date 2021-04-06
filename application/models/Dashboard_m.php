<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

  function load_alert_ta()
  {
    $ta = $this->fungsi->ta()->id_ta;
    $query = $this->db->get_where('ta', ['id_ta'=>$ta]);
    return $query;
  }

  function matikan_ta()
  {
    $this->db->where('status_ta', 1);
    $this->db->update('ta', [
      'status_ta' => 2
    ]);
  }

  function aktifkan_ta($id)
  {
    $this->db->where('id_ta', $id);
    $this->db->update('ta', [
      'status_ta' => 1
    ]);
  }

  function jml_siswa()
  {
    $ta = $this->fungsi->ta()->id_ta;
    $query = $this->db->get_where('siswa', ['id_ta_siswa'=>$ta]);
    return $query;
  }

  function jml_guru()
  {
    $ta = $this->fungsi->ta()->id_ta;
    $query = $this->db->get_where('pegawai', ['id_ta_pegawai'=>$ta, 'jenis_pegawai'=>1]);
    return $query;
  }

  function jml_rombel()
  {
    $ta = $this->fungsi->ta()->id_ta;
    $query = $this->db->get_where('rombel', ['id_ta_rombel'=>$ta]);
    return $query;
  }

  function jml_ruangan()
  {
    $ta = $this->fungsi->ta()->id_ta;
    $query = $this->db->get_where('ruangan', ['id_ta_ruangan'=>$ta]);
    return $query;
  }


}
