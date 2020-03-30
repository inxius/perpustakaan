<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Transaksi extends CI_Controller
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
      $data['dataTransaksi'] = $this->TransaksiModel->getTransasiAktif();
      $data['dataAnggota'] = $this->AnggotaModel->getAnggota();
      $data['dataBuku'] = $this->BukuModel->getBuku();
      $this->load->view('admin/transaksiAktif', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function pinjam()
  {
    $data = array(
      'idAnggota' => $this->input->post('anggota'),
      'idBuku' => $this->input->post('buku'),
      'tglPinjam' => date("Y-m-d"),
      'statusPinjam' => 'pinjam'
    );
    $this->TransaksiModel->transaksiPinjam($data);
    // header('location:'.site_url('transaksi'));
    $this->index();
  }

  public function kembali()
  {
    $id = $this->input->post('idTransaksi');
    $data = array(
      'tglKembali' => $this->input->post('tglKembali'),
      'denda' => $this->input->post('denda'),
      'statusPinjam' => "kembali",
    );
    $this->TransaksiModel->transaksiKembali($id, $data);
    // header('location:'.site_url('transaksi'));
    $this->index();
  }

  public function getDetailPinjam($id)
  {
    $data = $this->TransaksiModel->getDetailPinjam($id);
    $denda = $this->denda($id);
    $today = date("Y-m-d");
    foreach ($data as $key) {
      $out['judul'] = $key->judul;
      $out['nomorAnggota'] = $key->nomorAnggota;
      $out['namaAnggota'] = $key->namaAnggota;
      $out['idTransaksi'] = $key->idTransaksi;
      $out['tglPinjam'] = $key->tglPinjam;
      $out['statusPinjam'] = $key->statusPinjam;
    }
    $out['tglKembali'] = $today;
    $out['denda'] = $denda;
    echo json_encode($out);
  }

  function denda($id)
  {
    $today = date("Y-m-d");
    $data = $this->TransaksiModel->getTglPinjam($id);
    foreach ($data as $key) {
      $tglPinjam = $key->tglPinjam;
    }
    $datetime1 = new DateTime($tglPinjam);
    $datetime2 = new DateTime($today);
    $interval = $datetime1->diff($datetime2);
    $a = $interval->format("%a");
    // echo $a;

    $dataDenda = $this->TransaksiModel->getDenda();
    foreach ($dataDenda as $key) {
      $maxHari = $key->maxPinjamHari;
      $denda = $key->nominalDenda;
    }

    if ($a > $maxHari) {
      return $a * $denda;
    }
    else {
      return 0;
    }
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
