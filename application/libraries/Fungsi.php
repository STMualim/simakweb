<?php

Class Fungsi {

    protected $ci;

    function __construct() {
        $this->ci =& get_instance();
    }

    function user() {
        $this->ci->load->model('login_m');
        $id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->login_m->get_user($id)->row();
        return $user_data;
    }

    function pegawai() {
        $this->ci->load->model('login_m');
        $id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->login_m->get_pegawai($id)->row();
        return $user_data;
    }

    function ta() {
        $this->ci->load->model('login_ta_m');
        $id = $this->ci->session->userdata('id_ta');
        $ta_data = $this->ci->login_ta_m->load_data($id)->row();
        return $ta_data;
    }

    function level() {
        $level = $this->ci->session->userdata('level_user');
        return $level;
    }

    function identitas() {
        $this->ci->load->model('utilitas/identitas_m');
        $id = 1;
        $identitas = $this->ci->identitas_m->load($id)->row();
        return $identitas;
    }

}
