<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tambah Siswa</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <form class="form-horizontal form-label-left" action="<?php echo base_url('c_admin/tambah_siswa'); ?>" method="post" novalidate >
              <div class="form-group">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="optional form-control col-md-7 col-xs-12" name="nis" id="nis">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_depan">Nama Depan <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nama_depan" id="nama_depan" class="optional form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_belakang">Nama Belakang <span class="required"></span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nama_belakang" id="nama_belakang" class="optional form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Jurusan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="id_jurusan">
                    <option>Silahkan Pilih</option>
                    <?php
                    foreach ($data as $jurusan) {
                    	echo "
                      <option value = '$jurusan[id_jurusan]'>$jurusan[jurusan]</option>
                      ";
                    }
                     ?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="siswa">Tempat Lahir <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="optional form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="siswa">Tanggal Lahir <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="optional form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="jenis_kelamin" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-danger" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="jenis_kelamin" value="1"> &nbsp; Pria &nbsp;
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                      <input type="radio" name="jenis_kelamin" value="0"> Wanita
                    </label>
                  </div>
                </div>
              </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">Agama<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="agama" name="agama" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">Alamat<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">Tahun Ajaran<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="tahun_ajaran" name="tahun_ajaran" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <?php
              if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-danger'>NIS siswa sudah ada !</div>";
              }else if($_GET['pesan'] == "ok"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-success'>Data Berhasil Diinputkan !</div>";
              }
              }
              ?>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="button" class="btn btn-default"><a href="<?php echo site_url(); ?>c_admin/data_siswa">Kembali</a></button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
