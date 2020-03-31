<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Katalog extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('KatalogModel');
    // code...
  }

  public function index()
  {
    // echo "THERE IS MUST A CATALOG";
    $this->load->view('katalog/home');
  }

  public function show()
  {
    $data['dataKatalog'] = $this->KatalogModel->getKatalog();
    $this->load->view('katalog/katalog', $data);
  }

  public function getDetail($id)
  {
    $data['dataKatalog'] = $this->KatalogModel->getDetailKatalog($id);
    echo json_encode($data);
  }
}
