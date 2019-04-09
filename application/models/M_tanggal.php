<?php
/**
 *
 */
class M_tanggal extends CI_Model
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
  function set_tgl_deadline($data)
  {
    $nis = "'".$data['nis']."'";
    $tgl_deadline = "'".$data['tanggal_deadline']."'";
    $query = $this->db->query("call set_tgl_deadline($tgl_deadline,$nis)");
  }
  function set_tgl_selesai($data)
  {
    $nis = "'".$data['nis']."'";
    $tanggal_selesai = "'".$data['tanggal_selesai']."'";
    $query = $this->db->query("call set_tgl_selesai($tanggal_selesai,$nis)");
  }
}




 ?>
