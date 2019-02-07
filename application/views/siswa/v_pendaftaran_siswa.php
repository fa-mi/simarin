<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pendaftaran PRAKERIN</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="<?php echo base_url('c_siswa/pendaftaran'); ?>" method="post" novalidate name="form" >
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" readonly="readonly" placeholder="<?php echo $this->session->userdata('jurusan') ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Industri :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="pilihan" onchange="enabledisabletext()">
                    <option value="menu">Silahkan Pilih Industri</option>
                    <?php
                    foreach ($data as $industri) {
                    	echo "
                      <option value = '$industri[id_industri]'>$industri[industri]</option>
                      ";
                    }
                     ?>
                     <option value="lain">Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan : </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Industri Lainnya" name="keterangan" disabled="disable">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3 ">

                  <?php
              if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "sudah"){
                  echo "<div class='alert alert-danger'>Anda Sudah Mendaftar !</div>";
                }elseif ($_GET['pesan'] == "berhasil") {
                  echo "<div class='alert alert-success'>Silahkan Cetak Form pada Menu Status !</div>";
                }elseif ($_GET['pesan'] == "salahpilih") {
                  echo "<div class='alert alert-info'>Silahkan Pilih Kembali !</div>";
                }

              }
          ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>