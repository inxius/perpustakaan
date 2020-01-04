<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Anggota extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('AnggotaModel');
    // code...
  }

  public function index()
  {
    $data['dataAnggota'] = $this->AnggotaModel->getAnggota();
    $this->load->view('admin/anggota', $data);
  }

  public function getAnggota($id)
  {
    $data['dataAnggotaById'] = $this->AnggotaModel->getAnggotaById($id);
    echo json_encode($data);
  }

  public function tambah()
  {
    $data = array(
      'nomorAnggota' => $this->input->post('nomorAnggota'),
      'nik' => $this->input->post('nik'),
      'namaAnggota' => $this->input->post('nama'),
      'jk' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat'),
    );

    $this->AnggotaModel->addAnggota($data);
    header('location:'.site_url('anggota'));
  }

  public function edit()
  {
    $id = $this->input->post('idAnggota');

    $data = array(
      'nomorAnggota' => $this->input->post('nomorAnggota'),
      'nik' => $this->input->post('nik'),
      'namaAnggota' => $this->input->post('nama'),
      'jk' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat'),
    );

    $this->AnggotaModel->editAnggota($id, $data);
    header('location:'.site_url('anggota'));
  }

  public function hapus($id)
  {
    $this->AnggotaModel->deleteAnggota($id);
    echo "Delete Success";
  }
}
