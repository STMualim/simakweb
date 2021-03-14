<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/rombel_m');
	}

	public function index()
	{
		$data['judul'] = 'Rombongan Belajar';
		$data['jurusan'] = $this->rombel_m->load_jurusan()->result();
		$data['kelas'] = $this->rombel_m->load_kelas()->result();
		$data['pegawai'] = $this->rombel_m->load_pegawai()->result();
		$this->load->view('admin/rombel', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->rombel_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_nama');
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
    $this->form_validation->set_rules('kelas', 'Tingkat Kelas', 'trim|required');
    $this->form_validation->set_rules('pegawai', 'Wali Kelas', 'trim|required|callback_pegawai');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->rombel_m->tambah($post);
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
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Tingkat Kelas', 'trim|required');
		$this->form_validation->set_rules('pegawai', 'Wali Kelas', 'trim|required|callback_edit_pegawai');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->rombel_m->edit($post);
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
		$this->rombel_m->hapus($id);
	}

	public function nama($nama)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('nama_rombel' => $nama, 'id_ta_rombel' => $ta);
		$cek = $this->rombel_m->cek_data($where, 1);
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
		$where = array ('nama_rombel' => $nama, 'id_ta_rombel' => $ta, 'id_rombel !=' => $id);
		$cek = $this->rombel_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_nama', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function pegawai($pegawai)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$where = array ('id_pegawai_rombel' => $pegawai, 'id_ta_rombel' => $ta);
		$cek = $this->rombel_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('pegawai', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_pegawai($pegawai)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$where = array ('id_pegawai_rombel' => $pegawai, 'id_ta_rombel' => $ta, 'id_rombel !=' => $id);
		$cek = $this->rombel_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_pegawai', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
