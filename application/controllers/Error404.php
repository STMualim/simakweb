<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
    $data['judul'] = 'ERROR404';
		$this->load->view('error404', $data);
  }
}
