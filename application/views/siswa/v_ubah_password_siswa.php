<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ubah Password Siswa</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">

            <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url('c_admin/ubah_password'); ?>" method="post">


              <div class="item form-group">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <?php
                if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                echo "<div class='col-md-3 col-md-offset-3 alert alert-danger'>Repeat Password Tidak Sesuai</div>";
                }else if($_GET['pesan'] == "ok"){
                echo "<div class='col-md-3 col-md-offset-3 alert alert-success'>Success !</div>";
                }
                }
                ?>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
