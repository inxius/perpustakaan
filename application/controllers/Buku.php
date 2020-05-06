<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Buku extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array('BukuModel', 'PenerbitModel', 'KategoriModel', 'LokasiModel'));
    // code...
  }

  public function index()
  {
    if ($this->session->userdata('login') == true) {
      $data['dataBuku'] = $this->BukuModel->getBuku();
      $data['dataPenerbit'] = $this->PenerbitModel->getPenerbit();
      $data['dataKategori'] = $this->KategoriModel->getKategori();
      $data['dataLokasi'] = $this->LokasiModel->getLokasi();
      $this->load->view('admin/buku', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function detailBuku($id)
  {
    if ($this->session->userdata('login') == true) {
      $data['dataBuku'] = $this->BukuModel->getBukuById($id);
      $data['dataPenerbit'] = $this->PenerbitModel->getPenerbit();
      $data['dataKategori'] = $this->KategoriModel->getKategori();
      $data['dataLokasi'] = $this->LokasiModel->getLokasi();
      $this->load->view('admin/bukuDetail', $data);
    }
    else {
      $this->loginPage();
    }
  }

  public function lastId()
  {
    $data = $this->BukuModel->getLastID();

    echo $data;
  }

  public function tambah()
  {
    $kodeBuku = $this->input->post('kodeBuku');
    $picture = $kodeBuku.'-'.bin2hex(random_bytes(5));

    $dataInsert = array(
      'kodeBuku' => $kodeBuku,
      'judulBuku' => $this->input->post('judulBuku'),
      'pengarang' => $this->input->post('pengarang'),
      'penerbit' => $this->input->post('penerbit'),
      'isbn' => $this->input->post('isbn'),
      'tahun' => $this->input->post('tahun'),
      'jmlHal' => $this->input->post('jmlHal'),
      'jmlBuku' => $this->input->post('jmlBuku'),
      'kategori' => $this->input->post('kategori'),
      'lokasi' => $this->input->post('lokasi'),
      'deskripsi' => $this->input->post('deskripsi'),
      'picture' => $picture
    );

    $config['upload_path']          = './assets/img/';
    $config['allowed_types']        = 'png';
    $config['file_name']            = $picture;
    $config['max_size']             = 10000;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('gambarBuku')){
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
      // $this->load->view('admin/tes', $error);
      // header('location:'.site_url('buku'));
    }else{
      $data = array('upload_data' => $this->upload->data());
      // $this->load->view('admin/tes', $data);

      $this->BukuModel->addBuku($dataInsert);
      header('location:'.site_url('buku'));
    }
  }

  public function ubah()
  {
    $idBuku = $this->input->post('idBuku');
    $kodeBuku = $this->input->post('kodeBuku');
    $picture = $kodeBuku.'-'.bin2hex(random_bytes(5));

    if (is_uploaded_file($_FILES['gambarBuku']['tmp_name'])) {
      // echo "YES";
      $dataBuku = array(
        'kode' => $kodeBuku,
        'judul' => $this->input->post('judulBuku'),
        'pengarang' => $this->input->post('pengarang'),
        'idPenerbit' => $this->input->post('penerbit'),
        'idKategori' => $this->input->post('kategori'),
        'idLokasi' => $this->input->post('lokasi')
      );

      $dataDetail = array(
        'isbn' => $this->input->post('isbn'),
        'tahunTerbit' => $this->input->post('tahun'),
        'jmlHal' => $this->input->post('jmlHal'),
        'jmlBuku' => $this->input->post('jmlBuku'),
        'deskripsi' => $this->input->post('deskripsi'),
        'gambar' => $picture
      );

      $config['upload_path']          = './assets/img/';
      $config['allowed_types']        = 'png';
      $config['file_name']            = $picture;
      $config['max_size']             = 10000;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambarBuku')){
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('admin/tes', $error);
        header('location:'.site_url('buku'));
      }else{
        $data = array('upload_data' => $this->upload->data());
        // $this->load->view('admin/tes', $data);

        $this->BukuModel->editBuku($idBuku, $dataBuku, $dataDetail);
        header('location:'.site_url('buku'));
      }
    }
    else {
      $dataBuku = array(
        'kode' => $kodeBuku,
        'judul' => $this->input->post('judulBuku'),
        'pengarang' => $this->input->post('pengarang'),
        'idPenerbit' => $this->input->post('penerbit'),
        'idKategori' => $this->input->post('kategori'),
        'idLokasi' => $this->input->post('lokasi')
      );

      $dataDetail = array(
        'isbn' => $this->input->post('isbn'),
        'tahunTerbit' => $this->input->post('tahun'),
        'jmlHal' => $this->input->post('jmlHal'),
        'jmlBuku' => $this->input->post('jmlBuku'),
        'deskripsi' => $this->input->post('deskripsi')
      );
      $this->BukuModel->editBuku($idBuku, $dataBuku, $dataDetail);
      header('location:'.site_url('buku'));
    }
  }

  public function hapus($id)
  {
    $this->BukuModel->deleteBuku($id);
    echo "Delete Success";
  }

  function loginPage()
  {
    $this->load->view('admin/login');
  }
}
