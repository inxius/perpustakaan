<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class PenerbitModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getPenerbit()
  {
    return $this->db->get('penerbit')->result();
  }

  function getPenerbitById($id)
  {
    $this->db->where('idPenerbit', $id);
    return $this->db->get('penerbit')->result();
  }

  function addPenerbit($data)
  {
    $this->db->set('idPenerbit', 'UUID()', FALSE);
    $this->db->insert('penerbit', $data);
  }

  function editPenerbit($id, $data)
  {
    $this->db->where('idPenerbit', $id);
    $this->db->update('penerbit', $data);
  }

  function deletePenerbit($id)
  {
    $this->db->where('idPenerbit', $id);
    $this->db->delete('penerbit');
  }
}
