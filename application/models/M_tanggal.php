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
  function waktu_server()
  {
    return $this->db->query("SELECT current_timestamp() as waktu");
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
  function default_tanggal_selesai($data)
  {
    $nis = "'".$data."'";
    $query = $this->db->query("UPDATE tanggal SET tanggal.tanggal_selesai = NULL WHERE tanggal.nis = $nis ");
  }
  function default_tanggal_deadline($data)
  {
    $nis = "'".$data."'";
    $query = $this->db->query("UPDATE tanggal SET tanggal.tanggal_deadline = NULL WHERE tanggal.nis = $nis ");
  }
  function tanggal_batas($nis)
  {
    $nis = "'".$nis."'";
      $query = $this->db->query("SELECT DATEDIFF(tanggal.tanggal_deadline, CURRENT_DATE) AS tanggal_batas FROM tanggal WHERE tanggal.nis = $nis");
      return $query->row_array();
  }
  function tanggal_over_selesai($nis)
  {
    $nis = "'".$nis."'";
      $query = $this->db->query("call tanggal_over_selesai($nis)");
      return $query->row_array();
  }
  function tanggal_over_deadline($nis)
  {
    $nis = "'".$nis."'";
      $query = $this->db->query("call tanggal_over_deadline($nis)");
      return $query->row_array();
  }
  function tanggal_over_lahir($nis)
  {
    $nis = "'".$nis."'";
      $query = $this->db->query("call tanggal_over_lahir($nis)");
      return $query->row_array();
  }
}




 ?>
