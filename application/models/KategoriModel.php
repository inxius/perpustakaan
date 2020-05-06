<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class KategoriModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getKategori()
  {
    return $this->db->get('kategori')->result();
  }

  function getKategoriById($id)
  {
    $this->db->where('idKategori', $id);
    return $this->db->get('kategori')->result();
  }

  function addKategori($data)
  {
    $this->db->set('idKategori', 'UUID()', FALSE);
    $this->db->insert('kategori', $data);
  }

  function editKategori($id, $data)
  {
    $this->db->where('idKategori', $id);
    $this->db->update('kategori', $data);
  }

  function deleteKategori($id)
  {
    $this->db->where('idKategori', $id);
    $this->db->delete('kategori');
  }
}
