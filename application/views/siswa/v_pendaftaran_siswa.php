<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Simarin<small>Pendaftaran Siswa</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="<?php echo base_url('c_siswa/pendaftaran'); ?>" method="post" name="form" >
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telpon :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="tel" class="form-control" name="telp" placeholder="Nomor Telepon" id="phone" required
                  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Industri :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="industri" onchange="enabledisabletext()">
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
                  <input type="text" class="form-control" placeholder="Industri Lainnya" name="keterangan" disabled="disable" required
                  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Industri : </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Alamat Industri Lainnya" name="alamat_industri" disabled="disable" required
                  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Wali :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali" id="nama_wali" required
                  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Wali :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="status_wali" onchange="enabledisabletextwali()">
                    <option value="menu_wali">Silahkan Pilih Status</option>
                    <option value="Ayah">Ayah</option>
                    <option value="Ibu">Ibu</option>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3 ">

                  <?php
              if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "sudah"){
                  echo "<div class='alert alert-danger'>Anda Sudah Mendaftar!</div>";
                }elseif ($_GET['pesan'] == "berhasil") {
                  echo "<div class='alert alert-success'>Menunggu Pendataaan Oleh Admin!</div>";
                }elseif ($_GET['pesan'] == "salahpilihindustri") {
                  echo "<div class='alert alert-info'>Silahkan Pilih Industri!</div>";
                }elseif ($_GET['pesan'] == "salahpilihwali") {
                  echo "<div class='alert alert-info'>Silahkan Pilih Status Wali!</div>";
                }elseif ($_GET['pesan'] == "telp") {
                  echo "<div class='alert alert-warning'>No Telp Sudah Ada!</div>";
                }elseif ($_GET['pesan'] == "deadline") {
                  echo "<div class='alert alert-danger'>Anda Sudah Melewati Deadline Pendaftaran!</div>";
                }


              }
          ?>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?php echo site_url(); ?>c_siswa"><button type="button" class="btn btn-primary">Cancel</button></a>
                  <button type="submit" class="btn btn-success">Daftar</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
