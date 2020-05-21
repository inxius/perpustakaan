<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class BukuModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function countBuku()
  {
    return $this->db->count_all('buku');
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

  function getLastID()
  {
    $this->db->select('idBuku');
    $this->db->from('buku');
    $this->db->order_by("idBuku", "DESC");
    $this->db->limit(1);
    foreach ($this->db->get()->result() as $key) {
      $id = $key->idBuku;
    }
    return $id;
  }

  function addBuku($data)
  {
    $dataBuku = array(
      'kode' => $data['kodeBuku'],
      'judul' => $data['judulBuku'],
      'pengarang' => $data['pengarang'],
      'idPenerbit' => $data['penerbit'],
      'idKategori' => $data['kategori'],
      'idLokasi' => $data['lokasi']
    );

    $this->db->set('idBuku', 'UUID()', FALSE);
    $bukuInsert = $this->db->insert('buku', $dataBuku);

    if ($bukuInsert) {
      $dataDetail = array(
        'idBuku' => $this->getLastID(),
        'tahunTerbit' => $data['tahun'],
        'isbn' => $data['isbn'],
        'jmlHal' => $data['jmlHal'],
        'jmlBuku' => $data['jmlBuku'],
        'deskripsi' => $data['deskripsi'],
        'gambar' => $data['picture']
      );

      $this->db->set('idDetailBuku', 'UUID()', FALSE);
      $detailInsert = $this->db->insert('bukuDetail', $dataDetail);
    } else {
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
    } else {
      echo "something error";
    }
  }

  function deleteBuku($id)
  {
    $this->db->where('idBuku', $id);
    $this->db->delete('buku');
  }
}
