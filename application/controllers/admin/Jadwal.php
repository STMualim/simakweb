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

	public function load_tugas_ajar()
	{
		$rombel = $this->input->get('idRombel');
		$data = $this->jadwal_m->load_tugas_ajar($rombel)->result();
		echo json_encode($data);
	}

	public function tambah()
  {
    $post = $this->input->post();
		$data['sukses'] = true;

    if ($this->jadwal_m->cek_data($post)->num_rows() == 0) {
			$this->jadwal_m->tambah($post);
    } else {
    	$data['sukses'] = false;
    }
		echo json_encode($data);
  }

	public function edit()
  {
    $post = $this->input->post();
		$data['sukses'] = true;

    if ($this->jadwal_m->cek_data_edit($post)->num_rows() == 0) {
			$this->jadwal_m->edit($post);
    } else {
    	$data['sukses'] = false;
    }
		echo json_encode($data);
  }
	//
	// public function tambah()
  // {
  //   $post = $this->input->post();
	// 	$data = array ('sukses' => false, 'error' => array());
	//
  //   $this->form_validation->set_rules('tugas_ajar', 'Tugas Ajar', 'trim|callback_tugas');
	// 	$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
	//
	// 	$this->form_validation->set_message('required', '{field} wajib diisi!');
	// 	$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
	//
	// 	if ($this->form_validation->run()) {
	// 		$this->jadwal_m->tambah($post);
	// 		$data['sukses'] = true;
	// 	} else {
	// 		foreach ($post as $key => $value) {
	// 		 	$data['error'][$key] = form_error($key);
	// 		}
	// 	}
	// 	echo json_encode($data);
  // }

	// public function edit()
  // {
  //   $post = $this->input->post();
	// 	$data = array ('sukses' => false, 'error' => array());
	//
	// 	$this->form_validation->set_rules('tugas_ajar', 'Tugas Ajar', 'trim|callback_edit_tugas');
	// 	$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');
	//
	// 	$this->form_validation->set_message('required', '{field} wajib diisi!');
	// 	$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');
	//
	// 	if ($this->form_validation->run()) {
	// 		$this->jadwal_m->edit($post);
	// 		$data['sukses'] = true;
	// 	} else {
	// 		foreach ($post as $key => $value) {
	// 		 	$data['error'][$key] = form_error($key);
	// 		}
	// 	}
	// 	echo json_encode($data);
  // }

	public function hapus()
	{
		$id = $this->input->get('id');
		$this->jadwal_m->hapus($id);
	}

	// public function tugas($tugas)
	// {
	// 	$ta = $this->fungsi->ta()->id_ta;
	// 	$post = $this->input->post();
	//   $pegawai = $this->db->get_where('tugas_ajar', ['id_tugas_ajar' => $tugas])->row_array();
	//
	// 	$where = array (
	// 		'id_pegawai_tugas_ajar' => $pegawai['id_pegawai_tugas_ajar'],
	// 		'id_hari_jadwal' => $post['hari'],
	// 		'id_waktu_jadwal' => $post['waktu'],
	// 		'id_ta_jadwal' => $ta,
	// 	);
	//
	// 	$cek = $this->jadwal_m->cek_data($where, 1);
	//   if ($cek){
	// 	  $this->form_validation->set_message('tugas', '{field} sudah terdaftar di jam ini!');
	// 	  return FALSE;
	//   }else{
	// 	  return TRUE;
	//   }
  // }
	//
	// public function edit_tugas($tugas)
	// {
	// 	$ta = $this->fungsi->ta()->id_ta;
	// 	$post = $this->input->post();
	//   $pegawai = $this->db->get_where('tugas_ajar', ['id_tugas_ajar' => $tugas])->row_array();
	//
	// 	$where = array (
	// 		'id_pegawai_tugas_ajar' => $pegawai['id_pegawai_tugas_ajar'],
	// 		'id_hari_jadwal' => $post['hari'],
	// 		'id_waktu_jadwal' => $post['waktu'],
	// 		'id_jadwal !=' => $post['id'],
	// 		'id_ta_jadwal' => $ta,
	// 	);
	//
	// 	$cek = $this->jadwal_m->cek_data($where, 1);
	//   if ($cek){
	// 	  $this->form_validation->set_message('edit_tugas', '{field} sudah terdaftar di jam ini!');
	// 	  return FALSE;
	//   }else{
	// 	  return TRUE;
	//   }
  // }

}
