<?php

/**
 *
 */
class C_login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->model('m_simarin');


  }

  function index(){

          $this->load->view('v_login');
  }
  function v_login_admin(){

          $this->load->view('admin/v_login_admin');
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
    $data = $this->m_simarin->edit_data('siswa',$where);
    $d = $this->m_simarin->edit_data('siswa',$where)->row();
    $t = $this->m_simarin->waktu_server()->row();
    $cek = $data->num_rows();
    $datax = $this->m_simarin->edit_data('prakerin',array('nis'=>$where['nis']));
    $dx = $this->m_simarin->edit_data('prakerin',array('nis'=>$where['nis']))->row();
    $ceks = $datax->num_rows();

   if($cek > 0){
      $session = array(
        'nis'=> $d->nis,
        'nama_depan'=> $d->nama_depan,
        'nama_belakang'=> $d->nama_belakang,
        'aktif'=>$d->is_aktif,
        'validasi'=>$d->is_validasi,
        'id_jurusan'=> $d->id_jurusan,
        'waktu' => $t->waktu,
        'status' => 'login'
      );
      $p = $session['id_jurusan'];
      $j = $this->m_simarin->get_jurusan($p)->row();
      $jurusan= array('jurusan' => $j->jurusan);
      $progres = array('progres' => $ceks);
      $this->session->set_userdata($jurusan);
      $this->session->set_userdata($progres);
      $this->session->set_userdata($session);
      redirect(base_url().'C_siswa');
    }else{
      redirect(base_url().'C_login?pesan=gagal');
    }

}  else{
    $this->load->view('v_login');
  }

}
function logout(){
  $this->session->sess_destroy();
  redirect(base_url().'C_login?pesan=logout');
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
  $gurud = array('nip' => $username,
                  'password' => md5($password) );

  $data = $this->m_simarin->edit_data('admin',$where);
  $d = $this->m_simarin->edit_data('admin',$where)->row();
  $cek = $data->num_rows();
  $guru = $this->m_simarin->edit_data('guru',$gurud);
  $g = $this->m_simarin->edit_data('guru',$gurud)->row();
  $cekg = $guru->num_rows();
  if($cek > 0){
    $notif = $this->m_simarin->get_notif()->row();
    $session = array(
      'id_admin'=> $d->id_admin,
      'status' => 'login',
      'notif' => $notif->notif
    );
    $notify = $this->session->set_userdata($session('notif'));
    $this->session->set_userdata($session);
    redirect(base_url().'C_admin');
}
elseif ($cekg > 0) {

  $notifguru = $this->m_simarin->get_notif_id($g->nip)->row();
  $session = array(
    'id_jurusan'=>$g->id_jurusan,
    'nip'=> $g->nip,
    'nama'=> $g->nama,
    'kelamin'=> $g->kelamin,
    'status' => 'login'
  );
  $notifgurusession = array(
  'notif' => $notifguru->notif);
  $j = $this->m_simarin->get_jurusan($session['id_jurusan'])->row();
  $jurusan= array('jurusan' => $j->jurusan);
  $this->session->set_userdata($notifgurusession);
  $this->session->set_userdata($session);
  $this->session->set_userdata($jurusan);
  //echo $this->session->userdata('jurusan');
  redirect(base_url().'C_guru');
}
else{
  redirect(base_url().'C_login/v_login_admin?pesan=gagal');
}

}  else{
  $this->load->view('admin/v_login_admin');
}

}
function konfirmasi()
{
  $id= $this->input->post("id");
  $this->m_simarin->konfirmasi($id);
  echo "{}";
}
function forget()
{
  $this->load->view('v_forget');
}
function reset()
{
  $nis= $this->input->post('nis');
  $email = $this->input->post('email');
  $this->form_validation->set_rules('nis','Nis','trim|required');
  $this->form_validation->set_rules('email','Email','trim|required');

  if($this->form_validation->run() != false){
    $where = array(
      'nis' => $nis,
      'email' => $email
    );
    $data = $this->m_simarin->edit_data('siswa',$where);
    $d = $this->m_simarin->edit_data('siswa',$where)->row();
    $cek = $data->num_rows();

    if($cek > 0){
      $session = array(
        'nis'=> $d->nis,
        'nama'=> $d->nama,
        'status' => 'login'
      );
      $this->session->set_userdata($session);
      redirect(base_url().'C_login?pesan=email');
    }else{
      redirect(base_url().'C_login/reset?pesan=gagal');
    }
}  else{
    $this->load->view('v_forget');
  }
}

}
 ?>
