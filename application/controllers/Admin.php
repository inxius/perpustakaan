<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    // code...
    parent::__construct();
    // $this->load->helper('url');
  }

  public function index()
  {
    $this->load->view('admin/login');
  }

  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = "username = '$username'";
    $cek = $this->AdminModel->getWhere($where, 'admin');
    if ($cek->num_rows() == 1) {
      $tes = $cek->result();
      foreach ($tes as $key) {
        $pass = $key->password;
      }
      if (password_verify($password, $pass)) {
        $this->home();
      }
      else {
        echo "string";
      }
    }
  }

  public function home()
  {
    $this->load->view('admin/home');
  }
}
