<?php
/**
 *
 */
class M_penjajakan extends CI_Model
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
function data_penjajakan_admin()
{
  $query = $this->db->query("call data_penjajakan_admin()");
  return $query->result_array();
}
}

 ?>
