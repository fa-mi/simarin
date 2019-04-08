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
            <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>Industri</th>
                  <th>Konfirmasi</th>
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
                     <td>";
                     if ($data['validasi'] == 0) {
                       echo "<button type='button' class='btn btn-danger btn-sm konfirmasi-siswa' data-id='$data[nis]'>Belum Konfirmasi</button>";
                     }
                     else {
                       echo "<button type='button' class='btn btn-success btn-sm' data-id='$data[nis]'>Sudah Konfirmasi</button></td>";
                     }
                     if ($data['aktif'] == 0) {
                       echo "<td><button type='button' class='btn btn-danger btn-sm aktifasi-siswa' data-id='$data[nis]'>Belum Aktif</button>";
                     }
                     else {
                       echo "<button type='button' class='btn btn-success btn-sm' data-id='$data[nis]'>Sudah Aktif</button></td>";
                     }
                     echo "
                     <td>
                     <button class='btn btn-xs btn-default' data-id='$data[nis]' data-toggle='modal' data-target='.modal-info-$data[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                     <button class='btn btn-xs btn-info' data-id='$data[nis]'><i class='glyphicon glyphicon-print'></i> Print Penjakakan</button>
                     <button class='btn btn-xs btn-danger batal-siswa' data-id='$data[nis]'><i class='glyphicon glyphicon-remove-sign'></i> Batalkan</button>
                     </td> ";
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
