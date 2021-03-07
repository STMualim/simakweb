<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/jadwal_m');
	}

	public function index()
	{
		$data['judul'] = 'jadwal Pelajaran';
		$data['waktu'] = $this->jadwal_m->load_waktu()->result();
		$data['rombel'] = $this->jadwal_m->load_rombel()->result();
		$this->load->view('admin/jadwal', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->jadwal_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_nama');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->jadwal_m->tambah($post);
			$data['sukses'] = true;
		} else {
			foreach ($post as $key => $value) {
			 	$data['error'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
  }

	public function edit()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_edit_nama');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->jadwal_m->edit($post);
			$data['sukses'] = true;
		} else {
			foreach ($post as $key => $value) {
			 	$data['error'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
  }

	public function hapus()
	{
		$id = $this->input->get('id');
		$this->jadwal_m->hapus($id);
	}

	public function nama($nama)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('nama_jadwal' => $nama, 'id_ta_jadwal' => $ta);
		$cek = $this->jadwal_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('nama', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_nama($nama)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$where = array ('nama_jadwal' => $nama, 'id_ta_jadwal' => $ta, 'id_jadwal !=' => $id);
		$cek = $this->jadwal_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_nama', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
