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
  function c_login_jurusan($p)
  {
    return $this->db->query("SELECT jurusan from jurusan where id_jurusan = $p");
  }
  function get_notif_id($id)
  {
    $id = "'".$id."'";
    return $this->db->query("SELECT COUNT(siswa.nis) as notif
    FROM siswa
    INNER JOIN prakerin
    ON siswa.nis = prakerin.nis  where siswa.is_validasi = 0 AND prakerin.nip = $id ");
  }
  function insert_data($data,$table)
  {
    $this->db->insert($table,$data);
  }
  function update_data($where,$table,$data)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  function ubah_password_admin($id,$password)
  {
    $id = "'".$id."'";
    $password = "'".$password."'";
    $query = $this->db->query("call ubah_password_admin($id,$password)");
  }
  function ubah_password_siswa($nis,$password)
  {
    $nis = "'".$nis."'";
    $password = "'".$password."'";
    $query = $this->db->query("call ubah_password_siswa($nis,$password)");
  }
  function delete_data($table,$where)
  {
    $this->db->where($where);
    $this->delete($table);
  }
  public function data_dashboard_admin(){

    $query1 = $this->db->query("SELECT COUNT(industri.id_industri) AS jumlah_industri FROM industri");
    $query2 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_konfirmasi FROM siswa where siswa.is_validasi = 1");
    $query3 = $this->db->query("SELECT COUNT(siswa.nis) AS jumlah_siswa_belum_konfirmasi FROM siswa where siswa.is_validasi = 0");

    $result1 = $query1->row_array();
    $result2 = $query2->row_array();
    $result3 = $query3->row_array();
    return array_merge($result1, $result2, $result3);
  }
  public function data_industri_jurusan(){

    $query = $this->db->query("call data_industri_jurusan()");
    return $query->result_array();
  }
  public function list_semua_industri(){

    $query = $this->db->query("call list_semua_industri()");
    return $query->result_array();
  }
  public function list_industri_jurusan($jurusan){

    $query = $this->db->query("call list_industri_jurusan($jurusan)");
    return $query->result_array();
  }
  public function tambah_industri($data){
    $industri = "'".$data['industri']."'";
    $query = $this->db->query("call tambah_industri($data[id_jurusan],$industri,$data[jumlah])");
  }
  public function tambah_data_prakerin_not_null($nis,$nip,$id_jurusan,$id_industri){
    $nis = "'".$nis."'";
    $nip = "'".$nip."'";
    $id_jurusan = "'".$id_jurusan."'";
    $id_industri = "'".$id_industri."'";
    $query = $this->db->query("call tambah_data_prakerin_not_null($nis,$nip,$id_industri,$id_jurusan)");
  }
  public function tambah_data_prakerin_null($nis,$nip,$id_jurusan,$keterangan){
    $nis = "'".$nis."'";
    $nip = "'".$nip."'";
    $id_jurusan = "'".$id_jurusan."'";
    $keterangan = "'".$keterangan."'";
    $query = $this->db->query("call tambah_data_prakerin_null($nis,$nip,$id_jurusan,$keterangan)");
  }
  public function konfirmasi($id){

    $query = $this->db->query("call konfirmasi($id)");
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

  public function list_siswa_sudah_konfirmasi(){

    $query = $this->db->query("call list_siswa_sudah_konfirmasi()");
    return $query->result_array();
  }
  public function list_siswa_belum_konfirmasi(){

    $query = $this->db->query("call list_siswa_belum_konfirmasi()");
    return $query->result_array();
  }

  public function list_jurusan(){

    $query = $this->db->query("call list_jurusan()");
    return $query->result_array();
  }


}




 ?>
