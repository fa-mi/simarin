<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Siswa</h2>
            <div class="clearfix">
            </div>
          </div>
          <a href="<?php echo site_url(); ?>c_admin/form_tambah_siswa"><button class='btn btn-md btn-info'><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Siswa</button></a>
          <a href="<?php echo site_url(); ?>c_admin/print_data_siswa" target="_blank"><button class='btn btn-md btn-default'><i class='glyphicon glyphicon-print'></i> Cetak Data</button></a>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama Lengkap</th>
                  <th>Tahun Ajaran</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $siswa):
                  $nis = $siswa['nis'];
                  $nama= $siswa['nama'];
                  $jurusan= $siswa['jurusan'];
                  $tahun_ajaran= $siswa['tahun_ajaran'];
                  $alamat = $siswa['alamat'];
                  $tempat_lahir = $siswa['tempat_lahir'];
                  $tanggal_lahir = date("d-m-Y", strtotime($siswa['tanggal_lahir']));
                  $kelamin = $siswa['kelamin'];
                  if ($siswa['tanggal_deadline'] != 'kosong') {
                    $tgl_deadline = date("d-m-Y", strtotime($siswa['tanggal_deadline']));
                  }
                  else {
                    $tgl_deadline = "-";
                  }
                 ?>

                  <tr data-id='<?php echo $nis; ?>'>
                  <td><span class='span-jurusan caption' data-id='<?php echo $nis; ?>'><?php echo $nis; ?></span> </td>
                      <td><span class='span-jurusan caption' data-id='<?php echo $nis; ?>'><?php echo $jurusan; ?></span> </td>
                      <td><span class='span-nama caption' data-id='<?php echo $nis; ?>'><?php echo $nama; ?></span></td>
                      <td><span class='span-tahun_ajaran caption' data-id='<?php echo $nis; ?>'><?php echo $tahun_ajaran; ?></span></td>
                      <td>
                      <button class='btn btn-xs btn-default' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='.modal-info-<?php echo $nis; ?>'>
                        <i class='glyphicon glyphicon-info-sign'></i> Info</button>
                      <button class='btn btn-xs btn-warning' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='#modal-update-<?php echo $nis; ?>'>
                        <i class='glyphicon glyphicon-edit'></i> Ubah</a></button>
                        <button class='btn btn-xs btn-danger hapus-siswa' data-id='<?php echo $nis; ?>'>
                          <i class='glyphicon glyphicon-trash'></i> Hapus</button>
                          <button class='btn btn-xs btn-success' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='#modal-tgl-<?php echo $nis; ?>'>
                            <i class='glyphicon glyphicon-calendar'></i> Ubah Tanggal Deadline</button>
                        <?php if ($tgl_deadline == '-'): ?>
                          <button class='btn btn-xs btn-danger' data-id='<?php echo $nis; ?>'>
                            <i class='fa fa-exclamation-circle'></i> Tanggal Deadline Pendaftaran Kosong !</button>
                             <?php else: ?>
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
                              <h4 class='modal-title' id='myModalLabel2'>Detail Siswa</h4>
                            </div>
                            <div class='modal-body'>
                              <p>Tanggal Deadline Pendaftaran :
                                <?php if($tgl_deadline == 'kosong') {
                                  echo "-";
                                }
                                else {
                                  echo $tgl_deadline;
                                } ?>
                              </p>
                              <p>Tempat Lahir : <?php echo $tempat_lahir; ?> </p>
                              <p>tanggal Lahir : <?php echo $tanggal_lahir; ?> </p>
                              <p>Kelamin :
                                <?php if($kelamin == 1) {
                                  echo "Pria";
                                }
                                else {
                                  echo "Wanita";
                                } ?>
                              </p>
                              <p>Domisili : <?php echo $alamat; ?> </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      foreach ($data as $siswa):
                        $nis = $siswa['nis'];
                        $tempat_lahir = $siswa['tempat_lahir'];
                        $tanggal_lahir = $siswa['tanggal_lahir'];
                        $nama= $siswa['nama'];
                        $jurusan= $siswa['jurusan'];
                        $tahun_ajaran= $siswa['tahun_ajaran'];
                        $alamat = $siswa['alamat'];
                        $nama_depan = $siswa['nama_depan'];
                        $nama_belakang = $siswa['nama_belakang'];
                        $tempat_lahir = $siswa['tempat_lahir'];
                        $tanggal_lahir = $siswa['tanggal_lahir'];
                        $kelamin = $siswa['kelamin'];


                       ?>
                       <div id="modal-update-<?php echo $nis; ?>" class="modal fade">
                             <div class="modal-dialog">
                                  <form method="post" action="<?php echo base_url(); ?>c_admin/ubah_data_siswa">
                                       <div class="modal-content">
                                            <div class="modal-header">
                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 <h4 class="modal-title">Update Siswa</h4>
                                            </div>
                                            <div class="modal-body">
                                                 <label>NIS</label>
                                                 <input type="text" name="nis" id="nis" class="form-control" value=<?php echo $nis; ?> readonly>
                                                 <label>Nama Depan</label>
                                                 <input type="text" name="nama_depan" id="nama_depan" class="form-control" value=<?php echo $nama_depan; ?> onkeypress="isInputChar(event)"
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                                 <label>Nama Belakang</label>
                                                 <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value=<?php echo $nama_belakang; ?> onkeypress="isInputChar(event)"
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                                 <label>Tempat Lahir</label>
                                                 <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value=<?php echo $tempat_lahir; ?> onkeypress="isInputChar(event)"
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                                 <label>Tanggal Lahir</label>
                                                 <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value=<?php echo $tanggal_lahir; ?>
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                                 <label>Kelamin</label>
                                                 </br>
                                                 <div id="jenis_kelamin" class="btn-group" data-toggle="buttons">
                                                   <label class="btn btn-danger" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                     <input type="radio" name="jenis_kelamin" value="1" required> &nbsp; Pria &nbsp;
                                                   </label>
                                                   <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                     <input type="radio" name="jenis_kelamin" value="0"> Wanita
                                                   </label>
                                                 </div>
                                                 </br>
                                                 <label>Alamat</label>
                                                 <input type="text" name="alamat" id="alamat" class="form-control" value=<?php echo $alamat; ?>
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                                 <label>Tahun Ajaran</label>
                                                 <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value=<?php echo $tahun_ajaran; ?> onkeypress="isInputNumber(event)"
                                                 required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                            </div>
                                            <div class="modal-footer">
                                                 <input type="hidden" name="user_id" id="user_id" />
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 <input type="submit" name="action" id="action" class="btn btn-success" value="Update" />
                                            </div>
                                       </div>
                                  </form>
                             </div>
                        </div>
                        <div id="modal-over-<?php echo $nis; ?>" class='modal fade' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
                          <div class='modal-dialog modal-sm'>
                            <form method='post' action='default_tanggal_deadline'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h4 class='modal-title'>Warning</h4>
                              </div>
                              <div class='modal-body'>
                                <label>NIS</label>
                                <input type='text' name='nis' id='nis' class='form-control' value=<?php echo $nis; ?> readonly>
                                <br>
                              <label>Tanggal Deadline Melebihi Tanggal yang Diharuskan, Apakah Anda Yakin?</label>
                              </div>
                              <div class='modal-footer'>
                                   <input type='submit' name='action' id='action' class='btn btn-default' value='Ubah' />
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Submit</button>
                              </div>
                            </div>
                           </form>
                          </div>
                        </div>

                        <div id="modal-alert-<?php echo $nis; ?>" class='modal fade' tabindex='-1' role='dialog' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
                          <div class='modal-dialog modal-sm'>
                            <form method='post' action='default_tanggal_deadline'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h4 class='modal-title'>Warning</h4>
                              </div>
                              <div class='modal-body'>
                                <label>NIS</label>
                                <input type='text' name='nis' id='nis' class='form-control' value=<?php echo $nis; ?> readonly>
                                <br>
                              <label>Tanggal Deadline Salah Silahkan Ubah Kembali !</label>
                              </div>
                              <div class='modal-footer'>
                                   <input type='submit' name='action' id='action' class='btn btn-default' value='Ubah' />
                              </div>
                            </div>
                           </form>
                          </div>
                        </div>
                        <div id="modal-tgl-<?php echo $nis; ?>" class="modal fade">
                              <div class="modal-dialog">
                                   <form method="post" action="<?php echo base_url(); ?>c_admin/set_tgl_deadline">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Tanggal Deadline</h4>
                                             </div>
                                             <div class="modal-body">
                                               <label>NIS</label>
                                               <input type="text" name="nis" id="nis" class="form-control" value=<?php echo $nis; ?> readonly>
                                                  <label>Tanggal Deadline</label>
                                                  <input type="date" name="tanggal_deadline" id="tanggal_deadline" class="form-control"
                                                  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                             </div>
                                             <div class="modal-footer">
                                                  <input type="hidden" name="user_id" id="user_id" />
                                                  <input type="submit" name="action" id="action" class="btn btn-success" value="Submit" />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                       <?php endforeach;?>
                      </tr>
<?php endforeach;?>
              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
