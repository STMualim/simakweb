<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ta_m extends CI_Model {

    function load_data($id = null)
    {
      $level = $this->fungsi->level();
      $pegawai = $this->fungsi->pegawai()->admin_pegawai;
      $this->db->from('ta');
      if ($id != null) {
        $this->db->where('id_ta', $id);
      }
      if ($level == 2 && $pegawai == null) {
        $this->db->where('status_ta', 1);
      }
      $this->db->order_by('status_ta', 'asc');
      $query = $this->db->get();
      return $query;
    }

}
