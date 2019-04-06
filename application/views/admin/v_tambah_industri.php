<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tambah Industri</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <form class="form-horizontal form-label-left" action="<?php echo base_url('c_admin/tambah_industri'); ?>" method="post">
              <div class="form-group">

                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Jurusan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="id_jurusan">
                    <option value="0">Silahkan Pilih</option>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="industri">Nama Industri
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_industri" id="nama_industri" class="optional form-control col-md-7 col-xs-12" required
                  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                </div>
              </div>
              </div>
              <div class="ln_solid"></div>
              <?php
              if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-danger'>Nama Industri Sudah Ada !</div>";
              }else if($_GET['pesan'] == "ok"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-success'>Data Berhasil Diinputkan !</div>";
            }else if($_GET['pesan'] == "salah"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-danger'>Salah Input Jurusan !</div>";
              }
              }
              ?>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="button" class="btn btn-default"><a href="<?php echo site_url(); ?>c_admin/tabel_industri">Kembali</a></button>
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
