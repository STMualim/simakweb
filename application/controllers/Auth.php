<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('login_m');
	}

	public function proses()
	{
		$post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());
		$tlp_email = isset($post['tlp_email']) ? $post['tlp_email'] : "";
		$str = substr($tlp_email, 0, 1);

		if ($str === "@") {
			$this->form_validation->set_rules('tlp_email', 'No. Tlp./Email', 'trim|required|callback_username');
			$this->form_validation->set_rules('pin', 'PIN', 'trim|required|callback_pin_user');
			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

			$this->form_validation->set_message('required', 'Kolom {field} wajib diisi!');

			if($this->form_validation->run()) {
				$row = $this->login_m->login_user($post)->row();
				$col = array(
					'id_user' => $row->id_user,
					'level_user' => $row->level_user
				);
				$this->session->set_userdata($col);
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		} else {
			$this->form_validation->set_rules('tlp_email', 'No. Tlp./Email', 'trim|required|callback_tlp_email');
			$this->form_validation->set_rules('pin', 'PIN', 'trim|required|callback_pin');
			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

			$this->form_validation->set_message('required', 'Kolom {field} wajib diisi!');

			if($this->form_validation->run()) {
				$row = $this->login_m->login_pegawai($post)->row();
				$col = array(
					'id_user' => $row->id_pegawai,
					'level_user' => $row->level_pegawai
				);
				$this->session->set_userdata($col);
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		}
		echo json_encode($data);
	}

	public function tlp_email($tlp_email)
	{
		$tlp = $tlp_email;
		$email = $tlp_email;
		if ($tlp_email != null) {
			$cek = $this->login_m->cek_tlp_email($tlp, $email);
		  if ($cek){
				return TRUE;
		  }else{
				$this->form_validation->set_message('tlp_email', '{field} tidak terdaftar! Silahkan coba lagi!');
				return FALSE;
		  }
		} else {
			return TRUE;
		}
  }

	public function pin($pin)
	{
		$tlp = $this->input->post('tlp_email');
		$email = $this->input->post('tlp_email');
		$pin = $pin;
		if ($pin != null) {
			$cek = $this->login_m->cek_data_pegawai($tlp, $email, $pin);
		  if ($cek){
				return TRUE;
		  }else{
				$this->form_validation->set_message('pin', '{field} salah! Silahkan coba lagi!');
				return FALSE;
		  }
		} else {
			return TRUE;
		}
  }

	public function username($username)
	{
		$where = array ('username_user' => $username);
		if ($username != null) {
			$cek = $this->login_m->cek_data_user($where);
		  if ($cek){
				return TRUE;
		  }else{
				$this->form_validation->set_message('username', '{field} tidak terdaftar! Silahkan coba lagi!');
				return FALSE;
		  }
		} else {
			return TRUE;
		}
  }

	public function pin_user($pin)
	{
		$username = $this->input->post('tlp_email');
		$where = array ('pin_user' => md5($pin), 'username_user' => $username);
		if ($pin != null) {
			$cek = $this->login_m->cek_data_user($where);
		  if ($cek){
				return TRUE;
		  }else{
				$this->form_validation->set_message('pin_user', '{field} salah! Silahkan coba lagi!');
				return FALSE;
		  }
		} else {
			return TRUE;
		}
  }

	public function logout()
	{
		$col = array('id_user', 'level_user', 'id_ta');
		$this->session->unset_userdata($col);
		redirect('login');
	}

	public function logout_ta()
	{
		$col = array('id_ta');
		$this->session->unset_userdata($col);
		redirect('login_ta');
	}
}
