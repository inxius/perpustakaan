<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class LokasiModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getLokasi()
  {
    return $this->db->get('lokasi')->result();
  }

  function getLokasiById($id)
  {
    $this->db->where('idLokasi', $id);
    return $this->db->get('lokasi')->result();
  }

  function addLokasi($data)
  {
    $this->db->set('idLokasi', 'UUID()', FALSE);
    $this->db->insert('lokasi', $data);
  }

  function editLokasi($id, $data)
  {
    $this->db->where('idLokasi', $id);
    $this->db->update('lokasi', $data);
  }

  function deleteLokasi($id)
  {
    $this->db->where('idLokasi', $id);
    $this->db->delete('lokasi');
  }
}
