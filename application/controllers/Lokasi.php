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
    // code...
  }

  public function index()
  {
    $data['dataLokasi'] = $this->LokasiModel->getLokasi();
    $this->load->view('admin/lokasi', $data);
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
      'nama' => $nama
    );

    $this->LokasiModel->addLokasi($data);
    header('location:'.site_url('lokasi'));
  }

  public function edit()
  {
    $id = $this->input->post('idLokasi');
    $nama = $this->input->post('nama');

    $data = array(
      'nama' => $nama
    );

    $this->LokasiModel->editLokasi($id, $data);
    header('location:'.site_url('lokasi'));
  }

  public function hapus($id)
  {
    $this->LokasiModel->deleteLokasi($id);
    echo "Delete Success";
  }
}
