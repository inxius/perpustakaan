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
    // code...
  }

  public function index()
  {
    $data['dataPenerbit'] = $this->PenerbitModel->getPenerbit();
    $this->load->view('admin/penerbit', $data);
  }

  public function tambah($value='')
  {
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');
    $alamat = $this->input->post('alamat');

    $data = array(
      'nama' => $nama,
      'telp' => $telp,
      'alamat' => $alamat
    );

    $this->PenerbitModel->addPenerbit($data);
    $this->index();
  }

  public function hapus($id)
  {
    $this->PenerbitModel->deletePenerbit($id);
    $this->index();
  }
}
