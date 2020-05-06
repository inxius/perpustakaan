<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Lokasi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('LokasiModel');
    // code...
  }

  public function index()
  {
    if ($this->session->userdata('login') == true) {
      $data['dataLokasi'] = $this->LokasiModel->getLokasi();
      $this->load->view('admin/lokasi', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function getLokasi($id)
  {
    $data['dataLokasiById'] = $this->LokasiModel->getLokasiById($id);
    echo json_encode($data);
  }

  public function tambah()
  {
    $nama = $this->input->post('nama');

    $data = array(
      'namaLokasi' => $nama
    );

    $this->LokasiModel->addLokasi($data);
    header('location:'.site_url('lokasi'));
    // $this->index();
  }

  public function edit()
  {
    $id = $this->input->post('idLokasi');
    $nama = $this->input->post('nama');

    $data = array(
      'namaLokasi' => $nama
    );

    $this->LokasiModel->editLokasi($id, $data);
    // header('location:'.site_url('lokasi'));
    $this->index();
  }

  public function hapus($id)
  {
    $this->LokasiModel->deleteLokasi($id);
    echo "Delete Success";
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
