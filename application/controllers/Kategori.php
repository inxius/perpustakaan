<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Kategori extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('KategoriModel');
    // code...
  }

  public function index()
  {
    if ($this->session->userdata('login') == true) {
      $data['dataKategori'] = $this->KategoriModel->getKategori();
      $this->load->view('admin/kategori', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function getKategori($id)
  {
    $data['dataKategoriById'] = $this->KategoriModel->getKategoriById($id);
    echo json_encode($data);
  }

  public function tambah()
  {
    $nama = $this->input->post('nama');
    $data = array(
      'namaKategori' => $nama
    );
    print_r($data);
    
    $this->KategoriModel->addKategori($data);
    header('location:'.site_url('kategori'));
    // $this->index();
  }

  public function edit()
  {
    $id = $this->input->post('idKategori');
    $nama = $this->input->post('nama');
    $data = array(
      'namaKategori' => $nama
    );

    $this->KategoriModel->editKategori($id, $data);
    // header('location:'.site_url('kategori'));
    $this->index();
  }

  public function hapus($id)
  {
    $this->KategoriModel->deleteKategori($id);
    echo "Delete Success";
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
