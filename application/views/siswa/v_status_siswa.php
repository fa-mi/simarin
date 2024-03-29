<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      </div>
    </div>

    <div class="clearfix"></div>


    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-bell"></i> Simarin<small>Status</small></h2>
          <div class="clearfix"></div>
          <?php if ($this->session->userdata('progres') > 0) {
            echo "<button class='btn btn-md btn-default'><a href='print_formulir_pendaftaran' target='_blank'><i class='glyphicon glyphicon-print'></i> Print Formulir Pendaftaran</a></button>
            ";
          } ?>
          <?php if ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1) {
            echo "<button class='btn btn-md btn-default'><a href='print_formulir_penjajakan' target='_blank'><i class='glyphicon glyphicon-print'></i> Print Formulir Penjajakan</a></button>
            ";
          } ?>
</div>
        <div class="x_content">
          <div class="bs-example" data-example-id="simple-jumbotron">
            <div class="jumbotron">
              <?php if ($this->session->userdata('progres') == 0){
                    echo '<h1>Belum Mendaftar!</h1>
                    <p>Anda belum mendaftar prakerin.</p>';
                    }
                    elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 0 && $this->session->userdata('aktif') == null) {
                    echo '<h1>Sudah Mendaftar!</h1>
                    <p>Menunggu pendataan oleh pihak sekolah</p>';

                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == null) {
                            echo '<h1>Sudah Validasi Pihak Sekolah!</h1>
                            <p>Melaksanakan penjajakan.</p>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 0) {
                            echo '<h1>Sudah Penjajakan!</h1>
                            <p>Mengikuti pembekalan yang diselenggarakan oleh pihak sekolah.</p>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 1) {
                            echo '<h1>Aktif Prakerin!</h1>
                            <p>Pelaksanaan PRAKERIN dengan baik dan menjaga nama baik sekolah.</p>';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-align-left"></i> Progres<small>Siswa</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <?php if ($this->session->userdata('progres') == 0){
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-success" data-transitiongoal="0" role="progressbar">0%</div>
                          </div>';
                    }
                    elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 0 && $this->session->userdata('aktif') == null) {
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-danger" data-transitiongoal="25" role="progressbar">25%</div>
                          </div>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1 && $this->session->userdata('aktif') == null) {
                    echo '<div class="progress progress-striped">
                          <div class="progress-bar progress-bar-warning" data-transitiongoal="50" role="progressbar">50%</div>
                          </div>';
                  }
                  elseif ($this->session->userdata('progres') > 0 && $this->session->userdata('validasi') == 1
                          && $this->session->userdata('aktif') == 0) {
                            echo '<div class="progress progress-striped">
                                  <div class="progress-bar progress-bar-info" data-transitiongoal="75" role="progressbar">75%</div>
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
