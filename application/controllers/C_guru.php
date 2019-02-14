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
          $data['data']=$this->m_simarin->data_dashboard_guru();
          $this->load->view('guru/header');
          $this->load->view('guru/v_dashboard_guru',$data);
          $this->load->view('guru/footer');

  }

  function v_ubah_password()
  {
    $this->load->view('guru/header');
    $this->load->view('guru/v_ubah_password_guru');
    $this->load->view('guru/footer');
  }

  function data_siswa()
  {
    $data['data']= $this->m_simarin->data_siswa_guru($this->session->userdata('nip'));
    $this->load->view('guru/header');
    $this->load->view('guru/v_data_siswa_guru');
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
