<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/tahun_ajaran_m');
	}

	public function index()
	{
		$data['judul'] = 'Tahun Ajaran';
		$this->load->view('admin/tahun_ajaran', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->tahun_ajaran_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|callback_tahun');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->tahun_ajaran_m->tambah($post);
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

    $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|callback_edit_tahun');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->tahun_ajaran_m->edit($post);
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
		$this->tahun_ajaran_m->hapus($id);
	}

	public function tahun($tahun)
	{
		$where = array ('tahun_ta' => $tahun);
		$cek = $this->tahun_ajaran_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('tahun', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_tahun($tahun)
	{
		$id = $this->input->post('id');
		$where = array ('tahun_ta' => $tahun, 'id_ta !=' => $id);
		$cek = $this->tahun_ajaran_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_tahun', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
