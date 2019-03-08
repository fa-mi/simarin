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
    $data['data']=$this->m_simarin->data_industri_jurusan($this->session->userdata('id_jurusan'));
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_pendaftaran_siswa',$data);
    $this->load->view('siswa/footer');
  }
  function status()
  {

    $this->load->view('siswa/header');
    $this->load->view('siswa/v_status_siswa');
    $this->load->view('siswa/footer');
  }
  function pendaftaran()
  {
    $data = array('nis' => $this->session->userdata('nis'));
    $gurux = array('id_jurusan' => $this->session->userdata('id_jurusan'));
    $datax = $this->m_simarin->edit_data('prakerin',$data);
    $dx = $this->m_simarin->edit_data('prakerin',$data)->row();
    $ceks = $datax->num_rows();
    $wali = $this->m_simarin->get_data('wali')->row();
    $guru = $this->m_simarin->edit_data('guru',$gurux)->row();
    $id_industri = $this->input->post('pilihan');
    $keterangan =  $this->input->post('keterangan');
    $nama_wali = $this->input->post('nama_wali');
    $status_wali = $this->input->post('status_wali');
    $keterangan_wali =  $this->input->post('keterangan_wali');
    $telp_wali = $this->input->post('telp_wali');
    $pilihan_wali = $this->input->post('pilihan_wali');
    //print_r($wali);
    if ($id_industri == "lain") {
      $id_industri = null;
    }else {
      $id_industri = $id_industri;
    }
    if ($status_wali == "lain_wali") {
      $status_wali = $keterangan_wali;
    }
     if ($ceks > 0) {
      redirect(base_url().'c_siswa/v_pendaftaran?pesan=sudah');
    }
    else {
      if ($wali->no_telp == $telp_wali) {
        redirect(base_url().'c_siswa/v_pendaftaran?pesan=telp');
      }

      if ($id_industri == "menu" || $pilihan_wali == "menu_wali" ) {
        redirect(base_url().'c_siswa/v_pendaftaran?pesan=salahpilih');
        if ($keterangan == null || $nama_wali == null || $keterangan_wali == null || $telp_wali == null) {
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=null');
        }
        else {
          $this->m_simarin->tambah_data_prakerin($this->session->userdata('nis'),
          $guru->nip,$this->session->userdata('id_jurusan'),$keterangan,$nama_wali,$telp_wali,$status_wali,$id_industri
          );
            $this->session->unset_userdata('progres');
            $progres = array('progres' => $ceks+1);
            $this->session->set_userdata($progres);
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=berhasil');
        }
      }

      else {
        if ($nama_wali == null || $telp_wali == null) {
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=null');
        }
        else {
          $this->m_simarin->tambah_data_prakerin($this->session->userdata('nis'),
          $guru->nip,$this->session->userdata('id_jurusan'),$keterangan,$nama_wali,$telp_wali,$status_wali,$id_industri
          );
            $this->session->unset_userdata('progres');
            $progres = array('progres' => $ceks+1);
            $this->session->set_userdata($progres);
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=berhasil');
        }
      }
    }
  }
  function v_profile()
  {

    $this->load->view('siswa/header');
    $this->load->view('siswa/v_profile_siswa');
    $this->load->view('siswa/footer');
  }
  function v_ubah_password()
  {
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_ubah_password_siswa');
    $this->load->view('siswa/footer');
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
        $this->m_simarin->ubah_password_siswa($where['nis'],$where['password']);
        $this->session->sess_destroy();
        redirect(base_url().'c_login?pesan=login');

    }else{
      redirect(base_url().'c_siswa/v_ubah_password?pesan=gagal');
    }
  }

}
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'c_login?pesan=logout');
  }
}
 ?>
