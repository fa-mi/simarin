<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Data Siswa</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>List Data</h2>
            <div class="clearfix"></div>

          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>Industri</th>
                  <th>Validasi</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($data as $siswa) {
                	echo "<tr data-id='$siswa[nis]'>
                			<td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[nis]</span> </td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[jurusan]</span> </td>
                			<td><span class='span-email caption' data-id='$siswa[nis]'>$siswa[nama]</span></td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[industri]</span> </td>
                      <td>";
                      if ($siswa['validasi'] == 0) {
                        echo "<button type='button' class='btn btn-danger btn-sm validasi' data-id='$siswa[nis]'>Belum Validasi</button>";
                      }
                      else {
                      echo "<button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Validasi</button>";
                      }
                      echo "
                      </td>
                			<td>
                      <button class='btn btn-xs btn-info' data-id='$siswa[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                      <button class='btn btn-xs btn-danger' data-id='$siswa[nis]'><i class='glyphicon glyphicon-remove-sign'></i> Hapus</button>
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
