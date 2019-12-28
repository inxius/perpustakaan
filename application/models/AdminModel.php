<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class AdminModel extends CI_Model
{

  function __construct()
  {
    // code...
  }

  function getWhere($where, $table)
  {
    return $this->db->get_where($table, $where);
  }
}
