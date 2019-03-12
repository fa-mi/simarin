<?php

/**
 *
 */
class C_admin extends CI_Controller
{
  function __construct(){
		parent::__construct();
    $this->load->model('m_simarin');

		if($this->session->userdata('status') != "login"){
			redirect(base_url().'c_login/v_login_admin?pesan=belumlogin');
		}
	}

  function index(){

          $data['data']= $this->m_simarin->data_dashboard_admin();
          $this->load->view('admin/header');
          $this->load->view('admin/v_dashboard_admin',$data);
          $this->load->view('admin/footer');

  }
  function data_chart(){
    $this->load->view('admin/header');
    $this->load->view('admin/v_chart_data');
    $this->load->view('admin/footer');
  }
  function tabel_industri()
  {
    $data['data']=$this->m_simarin->list_industri();
    //$x['data'] = json_encode($data);
    //print_r($x['data']);
	  $this->load->view('admin/header');
		$this->load->view('admin/v_tabel_industri_admin',$data);
		$this->load->view('admin/footer');
  }

  function detail_industri($industri)
  {
    $this->load->view('admin/header');
    $this->load->view('admin/v_detail_industri_admin');
    $this->load->view('admin/footer');
  }
  function data_siswa()
  {
    $data['data']= $this->m_simarin->data_siswa_admin();
    $this->load->view('admin/header');
    $this->load->view('admin/v_data_siswa_admin',$data);
    $this->load->view('admin/footer');
  }
  function konfirmasi()
  {
    $id= $this->input->post("id");
    $this->m_simarin->konfirmasi($id);
    echo "{}";
  }
  function update()
  {
    $id= $this->input->post("id");
    print_r($id);
    //$this->m_simarin->konfirmasi($id);
    //echo "{}";
  }
  function delete(){
    $id= $this->input->post("id");
    $this->m_simarin->delete($id);
    echo "{}";
  }
  public function hapus_industri(){
		$id= $this->input->post("id");
		$this->m_simarin->hapus_industri($id);
		echo "{}";
	}
  function tambah_industri()
  {
    $id_jurusan = $this->input->post("id_jurusan");
    $industri = $this->input->post("industri");
    $jumlah = $this->input->post("jumlah");
    $where = array(
      'industri' => $industri
    );
    $d = $this->m_simarin->edit_data('industri',$where);
    $cek = $d->num_rows();
    if ($cek > 0) {
      redirect(base_url().'C_admin/v_tambah_industri?pesan=gagal');
    }
    else {
      $data = array('id_jurusan' => $id_jurusan,
              'industri' => $industri,
              'jumlah' => $jumlah);
      $this->m_simarin->tambah_industri($data);
      redirect(base_url().'C_admin/v_tambah_industri?pesan=ok');
    }

  }

  function v_tambah_industri()
  {
    $data['data']=$this->m_simarin->list_jurusan();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tambah_industri',$data);
    $this->load->view('admin/footer');
  }
  function v_tambah_siswa()
  {
    $data['data']=$this->m_simarin->list_jurusan();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tambah_siswa',$data);
    $this->load->view('admin/footer');
  }

  function v_ubah_password()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/v_ubah_password_admin');
    $this->load->view('admin/footer');
  }

  function ubah_password()
  {
    $password= $this->input->post('password');
    $password2 = $this->input->post('password2');
    $this->form_validation->set_rules('password','Password','trim|required');
    $this->form_validation->set_rules('password2','Password2','trim|required');
    if($this->form_validation->run() != false){
      $where = array(
        'id_admin' => $this->session->userdata('id_admin'),
        'password' => md5($password),
        'password2' => md5($password2)
      );
      if($where['password'] == $where['password2']){
        $this->m_simarin->ubah_password_admin($where['id_admin'],$where['password']);
        $this->session->sess_destroy();
        redirect(base_url().'c_login/v_login_admin?pesan=login');

    }else{
      redirect(base_url().'c_admin/v_ubah_password?pesan=gagal');
    }
  }

}
function logout(){
  $this->session->sess_destroy();
  redirect(base_url().'c_login/v_login_admin?pesan=logout');
}


}
 ?>
