<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Industri</h2>
            <div class="clearfix">
            </div>
          </div>
          <button class='btn btn-md btn-danger'><a href="<?php echo site_url(); ?>c_admin/tabel_industri"><i class='glyphicon glyphicon-triangle-left'></i> Kembali</a></button>
          <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Jurusan</th>
                  <th>Industri</th>
                  <th>Status</th>
                  <th>Jumlah Siswa Diterima</th>
                  <th>Jumlah Siswa Mendaftar</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($data as $industri) {
                  echo "<tr data-id='$industri[id_industri]'>
                      <td><span class='span-jurusan caption' data-id='$industri[id_industri]'>$industri[jurusan]</span> </td>
                      <td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[industri]</span></td>
                      <td>";
                      if ($industri['siswa_mendaftar'] < $industri['jumlah_siswa']) {
                      echo "<button type='button' class='btn btn-success btn-sm' data-id='$industri[id_industri]'>Tersedia</button>";
                      }
                      else {
                      echo "<button type='button' class='btn btn-danger btn-sm' data-id='$industri[id_industri]'>Sudah Penuh</button>";
                      }
                      echo "
                      </td>
                      <td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[jumlah_siswa]</span></td>
                      <td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[siswa_mendaftar]</span></td>
                      </tr>";

                }
                 ?>
              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
