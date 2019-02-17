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
                  <input type="text" class="form-control" placeholder="Industri Lainnya" name="keterangan" disabled="disable" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Wali :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Wali :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" name="status_wali" onchange="enabledisabletextwali()">
                    <option value="menu_wali">Silahkan Pilih Status</option>
                    <option value="ayah">Ayah</option>
                    <option value="ibu">Ibu</option>
                    <option value="lain_wali">Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Wali : </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Wali Lainnya" name="keterangan_wali" disabled="disable">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telpon Wali :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="tel" pattern="[0-9]{3}-[0-9]{12}" class="form-control" name="telp_wali" placeholder="Nomor Telepon Wali" id="phone">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3 ">

                  <?php
              if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "sudah"){
                  echo "<div class='alert alert-danger'>Anda Sudah Mendaftar!</div>";
                }elseif ($_GET['pesan'] == "berhasil") {
                  echo "<div class='alert alert-success'>Silahkan Cetak Form pada Menu Status!</div>";
                }elseif ($_GET['pesan'] == "salahpilih") {
                  echo "<div class='alert alert-info'>Silahkan Pilih Kembali!</div>";
                }elseif ($_GET['pesan'] == "null") {
                  echo "<div class='alert alert-warning'>Data Tidak Boleh Kosong!</div>";
                }elseif ($_GET['pesan'] == "telp") {
                  echo "<div class='alert alert-warning'>No Telp Sudah Ada!</div>";
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
