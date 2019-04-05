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
          <button class='btn btn-md btn-default'><a href="<?php echo site_url(); ?>c_admin/export_data_prakerin"><i class='glyphicon glyphicon-share'></i> Export Data</a></button>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>Industri</th>
                  <th>Waktu Pendaftaran</th>
                  <th>Aktif</th>
                  <th>Edit</th>

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
                     <td><span class='span-email caption' data-id='$data[nis]'>$data[waktu_pendaftaran]</span></td>
                     <td>";
                     if ($data['aktif'] == 0) {
                       echo "<button type='button' class='btn btn-warning btn-sm' data-id='$data[nis]'>Belum aktif</button>";
                     }
                     else {
                       echo "<button type='button' class='btn btn-success btn-sm' data-id='$data[nis]'>aktif</button>";
                     }
                     echo "</td>
                     <td>
                     <button class='btn btn-xs btn-default' data-id='$data[nis]' data-toggle='modal' data-target='.modal-info-$data[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                     ";
                     if ($data['aktif'] == 1) {
                       echo "";
                     }
                     else {
                       echo "<button class='btn btn-xs btn-info konfirmasi' data-id='$data[nis]'><i class='glyphicon glyphicon-ok-sign'></i> Aktifasi</button>
                       <button class='btn btn-xs btn-danger batal_siswa' data-id='$data[nis]'><i class='glyphicon glyphicon-remove-sign'></i> Batalkan</button>";
                     }
                     echo "
                     </td>";
                     echo "
                     <div class='modal fade modal-info-$data[nis]' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                         <div class='modal-content'>

                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Info Siswa</h4>
                           </div>
                           <div class='modal-body'>
                             <p>Keterangan Industri : $data[keterangan]<p>
                             <p>Waktu Prakerin : $data[waktu_prakerin] </p>
                             <p> Nama Wali : $data[nama_wali]</p>
                             <p> Status Wali : $data[status]</p>
                             <p> No. Telp Wali : $data[no_telp]</p>
                           </div>
                         </div>
                       </div>
                     </div>
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
