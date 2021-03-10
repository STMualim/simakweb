<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/siswa_m');
	}

	public function index()
	{
		$data['judul'] = 'Siswa';
		$data['jurusan'] = $this->siswa_m->load_jurusan()->result();
		$data['rombel'] = $this->siswa_m->load_rombel()->result();
		$data['ruangan'] = $this->siswa_m->load_ruangan()->result();
		$this->load->view('admin/siswa', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->siswa_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

		if ($post['step'] == 1) {
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
	    $this->form_validation->set_rules('rombel', 'Rombel', 'trim|required');
	    $this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required');
	    $this->form_validation->set_rules('nama', 'Nama Siswa', 'trim|required');

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
			$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
	    $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
			$this->form_validation->set_rules('tlp_ayah', 'No. Tlp./HP.', 'trim|numeric');
			$this->form_validation->set_rules('tlp_ibu', 'No. Tlp./HP.', 'trim|numeric');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');

			if ($this->form_validation->run()) {
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		} else {
			$this->form_validation->set_rules('pin', 'PIN', 'trim|required|numeric|min_length[6]');
			$this->form_validation->set_rules('tlp_siswa', 'No. Tlp./HP.', 'trim|required|numeric|callback_tlp');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');
			$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
			$this->form_validation->set_message('min_length', '{field} maksimal {param}!');

			if ($this->form_validation->run()) {
				$this->siswa_m->tambah($post);
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
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
	    $this->form_validation->set_rules('rombel', 'Rombel', 'trim|required');
	    $this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required');
	    $this->form_validation->set_rules('nama', 'Nama Siswa', 'trim|required');

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
			$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
	    $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
			$this->form_validation->set_rules('tlp_ayah_siswa', 'No. Tlp./HP.', 'trim|numeric');
			$this->form_validation->set_rules('tlp_ibu_siswa', 'No. Tlp./HP.', 'trim|numeric');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');

			if ($this->form_validation->run()) {
				$data['sukses'] = true;
			} else {
				foreach ($post as $key => $value) {
				 	$data['error'][$key] = form_error($key);
				}
			}
		} else {
			$this->form_validation->set_rules('pin', 'PIN', 'trim|required|numeric|min_length[6]');
			$this->form_validation->set_rules('tlp_siswa', 'No. Tlp./HP.', 'trim|required|numeric|callback_edit_tlp');

			$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
			$this->form_validation->set_message('required', '{field} wajib diisi!');
			$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
			$this->form_validation->set_message('min_length', '{field} maksimal {param}!');

			if ($this->form_validation->run()) {
				$this->siswa_m->edit($post);
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
		$this->siswa_m->hapus($id);
	}

	public function tlp($tlp)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('tlp_siswa' => $tlp, 'id_ta_siswa' => $ta);
		$cek = $this->siswa_m->cek_data($where, 1);
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
		$where = array ('tlp_siswa' => $tlp, 'id_ta_siswa' => $ta, 'id_siswa !=' => $id);
		$cek = $this->siswa_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_tlp', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
