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
    $data['dataTransaksi'] = $this->TransaksiModel->getAllTransaksi();
    $this->load->view('admin/allTransaksi', $data);
  }

  public function getDetail($id)
  {
    $data['detail'] = $this->TransaksiModel->getDetailTransaksi($id);
    echo json_encode($data);
  }
}
