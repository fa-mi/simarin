<?php

/**
 *
 */
class C_siswa extends CI_Controller
{
  function __construct(){
		parent::__construct();
    $this->load->model('m_siswa');
    $this->load->model('m_prakerin');
    $this->load->model('m_wali');
    $this->load->model('m_industri');
    $this->load->model('m_tanggal');
    $this->load->library('pdf');

		if($this->session->userdata('status') != "login"){
			redirect(base_url().'c_login?pesan=belumlogin');
		}
	}
  function index(){

          $this->load->view('siswa/header');
          $this->load->view('siswa/v_dashboard_siswa');
          $this->load->view('siswa/footer');

  }
  function print_formulir()
  {
    $data['data']=$this->m_prakerin->data_siswa_prakerin($this->session->userdata('nis'));
    $html = $this->load->view('siswa/v_print_formulir',$data, TRUE);
    $this->pdf->loadHtml($html);
    $this->pdf->render();
    $this->pdf->stream("print".".pdf", array("Attachment"=>0));
  }
  function informasi()
  {
    $this->load->view('siswa/header');
    $this->load->view('siswa/v_mekanisme_siswa');
    $this->load->view('siswa/footer');
  }
  function v_pendaftaran()
  {
    $data['data']=$this->m_industri->data_industri_jurusan($this->session->userdata('id_jurusan'));
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
    $t = $this->m_tanggal->waktu_server()->row();
    $tanggal = $this->m_tanggal->edit_data('tanggal',array('nis'=>$this->session->userdata('nis')))->row();
    $datax = $this->m_prakerin->edit_data('prakerin',$data);
    $dx = $this->m_prakerin->edit_data('prakerin',$data)->row();
    $ceks = $datax->num_rows();

    $siswa = $this->m_siswa->get_data('siswa')->row();
    $id_industri = $this->input->post('industri');
    $keterangan =  $this->input->post('keterangan');
    $nama_wali = $this->input->post('nama_wali');
    $status_wali = $this->input->post('status_wali');
    $telp = $this->input->post('telp');
    $pilihan_wali = $this->input->post('pilihan_wali');
    $alamat = $this->input->post('alamat_industri');

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
      if ($siswa->no_telp == $telp) {
        redirect(base_url().'c_siswa/v_pendaftaran?pesan=telp');
      }
       elseif ($id_industri == "menu" ) {
        redirect(base_url().'c_siswa/v_pendaftaran?pesan=salahpilihindustri');
      }
      elseif ($status_wali == "menu_wali" ) {
       redirect(base_url().'c_siswa/v_pendaftaran?pesan=salahpilihwali');
     }
      else {
        $input = array('nis' => $data['nis'] , 'id_jurusan' => $this->session->userdata('id_jurusan'),
        'id_industri' => $id_industri, 'nama_wali' => $nama_wali, 'status_wali' => $status_wali,
        'telp' => $telp,'keterangan' => $keterangan,'alamat' => $alamat);

        if ($t->waktu >= $tanggal->tanggal_deadline) {
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=deadline');
        }
        else {
          $this->m_prakerin->tambah_data_prakerin($input);
          $this->session->unset_userdata('progres');
          $progres = array('progres' => $ceks+1);
          $this->session->set_userdata($progres);
          redirect(base_url().'c_siswa/v_pendaftaran?pesan=berhasil');
        }

      }
    }
  }
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'c_login?pesan=logout');
  }
}
 ?>
