<?php
/**
 *
 */
class M_admin extends CI_Model
{

  function edit_data($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function ubah_password_admin($id,$password)
  {
    $id = "'".$id."'";
    $password = "'".$password."'";
    $query = $this->db->query("call ubah_password_admin($id,$password)");
  }
  public function data_dashboard_admin(){

    $query1 = $this->db->query("SELECT COUNT(DISTINCT(industri.industri)) AS jumlah_industri FROM industri");
    $query2 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa FROM siswa");
    $query3 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_daftar_prakerin FROM siswa INNER JOIN prakerin on prakerin.nis = siswa.nis");
    $query4 = $this->db->query("SELECT COUNT(bc_siswa.nis) AS jumlah_siswa_prakerin FROM bc_siswa INNER JOIN prakerin on prakerin.nis = bc_siswa.nis where prakerin.is_aktif = 1");
    $result1 = $query1->row_array();
    $result2 = $query2->row_array();
    $result3 = $query3->row_array();
    $result4 = $query4->row_array();
    return array_merge($result1, $result2, $result3, $result4);
  }

}
 ?>
