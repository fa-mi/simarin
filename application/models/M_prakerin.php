<?php
/**
 *
 */
class M_prakerin extends CI_Model
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
  public function aktifasi_siswa($id){
    $query = $this->db->query("call aktifasi_siswa($id)");
    return $query->result_array();
  }
  public function data_siswa_prakerin_admin()
  {
    $query = $this->db->query("call data_siswa_prakerin()");
    return $query->result_array();
  }
  public function batal_siswa($id){

    $query = $this->db->query("call batal_siswa($id)");
    return $query->result_array();
  }
  public function tambah_data_prakerin($data)
  {
    $nis = "'".$data['nis']."'";
    $id_jurusan = $data['id_jurusan'];
    $keterangan = "'".$data['keterangan']."'";
    $nama_wali = "'".$data['nama_wali']."'";
    $telp_wali = "'".$data['telp_wali']."'";
    $status_wali = "'".$data['status_wali']."'";
    $id_industri = $data['id_industri'];

    if ($data['id_industri'] == null) {
      $query = $this->db->query("call tambah_data_prakerin_null($nis,$id_jurusan,$keterangan,$nama_wali,$telp_wali,$status_wali)");
    }
    else {

      $query = $this->db->query("call tambah_data_prakerin($nis,$id_jurusan,'Industri MOU',$nama_wali,$telp_wali,$status_wali,$id_industri)");
    }
  }
}




 ?>
