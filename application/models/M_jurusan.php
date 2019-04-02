<?php
/**
 *
 */
class M_jurusan extends CI_Model
{

  function edit_data($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function waktu_server()
  {
    return $this->db->query("SELECT current_timestamp() as waktu");
  }
  function data_jurusan($id)
  {
    $query =  $this->db->query("SELECT jurusan FROM jurusan where jurusan.id_jurusan = $id");
    return $query->row();
  }
  function delete_data($table,$where)
  {
    $this->db->where($where);
    $this->delete($table);
  }
  public function list_jurusan(){

    $query = $this->db->query("call list_jurusan()");
    return $query->result_array();
  }
}




 ?>
