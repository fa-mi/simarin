<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tabel Data <small>Industri</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Industri Berdasarkan Jurusan</h2>
            <div class="clearfix"></div>
            <button type='button' class='btn btn-info btn-sm'><a href="<?php echo site_url(); ?>c_admin/v_tambah_industri">Tambah Industri</a></button>
          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Jurusan</th>
                  <th>Industri</th>
                  <th>Status</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($data as $industri) {
                	echo "<tr data-id='$industri[id_industri]'>
                  <td><span class='span-jurusan caption' data-id='$industri[id_industri]'>$industri[id_industri]</span> </td>
                			<td><span class='span-jurusan caption' data-id='$industri[id_industri]'>$industri[jurusan]</span> </td>
                			<td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[industri]</span></td>
                      <td>";
                      if ($industri['status']==0) {
                      echo "<button type='button' class='btn btn-success btn-sm' data-id='$industri[id_industri]'>Tersedia</button>";
                      }
                      else {
                      echo "<button type='button' class='btn btn-danger btn-sm' data-id='$industri[id_industri]'>Sudah Penuh</button>";
                      }
                      echo "
                      </td>
                      <td> ";
                      echo "<button class='btn btn-xs btn-info' data-id='$industri[id_industri]'><i class='glyphicon glyphicon-zoom-in'></i>";
                      echo "<a href=";
                      echo "'<?php echo site_url(); ?>c_siswa'";
                      echo ">";
                      echo "Lihat</a></button>";
                      echo "
                      <button class='btn btn-xs btn-warning update' data-id='$industri[id_industri]'><i class='glyphicon glyphicon-edit'></i> Edit</button>
                			<button class='btn btn-xs btn-danger hapus-industri' data-id='$industri[id_industri]'><i class='glyphicon glyphicon-remove'></i> Hapus</button>
                      </td>
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
