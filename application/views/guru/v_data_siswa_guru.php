<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tabel Siswa</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama Lengkap</th>
                  <th>Industri</th>
                  <th>Status</th>
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
                      <td>";
                    if ($siswa['industri'] == null) {
                    echo "  <span class='span-nama caption' data-id='$siswa[nis]'>Lainnya</span>";
                    }
                    else {
                      echo "  <span class='span-nama caption' data-id='$siswa[nis]'>$siswa[industri]</span>";
                    }
                      echo "
                      </td>
                      <td>";
                      if ($siswa['validasi'] == 0) {
                        echo "<button type='button' class='btn btn-danger btn-sm' data-id='$siswa[nis]'>Belum Validasi</button>";
                      }
                      else if ($siswa['aktif'] == 0 && $siswa['validasi'] == 1) {
                        echo "<button type='button' class='btn btn-info btn-sm' data-id='$siswa[nis]'>Sudah Validasi</button>";
                      }
                      else {
                      echo "<button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Aktif Prakerin</button>";
                      }
                      echo "
                      </td>
                      <td>
                      <button class='btn btn-xs btn-default' data-id='$siswa[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                      ";
                      if ($siswa['validasi'] == 0) {
                        echo "<button class='btn btn-xs btn-warning validasi' data-id='$siswa[nis]'><i class='glyphicon glyphicon-ok-sign'></i> Validasi</button>";
                      }
                      else {
                        echo "<button class='btn btn-xs btn-warning' data-id='$siswa[nis]'><i class='glyphicon glyphicon-ok-sign'></i> Validasi</button>";
                      }
                      echo "
                      <button class='btn btn-xs btn-danger batal' data-id='$siswa[nis]'><i class='glyphicon glyphicon-remove-sign'></i> Batalkan</button>
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
