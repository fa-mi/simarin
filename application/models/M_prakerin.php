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
  public function aktifasi_siswa($id){
    $query = $this->db->query("call aktifasi_siswa($id)");
  }
  public function penjajakan_siswa($id){
    $query = $this->db->query("call penjajakan_siswa($id)");
  }
  public function konfirmasi_siswa($id){
    $query = $this->db->query("call konfirmasi_siswa($id)");
  }
  public function konfirmasi_semua_pendaftaran()
  {
    $query = $this->db->query("UPDATE prakerin SET prakerin.is_validasi = 1");
  }
  public function konfirmasi_semua_penjajakan()
  {
    $query = $this->db->query("UPDATE prakerin SET prakerin.is_aktif = 0 WHERE prakerin.is_validasi = 1");
  }
  public function print_penjajakan($id){
    $query = $this->db->query("call print_penjajakan($id)");
    return $query->result_array();
  }
  public function data_siswa_prakerin_admin()
  {
    $query = $this->db->query("call data_siswa_prakerin()");
    return $query->result_array();
  }
  public function data_siswa_batal_prakerin_admin()
  {
    $query = $this->db->query("call data_siswa_batal_prakerin()");
    return $query->result_array();
  }
  public function data_siswa_prakerin($id)
  {
    $query = $this->db->query("call siswa_prakerin($id)");
    return $query->result_array();
  }
  public function batal_siswa($id,$keterangan){
    $id = "'".$id."'";
    $keterangan = "'".$keterangan."'";
    $query = $this->db->query("call batal_siswa($id,$keterangan)");
  }
  public function hapus_riwayat_siswa($id)
  {
    $id = "'".$id."'";
    $query = $this->db->query("DELETE FROM batal_siswa WHERE batal_siswa.id = $id");
  }
  public function ubah_alasan_siswa($data)
  {
    $nis = "'".$data['nis']."'";
    $alasan = "'".$data['alasan']."'";
    $query = $this->db->query("UPDATE batal_siswa SET batal_siswa.keterangan = $alasan WHERE batal_siswa.nis = $nis");
  }
  public function tambah_data_prakerin($data)
  {
    $nis = "'".$data['nis']."'";
    $id_jurusan = $data['id_jurusan'];
    $keterangan = "'".$data['keterangan']."'";
    $nama_wali = "'".$data['nama_wali']."'";
    $telp = "'".$data['telp']."'";
    $status_wali = "'".$data['status_wali']."'";
    $id_industri = $data['id_industri'];
    $alamat = "'".$data['alamat']."'";

    if ($data['id_industri'] == null) {
      $query = $this->db->query("call tambah_data_prakerin($nis,$id_jurusan,$keterangan,$nama_wali,$telp,$status_wali,null,$alamat)");
    }
    else {
      $query = $this->db->query("call tambah_data_prakerin($nis,$id_jurusan,'Industri MOU',$nama_wali,$telp,$status_wali,$id_industri,'Industri MOU')");
    }
  }
}




 ?>
