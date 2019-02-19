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
  function guru_pembimbing($nis,$id_jurusan)
  {
    $nis = "'".$nis."'";
    $query = $this->db->query("call guru_pembimbing($nis,$id_jurusan)");
    return $query->row();
  }
  function get_notif_id($id)
  {
    $id = "'".$id."'";
    return $this->db->query("SELECT COUNT(siswa.nis) as notif
    FROM siswa
    INNER JOIN prakerin
    ON siswa.nis = prakerin.nis  where siswa.is_validasi = 0 AND prakerin.nip = $id ");
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
  public function data_dashboard_guru(){
    $id_jurusan = $this->session->userdata('id_jurusan');
    $nip = "'".$this->session->userdata('nip')."'";

    $query1 = $this->db->query("SELECT COUNT(industri.id_industri) as jumlah_industri_MOU FROM industri where industri.id_jurusan = $id_jurusan");
    $query2 = $this->db->query("SELECT COUNT(prakerin.nis) as jumlah_siswa FROM prakerin where prakerin.nip = $nip group by prakerin.nip");
    $result1 = $query1->row_array();
    $result2 = $query2->row_array();

      if ($result1 == null) {
            $result1 = array('jumlah_industri_MOU' => 0);
      }
      else if ($result2 == null) {
        $result2 = array('jumlah_siswa' => 0);
      }
    return array_merge($result1, $result2);
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
  public function data_siswa_guru($nip,$nama,$nis){
    $nip = "'".$nip."'";
    if ($nama == null) {
      $nama = "'%'";
    }
    else {
      $nama = "'".$nama."%'";
    }
    if ($nis == null) {
      $nis = "'%'";
    }
    else {
      $nis = "'".$nis."%'";
    }

    $query = $this->db->query("call data_siswa_guru($nip,$nama,$nis)");
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
  public function tambah_data_prakerin($nis,$nip,$id_jurusan,$keterangan,$nama_wali,$telp_wali,$status_wali,$id_industri){
    $nis = "'".$nis."'";
    $nip = "'".$nip."'";
    $id_jurusan = "'".$id_jurusan."'";
    $nama_wali = "'".$nama_wali."'";
    $telp_wali = "'".$telp_wali."'";
    $status_wali = "'".$status_wali."'";
    if ($keterangan != null) {
      $keterangan = "'".$keterangan."'";
    }
    else {
      $keterangan = "'"."Industri MOU"."'";
    }
    if ($id_industri != null) {
      $id_industri = $id_industri;
    }
    else {
      $id_industri = "null";
    }
    $query = $this->db->query("call tambah_data_prakerin($nis,$nip,$id_jurusan,$keterangan,$nama_wali,$telp_wali,$status_wali,$id_industri)");
  }
  public function validasi_siswa($id){

    $query = $this->db->query("call validasi_siswa($id)");
    return $query->result_array();
  }
  public function batal_siswa($id){

    $query = $this->db->query("call batal_siswa($id)");
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
