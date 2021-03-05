<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/waktu_m');
	}

	public function index()
	{
		$data['judul'] = 'Waktu Mengajar';
		$this->load->view('admin/waktu', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->waktu_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('jam', 'Jam', 'trim|required|numeric|callback_jam');
    $this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->waktu_m->tambah($post);
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

		$this->form_validation->set_rules('jam', 'Jam', 'trim|required|numeric|callback_edit_jam');
    $this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->waktu_m->edit($post);
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
		$this->waktu_m->hapus($id);
	}

	public function jam($jam)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('jam_waktu' => $jam, 'id_ta_waktu' => $ta);
		$cek = $this->waktu_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('jam', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_jam($jam)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$where = array ('jam_waktu' => $jam, 'id_ta_waktu' => $ta, 'id_waktu !=' => $id);
		$cek = $this->waktu_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_jam', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
