<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Status</h3>
      </div>
    </div>

    <div class="clearfix"></div>


    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-center"></i> Detail<small>Progres</small></h2>
          <div class="clearfix"></div>
          <button class='btn btn-sm btn-dark'><i class='glyphicon glyphicon-print'></i> Print</button>
        </div>
        <div class="x_content">
          <div class="bs-example" data-example-id="simple-jumbotron">
            <div class="jumbotron">
              <?php if ($this->session->userdata('progres') == 0){
                    echo '<h1>Belum Mendaftar!</h1>
                    <p>Anda belum mendaftar prakerin.</p>';
                    }
                    elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 0) {
                    echo '<h1>Sudah Mendaftar!</h1>
                    <p>Cetak print hasil form pendaftaran untuk ditandangani oleh guru pembimbing/kelas.</p>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1) {
                    echo '<h1>Validasi Guru pembimbing/kelas!</h1>
                    <p>Konsultasi kepada guru pembimbing/kelas terkait masalah industri tempat PRAKERIN.</p>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 0) {
                            echo '<h1>Pendataan Admin!</h1>
                            <p>Serahkan bukti form pendaftaran beserta tanda tangan guru pembimbing/kelas ke ruang Tata Usaha.</p>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 1) {
                            echo '<h1>Aktif Prakerin!</h1>
                            <p>Pelaksanaan PRAKERIN di industri yang dipilih.</p>';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Progres<small>Siswa</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-md-12">
              <?php if ($this->session->userdata('progres') == 0){
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" data-transitiongoal="0" role="progressbar">0%</div>
                          </div>';
                    }
                    elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 0) {
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" data-transitiongoal="25" role="progressbar">25%</div>
                          </div>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1) {
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" data-transitiongoal="50" role="progressbar">50%</div>
                          </div>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 0) {
                            echo '<div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-success" data-transitiongoal="75" role="progressbar">75%</div>
                                  </div>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 1) {
                            echo '<div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-success" data-transitiongoal="100" role="progressbar">100%</div>
                                  </div>';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>