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
  function ubah_data_siswa($data)
  {
    $nis = "'".$data['nis']."'";
    $nama_depan = "'".$data['nama_depan']."'";
    $nama_belakang = "'".$data['nama_belakang']."'";
    $tempat_lahir = "'".$data['tempat_lahir']."'";
    $agama = "'".$data['agama']."'";
    $alamat = "'".$data['alamat']."'";
    $tanggal_lahir = "'".$data['tanggal_lahir']."'";
    $query = $this->db->query("call ubah_data_siswa($nis,$nama_depan,$nama_belakang,$tempat_lahir,$tanggal_lahir,$data[jenis_kelamin],$alamat,$agama,$data[tahun_ajaran])");
  }
  function delete_data($table,$where)
  {
    $this->db->where($where);
    $this->delete($table);
  }
  public function data_dashboard_admin(){

    $query1 = $this->db->query("SELECT COUNT(DISTINCT(industri.industri)) AS jumlah_industri FROM industri");
    $query2 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa FROM siswa");
    $query3 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_daftar_prakerin FROM siswa INNER JOIN prakerin on prakerin.nis = siswa.nis");
    $query4 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_aktif_prakerin FROM siswa INNER JOIN prakerin on prakerin.nis = siswa.nis where prakerin.is_aktif = 1");
    $result1 = $query1->row_array();
    $result2 = $query2->row_array();
    $result3 = $query3->row_array();
    $result4 = $query4->row_array();
    return array_merge($result1, $result2, $result3, $result4);
  }

}




 ?>
