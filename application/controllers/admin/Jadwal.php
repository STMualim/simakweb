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
		$data['judul'] = 'Jadwal Pelajaran';
		$data['hari'] = $this->jadwal_m->load_hari()->result();
		$data['kelas'] = $this->jadwal_m->load_kelas()->result();
		$data['mapel'] = $this->jadwal_m->load_mapel()->result();
		$data['pegawai'] = $this->jadwal_m->load_pegawai()->result();
		$this->load->view('admin/jadwal', $data);
	}

	public function load_data()
	{
		$post = $this->input->post();
		$data['jadwal'] = $this->jadwal_m->load_jadwal($post)->result();
		$data['waktu'] = $this->jadwal_m->load_waktu()->result();
		$data['rombel'] = $this->jadwal_m->load_rombel($post)->result();
		echo json_encode($data);
	}

	public function load_jadwal()
	{
		$post = $this->input->post();
		$data = $this->jadwal_m->load_jadwal($post)->result();
		echo json_encode($data);
	}

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
    $this->form_validation->set_rules('pegawai', 'Guru', 'trim|required|callback_pegawai');
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

		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
    $this->form_validation->set_rules('pegawai', 'Guru', 'trim|required|callback_edit_pegawai');
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

	public function pegawai($pegawai)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');

		$where = array ('id_pegawai_jadwal' => $pegawai, 'id_hari_jadwal' => $hari, 'id_waktu_jadwal' => $waktu, 'id_ta_jadwal' => $ta);
		$cek = $this->jadwal_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('pegawai', '{field} sudah terdaftar di jam ini!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_pegawai($pegawai)
	{
		$ta = $this->fungsi->ta()->id_ta;
		$id = $this->input->post('id');
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');

		$where = array ('id_pegawai_jadwal' => $pegawai, 'id_hari_jadwal' => $hari, 'id_waktu_jadwal' => $waktu, 'id_ta_jadwal' => $ta, 'id_jadwal !=' => $id);
		$cek = $this->jadwal_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_pegawai', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
