<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class DendaModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getDenda()
  {
    return $this->db->get('denda')->result();
  }

  function editDenda($id, $data)
  {
    $this->db->where('idDenda', $id);
    $this->db->update('denda', $data);
  }
}
