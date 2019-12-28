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

  function addPenerbit($data)
  {
    $this->db->insert('penerbit', $data);
  }

  function deletePenerbit($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('penerbit');
  }
}
