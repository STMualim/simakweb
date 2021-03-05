<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ta extends CI_Controller {

  function __construct()
	{
		parent::__construct();
    tidak_login();
    sedang_login_ta();
    $this->load->model([
      'login_ta_m',
      'admin/tahun_ajaran_m'
    ]);
	}

	public function index()
	{
		$this->load->view('login_ta');
  }

	public function load_data()
	{
		$data = $this->login_ta_m->load_data()->result();
    echo json_encode($data);
  }

	public function pilih_ta()
	{
    $id = $this->input->post('id');
    $col = array(
      'id_ta' => $id
    );
    $this->session->set_userdata($col);
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
}
