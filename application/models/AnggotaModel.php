<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class AnggotaModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getAnggota()
  {
    return $this->db->get('anggota')->result();
  }

  function getAnggotaById($id)
  {
    $this->db->where('idAnggota', $id);
    return $this->db->get('anggota')->result();
  }

  function addAnggota($data)
  {
    $this->db->insert('anggota', $data);
  }

  function editAnggota($id, $data)
  {
    $this->db->where('idAnggota', $id);
    $this->db->update('anggota', $data);
  }

  function deleteAnggota($id)
  {
    $this->db->where('idAnggota', $id);
    $this->db->delete('anggota');
  }
}
