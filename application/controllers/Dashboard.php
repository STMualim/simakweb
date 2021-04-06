<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		tidak_login();
		tidak_login_ta();
		$this->load->model('dashboard_m');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['jml_siswa'] = $this->dashboard_m->jml_siswa()->num_rows();
		$data['jml_guru'] = $this->dashboard_m->jml_guru()->num_rows();
		$data['jml_rombel'] = $this->dashboard_m->jml_rombel()->num_rows();
		$data['jml_ruangan'] = $this->dashboard_m->jml_ruangan()->num_rows();
		$this->load->view('dashboard', $data);
	}

	public function load_alert_ta()
	{
		$data = $this->dashboard_m->load_alert_ta()->row();
		echo json_encode($data);;
	}

	public function aktifkan_ta()
	{
		$id = $this->input->get('id');
		$this->dashboard_m->matikan_ta();
		$this->dashboard_m->aktifkan_ta($id);
	}

}
