<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('api/login_m');
    // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
    // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
    // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  public function proses_post()
  {
    $post = $this->post();

    if ($this->login_m->cek_akun($post) > 0) {
      $row = $this->login_m->get_user($post)->row();
      $data = [
        'id' => $row->id_user,
        'nama' => $row->nama_user,
        'username' => $row->username_user,
        'pass' => $row->pass_user,
        'level' => $row->level_user,
        'id_divisi' => $row->id_divisi_user,
        'nama_divisi' => $row->nama_divisi,
      ];

      $this->response([
        'status' => TRUE,
        'data' => $data,
        'message' => 'Data ada'
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status' => FALSE,
        'message' => 'Data tidak ada'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  public function cek_login_post()
  {
    $post = $this->post();

    if ($this->login_m->cek_login($post) > 0) {
      $this->response([
        'status' => TRUE,
        'message' => 'Data ada'
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        'status' => FALSE,
        'message' => 'Data tidak ada'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  // public function index_put()
  // {
  //   $put = $this->put();
  //   if ($this->menu_m->ubah_menu_api($put) > 0) {
  //     $this->response([
  //       'status' => TRUE,
  //       'message' => 'Data telah diubah'
  //     ], REST_Controller::HTTP_OK);
  //   } else {
  //     $this->response([
  //       'status' => FALSE,
  //       'message' => 'Data gagal diubah'
  //     ], REST_Controller::HTTP_BAD_REQUEST);
  //   }
  // }
  //
  // public function index_delete()
  // {
  //   $id = (int) $this->delete('id');
  //
  //   if ($id <= 0) {
  //     $this->response([
  //       'status' => FALSE,
  //       'message' => 'Tidak ada data terpilih'
  //     ], REST_Controller::HTTP_BAD_REQUEST);
  //   } else {
  //     if ($this->menu_m->hapus_menu_api($id) > 0) {
  //       $this->response([
  //         'status' => TRUE,
  //         'id' => $id,
  //         'message' => 'Data telah dihapus'
  //       ], REST_Controller::HTTP_OK);
  //     } else {
  //       $this->response([
  //         'status' => FALSE,
  //         'message' => 'Data tidak ditemukan'
  //       ], REST_Controller::HTTP_BAD_REQUEST);
  //     }
  //   }
  // }

}
