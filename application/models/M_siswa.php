<?php
/**
 *
 */
class M_siswa extends CI_Model
{

  function edit_data($table,$where)
  {
    return $this->db->get_where($table,$where);
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function ubah_password_siswa($nis,$password)
  {
    $nis = "'".$nis."'";
    $password = "'".$password."'";
    $query = $this->db->query("call ubah_password_siswa($nis,$password)");
  }

  public function hapus_siswa($id){
    $query = $this->db->query("call hapus_siswa($id)");
    return $query->result_array();
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

  public function data_siswa_admin()
  {
    $query = $this->db->query("call data_siswa_admin()");
    return $query->result_array();
  }
}




 ?>