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
                     else if ($data['validasi'] !=0 && $data['aktif'] == null) {
                       echo "<button type='button' class='btn btn-warning btn-sm penjajakan-siswa' data-id='$data[nis]'>Belum Penjajakan</button>";
                     }else {
                       echo "<button type='button' class='btn btn-success' data-id='$data[nis]'>Sudah Konfirmasi</button>";
                     }
                     echo "</td>
                     <td>";
                     if ($data['aktif'] != 1) {
                       echo "<button type='button' class='btn btn-danger btn-sm aktifasi-siswa' data-id='$data[nis]'>Belum Aktif</button>";
                     }
                     else {
                       echo "<button type='button' class='btn btn-success btn-sm' data-id='$data[nis]'>Sudah Aktif</button>";
                     }
                     echo "
                     </td>
                     <td>
                     <button class='btn btn-xs btn-default' data-id='$data[nis]' data-toggle='modal' data-target='.modal-info-$data[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                     <button class='btn btn-xs btn-danger batal-siswa' data-id='$data[nis]'><i class='glyphicon glyphicon-remove-sign'></i> Batalkan</button>";
                     if ($data['validasi'] == 0) {
                       echo "";
                     }
                     else {
                       echo "<button class='btn btn-xs btn-info' data-id='$data[nis]' data-toggle='modal' data-target='.modal-print-$data[nis]'><i class='glyphicon glyphicon-print'></i> Print Penjakakan</button>";
                     }
                     echo "
                     <button class='btn btn-xs btn-warning' data-id='$data[nis]' data-toggle='modal' data-target='.modal-tanggal_selesai-$data[nis]'><i class='glyphicon glyphicon-calendar'></i> Set Tanggal Selesai</button>
                     </td>
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
                             <p>Alamat Industri : $data[alamat_industri]<p>
                             <p> Nama Wali : $data[nama_wali]</p>
                             <p> Status Wali : $data[status]</p>
                             <p> No. Telp Wali : $data[no_telp]</p>
                             <p> Tanggal Pendaftaran : $data[tanggal_pendaftaran]</p>
                             <p> Tanggal Aktif : $data[tanggal_aktif]</p>
                             <p> Tanggal Selesai : $data[tanggal_selesai]</p>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class='modal fade modal-print-$data[nis]' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                       <form method='post' action='print_penjajakan'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Print Penjakakan Siswa</h4>
                           </div>
                           <div class='modal-body'>
                           <label>NIS</label>
                           <input type='text' name='nis' id='nis' class='form-control' value=$data[nis] readonly>
                           </div>
                           <div class='modal-footer'>
                                <input type='hidden' name='user_id' id='user_id' />
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <input type='submit' name='action' id='action' class='btn btn-success' value='Print' />
                           </div>
                         </div>
                         </form>
                       </div>
                     </div>
                     <div class='modal fade modal-tanggal_selesai-$data[nis]' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                       <form method='post' action='tanggal_selesai'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Tanggal Selesai Prakerin</h4>
                           </div>
                           <div class='modal-body'>
                           <label>NIS</label>
                           <input type='text' name='nis' id='nis' class='form-control' value=$data[nis] readonly>
                           <label>Tanggal Selesai Prakerin</label>
                           <input type='date' name='tanggal_selesai' id='tanggal_selesai' class='form-control' value=$data[nis] onkeypress='isInputChar(event)'
                           required oninvalid='this.setCustomValidity('Data Tidak Boleh Kosong !')' oninput='setCustomValidity('')'>
                           </div>
                           <div class='modal-footer'>
                                <input type='hidden' name='user_id' id='user_id' />
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <input type='submit' name='action' id='action' class='btn btn-success' value='Submit' />
                           </div>
                         </div>
                         </form>
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
