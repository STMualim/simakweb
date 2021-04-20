<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_ajar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('admin/tugas_ajar_m');
	}

	public function index()
	{
		$data['judul'] = 'Tugas Ajar';
		$data['mapel'] = $this->tugas_ajar_m->load_mapel()->result();
		$data['rombel'] = $this->tugas_ajar_m->load_rombel()->result();
		$data['pegawai'] = $this->tugas_ajar_m->load_pegawai()->result();
		$this->load->view('admin/tugas_ajar', $data);
	}

  public function load_data()
  {
		$post = $this->input->post();
    header('Content-Type: application/json');
    echo $this->tugas_ajar_m->load_data($post);
  }

	public function tambah()
  {
    $post = $this->input->post();
		$data = array ('sukses' => false, 'error' => array());

    $this->form_validation->set_rules('mapel', 'Mapel', 'trim|required|callback_tugas');
    $this->form_validation->set_rules('rombel', 'Rombel', 'trim|required');
    $this->form_validation->set_rules('pegawai', 'Guru', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->tugas_ajar_m->tambah($post);
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

    $this->form_validation->set_rules('mapel', 'Mapel', 'trim|required|callback_edit_tugas');
    $this->form_validation->set_rules('rombel', 'Rombel', 'trim|required');
    $this->form_validation->set_rules('pegawai', 'Guru', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger invalid-message">', '</span>');

		$this->form_validation->set_message('required', '{field} wajib diisi!');
		$this->form_validation->set_message('numeric', '{field} diisi dengan angka!');

		if ($this->form_validation->run()) {
			$this->tugas_ajar_m->edit($post);
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
		$this->tugas_ajar_m->hapus($id);
	}

	public function tugas($mapel)
	{
		$ta = $this->fungsi->ta()->id_ta;
    $post = $this->input->post();
		$where = array ('id_mapel_tugas_ajar' => $mapel, 'id_rombel_tugas_ajar' => $post['rombel'], 'id_pegawai_tugas_ajar' => $post['pegawai'], 'id_ta_tugas_ajar' => $ta);
		$cek = $this->tugas_ajar_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('tugas', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

	public function edit_tugas($mapel)
	{
		$ta = $this->fungsi->ta()->id_ta;
    $post = $this->input->post();
		$where = array ('id_mapel_tugas_ajar' => $mapel, 'id_rombel_tugas_ajar' => $post['rombel'], 'id_pegawai_tugas_ajar' => $post['pegawai'], 'id_ta_tugas_ajar' => $ta, 'id_tugas_ajar !=' => $post['id']);
		$cek = $this->tugas_ajar_m->cek_data($where, 1);
	  if ($cek){
		  $this->form_validation->set_message('edit_tugas', '{field} sudah terdaftar!');
		  return FALSE;
	  }else{
		  return TRUE;
	  }
  }

}
