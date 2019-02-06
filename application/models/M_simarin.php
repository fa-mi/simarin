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
  function get_notif()
  {
    return $this->db->query("SELECT COUNT(siswa.nis) as notif FROM siswa where siswa.is_validasi = 0");
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
    $query = $this->db->query("call ubah_password_admin('$id','$password')");
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
  public function list_industri(){

    $query = $this->db->query("call list_industri()");
    return $query->result_array();
  }
  public function tambah_industri($data){
    $industri = "'".$data['industri']."'";
    $query = $this->db->query("call tambah_industri($data[id_jurusan],$industri,$data[jumlah])");
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

  public function getUserInfo($id)
   {
     $q = $this->db->get_where('siswa', array('nis' => $id), 1);
     if($this->db->affected_rows() > 0){
       $row = $q->row();
       return $row;
     }else{
       error_log('no user found getUserInfo('.$nis.')');
       return false;
     }
   }

  public function getUserInfoByEmail($email){
     $q = $this->db->get_where('siswa', array('email' => $email), 1);
     if($this->db->affected_rows() > 0){
       $row = $q->row();
       return $row;
     }
   }

   public function insertToken($nis)
   {
     $token = substr(sha1(rand()), 0, 30);
     $date = date('Y-m-d');

     $string = array(
         'token'=> $token,
         'nis'=>$nis,
         'created'=>$date
       );
     $query = $this->db->insert_string('tokens',$string);
     $this->db->query($query);
     return $token . $nis;

   }
   function delete($id){
 		$this->db->where("id_industri",$id);
 		$this->db->delete("industri");
 	}

   public function isTokenValid($token)
   {
     $tkn = substr($token,0,30);
     $uid = substr($token,30);

     $q = $this->db->get_where('tokens', array(
       'tokens.token' => $tkn,
       'tokens.nis' => $nis), 1);

     if($this->db->affected_rows() > 0){
       $row = $q->row();

       $created = $row->created;
       $createdTS = strtotime($created);
       $today = date('Y-m-d');
       $todayTS = strtotime($today);

       if($createdTS != $todayTS){
         return false;
       }

       $user_info = $this->getUserInfo($row->nis);
       return $user_info;

     }else{
       return false;
     }

   }


}




 ?>
