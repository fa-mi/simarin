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
          <!-- <div class="col-md-10 col-sm-6 col-xs-6">
          <button class='btn btn-md btn-info konfirmasi-pendaftaran-semua'><i class='glyphicon glyphicon-ok-sign'></i> Konfirmasi Pendaftaran</button>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-6">
          <button class='btn btn-md btn-success konfirmasi-penjajakan-semua'><i class='glyphicon glyphicon-ok-sign'></i> Konfirmasi Penjajakan</button>
        </div> -->
            <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama Lengkap</th>
                  <th>Industri</th>
                  <th>Konfirmasi</th>
                  <th>Aktif</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $data):
                  $nis = $data['nis'];
                  $nama= $data['nama'];
                  $jurusan= $data['jurusan'];
                  $industri= $data['industri'];
                  $validasi = $data['validasi'];
                  $aktif = $data['aktif'];
                  $no_telp = $data['no_telp'];
                  $kelamin = $data['kelamin'];
                  $keterangan = $data['keterangan'];
                  $alamat_industri = $data['alamat_industri'];
                  $nama_wali = $data['nama_wali'];
                  $status = $data['status'];
                  $tgl_pendaftaran = $data['tanggal_pendaftaran'];
                  $tgl_aktif = $data['tanggal_aktif'];
                  $tgl_selesai = $data['tanggal_selesai'];

?>
                 <tr data-id='<?php echo $nis; ?>'>
                     <td><span class='span-nama caption' data-id='<?php echo $nis; ?>'><?php echo $nis; ?></span> </td>
                     <td><span class='span-nama caption' data-id='<?php echo $nis; ?>'><?php echo $jurusan; ?></span> </td>
                     <td><span class='span-email caption' data-id='<?php echo $nis; ?>'><?php echo $nama; ?></span></td>
                     <td><span class='span-email caption' data-id='<?php echo $nis; ?>'><?php echo $industri; ?></span></td>
                     <td>
                       <?php if ($validasi == 0): ?>
                         <button type='button' class='btn btn-danger btn-sm konfirmasi-siswa' data-id='<?php echo $nis; ?>'>Belum Konfirmasi</button>
                       <?php elseif ($validasi !=0 && $aktif == null): ?>
                         <button type='button' class='btn btn-warning btn-sm penjajakan-siswa' data-id='<?php echo $nis; ?>'>Konfirmasi Penjajakan</button>
                       <?php else:  ?>
                         <button type='button' class='btn btn-success sudah-konfirmasi' data-id='<?php echo $nis; ?>'>Sudah Konfirmasi</button>
                         <?php endif; ?>
                     </td>
                     <td>
                       <?php if ($aktif != 1 && $tgl_selesai == '-'): ?>
                       <button type='button' class='btn btn-danger btn-sm belum-tanggal' data-id='<?php echo $nis; ?>'>Belum Aktif</button>
                     <?php elseif ($aktif != 1): ?>
                       <button type='button' class='btn btn-danger btn-sm aktifasi-siswa' data-id='<?php echo $nis; ?>'>Belum Aktif</button>
                     <?php else:  ?>
                       <button type='button' class='btn btn-success btn-sm' data-id='<?php echo $nis; ?>'>Sudah Aktif</button>
                       <?php endif; ?>
                     </td>
                     <td>
                       <button class='btn btn-xs btn-default' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='.modal-info-<?php echo $nis; ?>'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                       <button class='btn btn-xs btn-danger' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='.modal-batal-<?php echo $nis; ?>'><i class='glyphicon glyphicon-remove-sign'></i> Batalkan</button>
                     <?php if ($validasi !=0 && $aktif == null): ?>
                         <button class='btn btn-xs btn-warning belum-penjajakan' data-id='<?php echo $nis; ?>'><i class='glyphicon glyphicon-calendar'></i> Tanggal Selesai</button>
                       <?php elseif ($validasi == 1): ?>
                       <button class='btn btn-xs btn-warning' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='.modal-tanggal_selesai-<?php echo $nis; ?>'><i class='glyphicon glyphicon-calendar'></i> Tanggal Selesai</button>
                       <?php endif; ?>
                     </td>
                     <?php
                 if(isset($_GET['pesan'])){
                   if($_GET['pesan'] == "over"){
                     echo "<script type='text/javascript'>$(window).load(function(){
                     $('#modal-over-";?><?php echo $nis; ?><?php echo "').modal('show');
                     });</script>";
                   }else if($_GET['pesan'] == "salah"){
                     echo "<script type='text/javascript'>$(window).load(function(){
                     $('#modal-alert-";?><?php echo $nis; ?><?php echo "').modal('show');
                     });</script>";
                   }
                 }
             ?>
                     <div class='modal fade modal-info-<?php echo $nis; ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                         <div class='modal-content'>

                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title'>Info Siswa</h4>
                           </div>
                           <div class='modal-body'>
                           <p> No. Telp : <?php echo $no_telp; ?></p>
                             <p>Keterangan Industri : <?php echo $keterangan; ?><p>
                             <p>Alamat Industri : <?php echo $alamat_industri; ?><p>
                             <p> Nama Wali : <?php echo $nama_wali; ?></p>
                             <p> Status Wali : <?php echo $status; ?></p>
                             <p> Tanggal Pendaftaran : <?php echo $tgl_pendaftaran; ?></p>
                             <p> Tanggal Aktif : <?php echo $tgl_aktif; ?></p>
                             <p> Tanggal Selesai : <?php echo $tgl_selesai; ?></p>
                           </div>
                         </div>
                       </div>
                     </div>

                     <div id="modal-over-<?php echo $nis; ?>" class='modal fade' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
                       <div class='modal-dialog modal-sm'>
                         <form method='post' action='default_tanggal_selesai'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <h4 class='modal-title'>Peringatan</h4>
                           </div>
                           <div class='modal-body'>
                             <label>NIS</label>
                             <input type='text' name='nis' id='nis' class='form-control' value=<?php echo $nis; ?> readonly>
                             <br>
                           <label>Tanggal Selesai Melebihi Tanggal yang Diharuskan, Apakah Anda Yakin?</label>
                           </div>
                           <div class='modal-footer'>
                                <input type='submit' name='action' id='action' class='btn btn-default' value='Ubah' />
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Submit</button>
                           </div>
                         </div>
                        </form>
                       </div>
                     </div>

                     <div id="modal-batal-<?php echo $nis; ?>" class='modal fade modal-batal-<?php echo $nis; ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                         <form method='post' action='batal_siswa'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title'>Batal Prakerin</h4>
                           </div>
                           <div class="modal-body">
                                <label>NIS</label>
                                <input type="text" name="nis" id="tahun_ajaran" class="form-control" value=<?php echo $nis; ?> readonly>
                                <br>
                                <label>Siswa Batal Dikarenakan: </label>
                                <input type="text" name="keterangan_batal" id="nama_depan" class="form-control" onkeypress="isInputChar(event)"
                                required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                              </div>
                           <div class='modal-footer'>
                                <input type='submit' name='action' id='action' class='btn btn-danger' value='Batal' />
                           </div>
                         </div>
                        </form>
                       </div>
                     </div>

                     <div id="modal-alert-<?php echo $nis; ?>" class='modal fade' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
                       <div class='modal-dialog modal-sm'>
                         <form method='post' action='default_tanggal_selesai'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <h4 class='modal-title'>Peringatan</h4>
                           </div>
                           <div class='modal-body'>
                             <label>NIS</label>
                             <input type='text' name='nis' id='nis' class='form-control' value=<?php echo $nis; ?> readonly>
                             <br>
                           <label>Tanggal Selesai Salah Silahkan Ubah Kembali !</label>
                           </div>
                           <div class='modal-footer'>
                                <input type='submit' name='action' id='action' class='btn btn-default' value='Ubah' />
                           </div>
                         </div>
                        </form>
                       </div>
                     </div>

                     <div class='modal fade modal-tanggal_selesai-<?php echo $nis; ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                       <form method='post' action='set_tanggal_selesai'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title'>Tanggal Selesai Prakerin</h4>
                           </div>
                           <div class='modal-body'>
                           <label>NIS</label>
                           <input type='text' name='nis' id='nis' class='form-control' value=<?php echo $nis; ?> readonly>
                           <label>Tanggal Selesai Prakerin</label>
                           <input type='date' name='tanggal_selesai' id='tanggal_selesai' class='form-control' value=<?php echo $nis; ?> onkeypress='isInputChar(event)'
                           required oninvalid='this.setCustomValidity('Data Tidak Boleh Kosong !')' oninput='setCustomValidity('')'>
                           </div>
                           <div class='modal-footer'>
                                <input type='hidden' name='user_id' id='user_id' />
                                <input type='submit' name='action' id='action' class='btn btn-success' value='Submit' />
                           </div>
                         </div>
                         </form>
                       </div>
                     </div>

                     </tr>
<?php endforeach; ?>

              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
