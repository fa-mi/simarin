<?php
/**
 *
 */
class M_wali extends CI_Model
{

  function edit_data($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function delete_data($table,$where)
  {
    $this->db->where($where);
    $this->delete($table);
  }
}




 ?>
