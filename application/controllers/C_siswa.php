<?php

/**
 *
 */
class C_siswa extends CI_Controller
{
  function __construct(){
		parent::__construct();
    $this->load->model('m_simarin');

		if($this->session->userdata('status') != "login"){
			redirect(base_url().'c_login?pesan=belumlogin');
		}
	}
  function index(){

          $this->load->view('siswa/header');
          $this->load->view('siswa/v_dashboard_siswa');
          $this->load->view('siswa/footer');

  }
  function informasi()
  {
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_mekanisme_siswa');
    $this->load->view('siswa/footer');
  }
  function v_pendaftaran()
  {
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_pendaftaran_siswa');
    $this->load->view('siswa/footer');
  }
  function status()
  {
    //$this->session->
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_status_siswa');
    $this->load->view('siswa/footer');
  }
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'c_login?pesan=logout');
  }
}
 ?>
