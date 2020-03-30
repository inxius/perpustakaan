<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Penerbit extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('PenerbitModel');
    // code...
  }

  public function index()
  {
    if ($this->session->userdata('login') == true) {
      $data['dataPenerbit'] = $this->PenerbitModel->getPenerbit();
      $this->load->view('admin/penerbit', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function getPenerbit($id)
  {
    $data['dataPenerbitById'] = $this->PenerbitModel->getPenerbitById($id);
    echo json_encode($data);
  }

  public function tambah()
  {
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');
    $alamat = $this->input->post('alamat');

    $data = array(
      'namaPenerbit' => $nama,
      'telp' => $telp,
      'alamat' => $alamat
    );

    $this->PenerbitModel->addPenerbit($data);
    // header('location:'.site_url('penerbit'));
    $this->index();
  }

  public function edit()
  {
    $id = $this->input->post('idPenerbit');
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');
    $alamat = $this->input->post('alamat');

    $data = array(
      'namaPenerbit' => $nama,
      'telp' => $telp,
      'alamat' => $alamat
    );

    $this->PenerbitModel->editPenerbit($id, $data);
    // header('location:'.site_url('penerbit'));
    $this->index();
  }

  public function hapus($id)
  {
    $this->PenerbitModel->deletePenerbit($id);
    echo "Delete Success";
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
