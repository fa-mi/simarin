<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Simarin<small>Profile</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/dashboard/images/siswa.png" alt="Avatar" title="Change the avatar">
                </div>
              </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="profile_title">
                <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left input_mask">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('nama_depan'); ?>">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('nama_belakang'); ?>">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('nis'); ?>">
                      <span class="fa fa-dot-circle-o form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('tahun_ajaran'); ?>">
                      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('jurusan'); ?>">
                      <span class="fa fa-briefcase form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('alamat'); ?>">
                      <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                    </div>


                    <?php if ($this->session->userdata('kelamin') == 0){
                      echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="Perempuan">
                        <span class="fa fa-female form-control-feedback left" aria-hidden="true"></span>
                      </div>';
                    }
                    else {
                      echo '<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="Laki-Laki">
                        <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                      </div>';
                    }
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" readonly="readonly" placeholder="<?php echo $this->session->userdata('nama_guru'); ?>">
                      <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="ln_solid"></div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
