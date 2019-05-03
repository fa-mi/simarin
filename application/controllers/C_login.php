<?php

/**
 *
 */
class C_login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->model('m_siswa');
    $this->load->model('m_admin');
    $this->load->model('m_tanggal');
    $this->load->model('m_prakerin');

  }

  function index(){

          $this->load->view('v_login');
  }
  function v_login_admin(){

          $this->load->view('v_login_admin');
  }

  function login(){
  $nis= $this->input->post('nis');
  $password = $this->input->post('password');
  $this->form_validation->set_rules('nis','Nis','trim|required');
  $this->form_validation->set_rules('password','Password','trim|required');

  if($this->form_validation->run() != false){
    $where = array(
      'nis' => $nis,
      'password' => md5($password)
    );
    $data = $this->m_siswa->edit_data('siswa',$where);
    $d = $this->m_siswa->edit_data('siswa',$where)->row();
    $t = $this->m_tanggal->waktu_server()->row();
    $cek = $data->num_rows();
    $p = $this->m_siswa->edit_data('prakerin',array('nis'=>$where['nis']))->num_rows();
    $datax = $this->m_prakerin->edit_data('prakerin',array('nis'=>$where['nis']));
    $dx = $this->m_prakerin->edit_data('prakerin',array('nis'=>$where['nis']))->row();
    $tanggal = $this->m_tanggal->edit_data('tanggal',array('nis'=>$where['nis']))->row();
    $ceks = $datax->num_rows();

    $progres = array('progres' => $ceks);
   if($cek > 0){
      $session = array(
        'nis'=> $d->nis,
        'tahun_ajaran' => $d->tahun_ajaran,
        'kelamin' => $d->kelamin,
        'alamat' => $d->alamat,
        'nama_depan'=> $d->nama_depan,
        'nama_belakang'=> $d->nama_belakang,
        'id_jurusan'=> $d->id_jurusan,
        'waktu' => $t->waktu,
        'status' => 'login'
      );
      if ($p > 0) {
          $validasi = array('validasi' => $dx->is_validasi);
          $this->session->set_userdata($validasi);
      }

      $aktif = array('aktif' => $dx->is_aktif );
      $this->session->set_userdata($progres);
      $this->session->set_userdata($session);
      $this->session->set_userdata($aktif);
      redirect(base_url().'C_siswa');
    }else{
      redirect(base_url().'C_login?pesan=gagal');
    }

}  else{
    $this->load->view('v_login');
  }
}

function login_admin(){
$username= $this->input->post('username');
$password = $this->input->post('password');
$this->form_validation->set_rules('username','Username','trim|required');
$this->form_validation->set_rules('password','Password','trim|required');

if($this->form_validation->run() != false){
  $where = array(
    'username' => $username,
    'password' => md5($password)
  );
  $data = $this->m_admin->edit_data('admin',$where);
  $d = $this->m_admin->edit_data('admin',$where)->row();
  $cek = $data->num_rows();
  if($cek > 0){
    $session = array(
      'id_admin'=> $d->id_admin,
      'status' => 'login',
    );
    $this->session->set_userdata($session);
    redirect(base_url().'C_admin');
}
else{
  redirect(base_url().'C_login/v_login_admin?pesan=gagal');
}

}  else{
  $this->load->view('admin/v_login_admin');
}

}

}
 ?>
