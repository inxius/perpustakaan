<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class TransaksiModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getTransasiAktif()
  {
    $this->db->select('buku.judul, anggota.nomorAnggota,
    anggota.namaAnggota, transaksi.idTransaksi, transaksi.tglPinjam, transaksi.statusPinjam');
    $this->db->from('transaksi');
    $this->db->join('anggota', 'transaksi.idAnggota = anggota.idAnggota');
    $this->db->join('buku', 'transaksi.idBuku = buku.idBuku');
    $this->db->where('transaksi.statusPinjam', 'pinjam');
    return $this->db->get()->result();
  }

  function getAllTransaksi()
  {
    $this->db->select('buku.judul, anggota.nomorAnggota,
    anggota.namaAnggota, transaksi.idTransaksi, transaksi.statusPinjam');
    $this->db->from('transaksi');
    $this->db->join('anggota', 'transaksi.idAnggota = anggota.idAnggota');
    $this->db->join('buku', 'transaksi.idBuku = buku.idBuku');
    return $this->db->get()->result();
  }

  function getDetailTransaksi($id)
  {
    $this->db->select('buku.judul, anggota.nomorAnggota,
    anggota.namaAnggota, transaksi.idTransaksi, transaksi.tglPinjam, transaksi.tglKembali, transaksi.denda');
    $this->db->from('transaksi');
    $this->db->join('anggota', 'transaksi.idAnggota = anggota.idAnggota');
    $this->db->join('buku', 'transaksi.idBuku = buku.idBuku');
    $this->db->where('transaksi.idTransaksi', $id);
    return $this->db->get()->result();
  }

  function getDenda()
  {
    return $this->db->get('denda')->result();
  }

  function getDetailPinjam($id)
  {
    $this->db->select('buku.judul, anggota.nomorAnggota,
    anggota.namaAnggota, transaksi.idTransaksi, transaksi.tglPinjam, transaksi.statusPinjam');
    $this->db->from('transaksi');
    $this->db->join('anggota', 'transaksi.idAnggota = anggota.idAnggota');
    $this->db->join('buku', 'transaksi.idBuku = buku.idBuku');
    $this->db->where('transaksi.statusPinjam', 'pinjam');
    $this->db->where('transaksi.idTransaksi', $id);
    return $this->db->get()->result();
  }

  function getTglPinjam($id)
  {
    $this->db->select('tglPinjam');
    $this->db->from('transaksi');
    $this->db->where('idTransaksi', $id);
    return $this->db->get()->result();
  }

  function transaksiPinjam($data)
  {
    $this->db->insert('transaksi', $data);
  }

  function transaksiKembali($id, $data)
  {
    $this->db->where('idTransaksi', $id);
    $this->db->update('transaksi', $data);
  }
}
