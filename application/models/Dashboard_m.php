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


}
