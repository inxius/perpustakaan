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
    if ($this->session->userdata('login') == null) {
      $this->loginPage();
    }
    elseif ($this->session->userdata('login') == true) {
      $this->home();
    }
    else {
      echo "string";
    }
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
        $this->session->set_userdata('login', true);
        $this->session->set_userdata('username', $username);
        $this->index();
      }
      else {
        echo "string";
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->loginPage();
  }

  function home()
  {
    if ($this->session->userdata('login') == true) {
      $this->load->view('admin/home');
    }
    else {
      $this->loginPage();
    }
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
