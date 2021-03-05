<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/pegawai_m');
	}

	public function index()
	{
		$data['judul'] = 'Pegawai';
		$this->load->view('admin/pegawai', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->pegawai_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

		if ($post['step'] == 1) {
			$this->form_validation->set_rules('kode', 'Kode', 'callback_kode');
	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');

			if ($this->form_validation->run()) {
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		} else if ($post['step'] == 2) {
			$data['sukses'] = true;
		} else {
			if (($post['jenis'] == 1) || isset($post['admin'])) {
				$this->form_validation->set_rules('pin', 'PIN', 'trim|required|numeric|min_length[6]');
			}
			$this->form_validation->set_rules('tlp', 'No. Tlp/Hp', 'trim|required|numeric|callback_tlp');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');
			$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
			$this->form_validation->set_message('min_length', '{field} maksimal {param}!');

			if ($this->form_validation->run()) {
				$this->pegawai_m->tambah($post);
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
					$data['error'][$key] = form_error($key);
				}
			}
		}
		echo json_encode($data);
  }

	public function edit()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

		if ($post['step'] == 1) {
			$this->form_validation->set_rules('kode', 'Kode', 'callback_edit_kode');
	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');

			if ($this->form_validation->run()) {
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		} else if ($post['step'] == 2) {
			$data['sukses'] = true;
		} else {
			if (($post['jenis'] == 1) || isset($post['admin'])) {
				$this->form_validation->set_rules('pin', 'PIN', 'trim|required|numeric|min_length[6]');
			}
			$this->form_validation->set_rules('tlp', 'No. Tlp/Hp', 'trim|required|numeric|callback_edit_tlp');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');
			$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
			$this->form_validation->set_message('min_length', '{field} maksimal {param}!');

			if ($this->form_validation->run()) {
				$this->pegawai_m->edit($post);
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
					$data['error'][$key] = form_error($key);
				}
			}
		}
		echo json_encode($data);
  }

	public function hapus()
	{
		$id = $this->input->get('id');
		$this->pegawai_m->hapus($id);
	}

	public function kode($kode)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('kode_pegawai' => $kode, 'id_ta_pegawai' => $ta);
		$cek = $this->pegawai_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('kode', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_kode($kode)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$where = array ('kode_pegawai' => $kode, 'id_ta_pegawai' => $ta, 'id_pegawai !=' => $id);
		$cek = $this->pegawai_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_kode', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function tlp($tlp)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('tlp_pegawai' => $tlp, 'id_ta_pegawai' => $ta);
		$cek = $this->pegawai_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('tlp', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_tlp($tlp)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$where = array ('tlp_pegawai' => $tlp, 'id_ta_pegawai' => $ta, 'id_pegawai !=' => $id);
		$cek = $this->pegawai_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_tlp', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
