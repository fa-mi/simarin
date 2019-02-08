<?php

/**
 *
 */
class C_guru extends CI_Controller
{
  function __construct(){
		parent::__construct();
    $this->load->model('m_simarin');

		if($this->session->userdata('status') != "login"){
			redirect(base_url().'c_login/v_login_admin?pesan=belumlogin');
		}
	}
  function index(){

          $this->load->view('guru/header');
          $this->load->view('guru/v_dashboard_guru');
          $this->load->view('guru/footer');

  }
  function informasi()
  {
    $this->load->view('guru/header');
    $this->load->view('guru/v_mekanisme_guru');
    $this->load->view('guru/footer');
  }
  function v_pendaftaran()
  {
    $data['data']=$this->m_simarin->list_industri_jurusan($this->session->userdata('id_jurusan'));
    $this->load->view('guru/header');
    $this->load->view('guru/v_pendaftaran_guru',$data);
    $this->load->view('guru/footer');
  }
  function status()
  {

    $this->load->view('guru/header');
    $this->load->view('guru/v_status_guru');
    $this->load->view('guru/footer');
  }
  function pendaftaran()
  {
    $data = array('nis' => $this->session->userdata('nis'));
    $gurux = array('id_jurusan' => $this->session->userdata('id_jurusan'));
    $datax = $this->m_simarin->edit_data('prakerin',$data);
    $dx = $this->m_simarin->edit_data('prakerin',$data)->row();
    $ceks = $datax->num_rows();
    $guru = $this->m_simarin->edit_data('guru',$gurux)->row();
    $id_industri= $this->input->post('pilihan');
    $keterangan =  $this->input->post('keterangan');
    if ($ceks == 1) {
      redirect(base_url().'c_guru/v_pendaftaran?pesan=sudah');
    }
    else {
      if ($id_industri == "menu") {
        redirect(base_url().'c_guru/v_pendaftaran?pesan=salahpilih');
      }
      elseif ($id_industri == "lain") {
        $this->m_simarin->tambah_data_prakerin_null(
        $this->session->userdata('nis'),$guru->nip,$this->session->userdata('id_jurusan'),$keterangan);
        $this->session->unset_userdata('progres');
        $progres = array('progres' => $ceks+1);
        $this->session->set_userdata($progres);
      redirect(base_url().'c_guru/v_pendaftaran?pesan=berhasil');
      }
      else {
          $this->m_simarin->tambah_data_prakerin_not_null(
          $this->session->userdata('nis'),$guru->nip,$this->session->userdata('id_jurusan'),$id_industri);
          $this->session->unset_userdata('progres');
          $progres = array('progres' => $ceks+1);
          $this->session->set_userdata($progres);
        redirect(base_url().'c_guru/v_pendaftaran?pesan=berhasil');
      }
    }


  }
  function v_ubah_password()
  {
    $this->load->view('guru/header');
    $this->load->view('guru/v_ubah_password_guru');
    $this->load->view('guru/footer');
  }

  function ubah_password()
  {
    $password= $this->input->post('password');
    $password2 = $this->input->post('password2');
    $this->form_validation->set_rules('password','Password','trim|required');
    $this->form_validation->set_rules('password2','Password2','trim|required');
    if($this->form_validation->run() != false){
      $where = array(
        'nis' => $this->session->userdata('nis'),
        'password' => md5($password),
        'password2' => md5($password2)
      );
      if($where['password'] == $where['password2']){
        $this->m_simarin->ubah_password_guru($where['nis'],$where['password']);
        $this->session->sess_destroy();
        redirect(base_url().'c_login?pesan=login');

    }else{
      redirect(base_url().'c_guru/v_ubah_password?pesan=gagal');
    }
  }

}
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'c_login/v_login_admin?pesan=logout');
  }
}
 ?>
