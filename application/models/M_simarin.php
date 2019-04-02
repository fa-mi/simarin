<?php
/**
 *
 */
class M_simarin extends CI_Model
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
    $query3 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_daftar_prakerin FROM siswa INNER JOIN prakerin on prakerin.nis = siswa.nis where prakerin.is_aktif = 0");
    $query4 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_aktif_prakerin FROM siswa INNER JOIN prakerin on prakerin.nis = siswa.nis where prakerin.is_aktif = 1");


    $result1 = $query1->row_array();
    $result2 = $query2->row_array();
    $result3 = $query3->row_array();
    $result4 = $query4->row_array();
    return array_merge($result1, $result2, $result3, $result4);
  }
  public function data_industri_jurusan($id){

    $query = $this->db->query("call data_industri_jurusan($id)");
    return $query->result_array();
  }
  public function data_siswa_admin()
  {
    $query = $this->db->query("call data_siswa_admin()");
    return $query->result_array();
  }
  public function data_siswa_prakerin_admin()
  {
    $query = $this->db->query("call data_siswa_prakerin()");
    return $query->result_array();
  }
  public function tambah_industri($data){
    $industri = "'".$data['industri']."'";
    print_r($data[jumlah]);
    //$query = $this->db->query("call tambah_industri($data[id_jurusan],$industri,$data[jumlah])");
  }
  public function tambah_siswa($data){
    $nis = "'".$data['nis']."'";
    $nama_depan = "'".$data['nama_depan']."'";
    $nama_belakang = "'".$data['nama_belakang']."'";
    $tempat_lahir = "'".$data['tempat_lahir']."'";
    $agama = "'".$data['agama']."'";
    $alamat = "'".$data['alamat']."'";
    $tanggal_lahir = "'".$data['tanggal_lahir']."'";
    $query = $this->db->query("call tambah_siswa($nis,$nama_depan,$nama_belakang,$data[id_jurusan],$tempat_lahir,$tanggal_lahir,$alamat,$agama,$data[jenis_kelamin],$data[tahun_ajaran])");
  }
  public function konfirmasi_siswa($id){
    $query = $this->db->query("call konfirmasi_siswa($id)");
    return $query->result_array();
  }
  public function hapus_data_prakerin_siswa($id){

    $query = $this->db->query("call hapus_data_prakerin_siswa($id)");
    return $query->result_array();
  }
  public function hapus_siswa($id){
    $query = $this->db->query("call hapus_siswa($id)");
    return $query->result_array();
  }
  public function batal_konfirmasi($id){

    $query = $this->db->query("call batal_konfirmasi($id)");
    return $query->result_array();
  }

  public function hapus_industri($id){
    $query = $this->db->query("call hapus_industri($id)");
    return $query->result_array();
  }

  public function list_jurusan(){

    $query = $this->db->query("call list_jurusan()");
    return $query->result_array();
  }
  public function list_industri(){

    $query = $this->db->query("call list_industri()");
    return $query->result_array();
  }
}




 ?>
