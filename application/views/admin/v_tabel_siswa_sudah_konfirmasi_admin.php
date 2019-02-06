<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tabel Data <small>siswa sudah konfirmasi</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data siswa</h2>
            <div class="clearfix"></div>

          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>email</th>
                  <th>Kelas</th>
                  <th>Industri</th>
                  <th>status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $siswa) {
                	echo "<tr data-id='$siswa[nis]'>
                			<td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[nis]</span> </td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[jurusan]</span> </td>
                			<td><span class='span-email caption' data-id='$siswa[nis]'>$siswa[nama]</span></td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[email]</span> </td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[kelas]</span> </td>
                      <td><span class='span-nama caption' data-id='$siswa[nis]'>$siswa[industri]</span> </td>
                      <td><button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Konfirmasi</button></td>
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
