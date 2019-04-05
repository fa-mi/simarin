<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Siswa Prakerin</h2>
            <div class="clearfix">
            </div>
          </div>
          <button class='btn btn-md btn-danger'><a href="<?php echo site_url(); ?>c_admin/tabel_siswa_prakerin"><i class='glyphicon glyphicon-triangle-left'></i> Kembali</a></button>
          <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>Industri</th>
                  <th>Keterangan Industri</th>
                  <th>Nama Wali</th>
                  <th>Status Wali</th>
                  <th>Nomor Telepon Wali</th>
                  <th>Aktif</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $data):

                 echo "<tr data-id='$data[nis]'>
                     <td><span class='span-nama caption' data-id='$data[nis]'>$data[nis]</span> </td>
                     <td><span class='span-nama caption' data-id='$data[nis]'>$data[jurusan]</span> </td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[nama]</span></td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[industri]</span></td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[keterangan]</span></td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[nama_wali]</span></td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[status]</span></td>
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[no_telp]</span></td>
                     <td>";
                     if ($data['aktif'] == 0) {
                       echo "<span class='span-email caption' data-id='$data[nis]'>Belum Aktif</span>";
                     }
                     else {
                       echo "<span class='span-email caption' data-id='$data[nis]'>Aktif</span>";
                     }
                     echo "</td>
                     </tr>";
                     ?>
<?php endforeach;?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
