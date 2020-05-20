<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class KatalogModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getKatalog()
  {
    $this->db->select('buku.idBuku, buku.kode, buku.judul, buku.pengarang');
    $this->db->from('buku');
    return $this->db->get()->result();
  }

  function searchKatalog($key)
  {
    $this->db->select('buku.idBuku, buku.kode, buku.judul, buku.pengarang');
    $this->db->from('buku');
    $this->db->like('buku.judul', $key);
    $this->db->or_like('buku.pengarang', $key);
    return $this->db->get()->result();
  }

  function getDetailKatalog($id)
  {
    $this->db->select('buku.idBuku, buku.kode, buku.judul, buku.pengarang, penerbit.namaPenerbit, kategori.namaKategori, lokasi.namaLokasi, bukuDetail.isbn, bukuDetail.tahunTerbit, bukuDetail.jmlHal, bukuDetail.deskripsi, bukuDetail.gambar');
    $this->db->from('buku');
    $this->db->join('bukuDetail', 'buku.idBuku = bukuDetail.idBuku');
    $this->db->join('penerbit', 'buku.idPenerbit = penerbit.idPenerbit');
    $this->db->join('kategori', 'buku.idKategori = kategori.idKategori');
    $this->db->join('lokasi', 'buku.idLokasi = lokasi.idLokasi');
    $this->db->where('buku.idBuku', $id);
    return $this->db->get()->result();
  }
}
