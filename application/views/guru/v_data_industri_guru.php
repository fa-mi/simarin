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
            <h2>Data Industri</h2>
            <div class="clearfix"></div>

          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nama Industri</th>
                  <th>Status</th>
                  <th>Kuota</th>
                  <th>Jumlah Siswa Diterima</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($data as $industri) {
                	echo "<tr data-id='$industri[id_industri]'>
                      <td><span class='span-nama caption' data-id='$industri[id_industri]'>$industri[industri]</span> </td>
                			<td>";
                      if ($industri['status'] == 1) {
                        echo "<button type='button' class='btn btn-success btn-sm' data-id='$industri[id_industri]'>Aktif</button>";
                      }
                      else {
                        echo "<button type='button' class='btn btn-warning btn-sm' data-id='$industri[id_industri]'>Tidak Aktif</button>";
                      }
                      echo "</td>
                      <td><span class='span-nama caption' data-id='$industri[id_industri]'>$industri[jumlah_siswa]</span> </td>
                      <td><span class='span-nama caption' data-id='$industri[id_industri]'>0</span> </td>
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
