<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class BukuModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getBuku()
  {
    $this->db->select('buku.idBuku, buku.kode, buku.judul, buku.pengarang, penerbit.namaPenerbit, kategori.namaKategori, lokasi.namaLokasi');
    $this->db->from('buku');
    $this->db->join('penerbit', 'buku.idPenerbit = penerbit.idPenerbit');
    $this->db->join('kategori', 'buku.idKategori = kategori.idKategori');
    $this->db->join('lokasi', 'buku.idLokasi = lokasi.idLokasi');
    return $this->db->get()->result();
  }

  function getBukuById($id)
  {
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->join('bukuDetail', 'buku.idBuku = bukuDetail.idBuku');
    $this->db->where('buku.idBuku', $id);
    return $this->db->get()->result();
  }

  function addBuku($data)
  {
    $dataBuku = array(
      'idBuku' => '',
      'kode' => $data['kodeBuku'],
      'judul' => $data['judulBuku'],
      'pengarang' => $data['pengarang'],
      'idPenerbit' => $data['penerbit'],
      'idKategori' => $data['kategori'],
      'idLokasi' => $data['lokasi']
    );

    $bukuInsert = $this->db->insert('buku', $dataBuku);

    if ($bukuInsert) {
      $dataDetail = array(
        'idDetailBuku' => '',
        'idBuku' => $this->db->insert_id(),
        'tahunTerbit' => $data['tahun'],
        'isbn' => $data['isbn'],
        'jmlHal' => $data['jmlHal'],
        'jmlBuku' => $data['jmlBuku'],
        'deskripsi' => $data['deskripsi'],
        'gambar' => $data['picture']
      );

      $detailInsert = $this->db->insert('bukuDetail', $dataDetail);
    }
    else {
      echo "something error";
    }
  }

  function editBuku($idBuku, $dataBuku, $dataDetail)
  {
    $this->db->where('idBuku', $idBuku);
    $updateBuku = $this->db->update('buku', $dataBuku);

    if ($updateBuku) {
      $this->db->where('idBuku', $idBuku);
      $updateDetail = $this->db->update('bukuDetail', $dataDetail);
    }
    else {
      echo "something error";
    }
  }

  function deleteBuku($id)
  {
    $this->db->where('idBuku', $id);
    $this->db->delete('buku');
  }
}
