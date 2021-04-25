<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

    function login_user($post)
    {
      $this->db->from('user');
      $this->db->where('username_user', $post['tlp_email'])->where('pin_user', md5($post['pin']));
      $query = $this->db->get();
      return $query;
    }

    function login_pegawai($post)
    {
      $this->db->from('pegawai');
      $this->db->where('tlp_pegawai', $post['tlp_email'])->where('pin_pegawai', $post['pin']);
      $this->db->or_where('email_pegawai', $post['tlp_email'])->where('pin_pegawai', $post['pin']);
      $query = $this->db->get();
      return $query;
    }

    function get_user($id)
    {
      $this->db->from('user');
      $this->db->where('id_user', $id);
      $query = $this->db->get();
      return $query;
    }

    function get_pegawai($id)
    {
      $this->db->from('pegawai');
      $this->db->where('id_pegawai', $id);
      $query = $this->db->get();
      return $query;
    }

    function get_identitas($id)
    {
      $this->db->from('identitas');
      $this->db->where('id_identitas', $id);
      $query = $this->db->get();
      return $query;
    }

    function cek_tlp_email($tlp, $email)
    {
      $ta = $this->db->get_where('ta', ['status_ta'=>1])->row_array();
      $this->db->from('pegawai');
      $this->db->where('tlp_pegawai', $tlp)->where('id_ta_pegawai', $ta['id_ta']);
      $this->db->or_where('email_pegawai', $email)->where('id_ta_pegawai', $ta['id_ta']);
      $query = $this->db->get();

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return false;
      }
    }

    function cek_data_pegawai($tlp, $email, $pin)
    {
      $ta = $this->db->get_where('ta', ['status_ta'=>1])->row_array();
      $this->db->from('pegawai');
      $this->db->where('tlp_pegawai', $tlp)->where('pin_pegawai', $pin)->where('id_ta_pegawai', $ta['id_ta']);
      $this->db->or_where('email_pegawai', $email)->where('pin_pegawai', $pin)->where('id_ta_pegawai', $ta['id_ta']);
      $query = $this->db->get();

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return false;
      }
    }

    function cek_data_user($where)
    {
      $query = $this->db->get_where('user', $where);
      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return false;
      }
    }

}
