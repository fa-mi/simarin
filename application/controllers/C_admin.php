<?php

/**
 *
 */
class C_admin extends CI_Controller
{
  function __construct(){
		parent::__construct();
    $this->load->model('m_admin');
    $this->load->model('m_industri');
    $this->load->model('m_penjajakan');
    $this->load->model('m_prakerin');
    $this->load->model('m_jurusan');
    $this->load->model('m_siswa');

		if($this->session->userdata('status') != "login"){
			redirect(base_url().'c_login/v_login_admin?pesan=belumlogin');
		}
	}

  function index(){

          $data['data']= $this->m_admin->data_dashboard_admin();
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
    $data['data']=$this->m_industri->list_industri();
	  $this->load->view('admin/header');
		$this->load->view('admin/v_tabel_industri_admin',$data);
		$this->load->view('admin/footer');
  }
  function tabel_siswa()
  {
    $data['data']= $this->m_siswa->data_siswa_admin();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tabel_siswa_admin',$data);
    $this->load->view('admin/footer');
  }
  function tabel_penjajakan_siswa()
  {
    $data['data']= $this->m_penjajakan->data_penjajakan_admin();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tabel_penjajakan_admin',$data);
    $this->load->view('admin/footer');
  }
  function tabel_siswa_prakerin()
  {
    $data['data']= $this->m_prakerin->data_siswa_prakerin_admin();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tabel_siswa_prakerin_admin',$data);
    $this->load->view('admin/footer');
  }
  function aktifasi_siswa()
  {
    $id= $this->input->post("id");
    $this->m_prakerin->aktifasi_siswa($id);
    echo "{}";
  }
  function batal_siswa()
  {
    $id= $this->input->post("id");
    $this->m_prakerin->batal_siswa($id);
    echo "{}";
  }
  function ubah_data_siswa()
  {
    $nis = $this->input->post("nis");
    $nama_depan = $this->input->post("nama_depan");
    $nama_belakang = $this->input->post("nama_belakang");
    $tempat_lahir = $this->input->post("tempat_lahir");
    $tanggal_lahir = $this->input->post("tanggal_lahir");
    $jenis_kelamin = $this->input->post("jenis_kelamin");
    $agama = $this->input->post("agama");
    $alamat = $this->input->post("alamat");
    $tahun_ajaran = $this->input->post("tahun_ajaran");
    $data = array('nis' => $nis, 'nama_depan' => $nama_depan, 'nama_belakang' => $nama_belakang,
    'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
    'alamat' => $alamat, 'tahun_ajaran' => $tahun_ajaran, 'agama' => $agama);
    $this->m_siswa->ubah_data_siswa($data);
    redirect(base_url().'C_admin/tabel_siswa');

  }
  function ubah_data_industri()
  {
    $id_industri = $this->input->post("id_industri");
    $industri = $this->input->post("industri");
    $jumlah = $this->input->post("jumlah_siswa");
    $data = array('id_industri' => $id_industri, 'industri' => $industri, 'jumlah' => $jumlah);
    $this->m_industri->ubah_data_industri($data);
    redirect(base_url().'C_admin/tabel_industri');

  }
  public function hapus_industri(){
		$id= $this->input->post("id");
		$this->m_industri->hapus_industri($id);
		echo "{}";
	}
  function tambah_industri()
  {
    $id_jurusan = $this->input->post("id_jurusan");
    $industri = $this->input->post("nama_industri");
    $jumlah = $this->input->post("jumlah");
    $where = array(
      'industri' => $industri
    );
    $d = $this->m_admin->edit_data('industri',$where);
    $cek = $d->num_rows();
    if ($id_jurusan == '0') {
    redirect(base_url().'C_admin/v_tambah_industri?pesan=salah');
    }
    if ($cek > 0) {
      redirect(base_url().'C_admin/v_tambah_industri?pesan=gagal');
    }
    else {
      $data = array('id_jurusan' => $id_jurusan,
              'industri' => $industri,
              'jumlah' => $jumlah);
      $result = $this->m_industri->tambah_industri($data);
      redirect(base_url().'C_admin/v_tambah_industri?pesan=ok');
    }
  }
  function hapus_siswa()
  {
    $id= $this->input->post("id");
    $this->m_siswa->hapus_siswa($id);
    echo "{}";
  }
  function tambah_siswa()
  {
    $nis = $this->input->post("nis");
    $id_jurusan = $this->input->post("id_jurusan");
    $nama_depan = $this->input->post("nama_depan");
    $nama_belakang = $this->input->post("nama_belakang");
    $tempat_lahir = $this->input->post("tempat_lahir");
    $tanggal_lahir = $this->input->post("tanggal_lahir");
    $jenis_kelamin = $this->input->post("jenis_kelamin");
    $agama = $this->input->post("agama");
    $alamat = $this->input->post("alamat");
    $tahun_ajaran = $this->input->post("tahun_ajaran");
    $d = $this->m_admin->edit_data('siswa',array('nis' => $nis ));
    $cek = $d->num_rows();
    if ($id_jurusan == 0) {
      redirect(base_url().'C_admin/v_tambah_siswa?pesan=salah');
    }
    if ($cek > 0) {
      redirect(base_url().'C_admin/v_tambah_siswa?pesan=gagal');
    }
    else {
      $data = array('nis' => $nis,
              'id_jurusan' => $id_jurusan, 'nama_depan' => $nama_depan, 'nama_belakang' => $nama_belakang,
              'tempat_lahir' => $tempat_lahir, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin,
              'agama' => $agama, 'alamat' => $alamat, 'tahun_ajaran' => $tahun_ajaran,
            );
            $this->m_siswa->tambah_siswa($data);
      redirect(base_url().'C_admin/v_tambah_siswa?pesan=ok');
    }
  }

  function v_tambah_industri()
  {
    $data['data']=$this->m_jurusan->list_jurusan();
    $this->load->view('admin/header');
    $this->load->view('admin/v_tambah_industri',$data);
    $this->load->view('admin/footer');
  }
  function v_tambah_siswa()
  {
    $data['data']=$this->m_jurusan->list_jurusan();
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
        $this->m_admin->ubah_password_admin($where['id_admin'],$where['password']);
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
