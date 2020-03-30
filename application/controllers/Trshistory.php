<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Trshistory extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array('TransaksiModel', 'AnggotaModel', 'BukuModel'));
    // code...
  }

  public function index()
  {
    if ($this->session->userdata('login') == true) {
      $data['dataTransaksi'] = $this->TransaksiModel->getAllTransaksi();
      $this->load->view('admin/allTransaksi', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function getDetail($id)
  {
    $data['detail'] = $this->TransaksiModel->getDetailTransaksi($id);
    echo json_encode($data);
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
