<?php
/**
 *
 */
class M_industri extends CI_Model
{

  function edit_data($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  public function telp_industri(){
    $query = $this->db->query("SELECT no_telp FROM industri");
    return $query->result();
  }
  function ubah_data_industri($data)
  {
    $industri = "'".$data['industri']."'";
    $id_industri = $data['id_industri'];
    $alamat = "'".$data['alamat']."'";
    $telp = "'".$data['telp']."'";
    $query = $this->db->query("call ubah_data_industri($id_industri,$industri,$alamat,$telp)");
  }
  public function data_industri_jurusan($id){

    $query = $this->db->query("call data_industri_jurusan($id)");
    return $query->result_array();
  }
  public function tambah_industri($data){
    $industri = "'".$data['industri']."'";
    $alamat = "'".$data['alamat']."'";
    $no_telp = "'".$data['no_telp']."'";
    $query = $this->db->query("call tambah_industri($data[id_jurusan],$industri,$alamat,$no_telp)");
  }
  public function hapus_industri($id){
    $query = $this->db->query("call hapus_industri($id)");
    return $query->result_array();
  }
  public function list_industri(){

    $query = $this->db->query("call data_industri()");
    return $query->result_array();
  }

}




 ?>
