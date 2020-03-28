<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Denda extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('DendaModel');
    // code...
  }

  public function index()
  {
    $data['dataDenda'] = $this->DendaModel->getDenda();
    $this->load->view('admin/denda', $data);
  }

  public function ubah()
  {
    $id = $this->input->post('idDenda');
    $data = array(
      'nominalDenda' => $this->input->post('nilaiDenda'),
      'maxPinjamHari' => $this->input->post('hari')
    );

    $this->DendaModel->editDenda($id, $data);
    header('location:'.site_url('denda'));
  }
}
