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
          <button class='btn btn-md btn-info'><a href="<?php echo site_url(); ?>c_admin/v_tambah_siswa"><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Siswa</a></button>
          <button class='btn btn-md btn-default'><a href="<?php echo site_url(); ?>c_admin/export_data_siswa"><i class='glyphicon glyphicon-share'></i> Export Data</a></button>
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
                  $agama= $siswa['agama'];
                  $tahun_ajaran= $siswa['tahun_ajaran'];
                  $alamat = $siswa['alamat'];
                  $nama_depan = $siswa['nama_depan'];
                  $nama_belakang = $siswa['nama_belakang'];
                  $id_jurusan = $siswa['id_jurusan'];
                  $ttl = $siswa['ttl'];
                  $kelamin = $siswa['kelamin'];
                  $tgl_deadline = $siswa['tanggal_deadline'];
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
                        <i class='glyphicon glyphicon-edit'></i> Update</a></button>
                        <?php if ($tgl_deadline == 'kosong'): ?>
                          <button class='btn btn-xs btn-success' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='#modal-tgl-<?php echo $nis; ?>'>
                            <i class='glyphicon glyphicon-calendar'></i> Tanggal Deadline</button>
                            <button class='btn btn-xs btn-danger hapus-siswa' data-id='<?php echo $nis; ?>'>
                              <i class='glyphicon glyphicon-trash'></i> Hapus</button>
                             <?php else: ?>
                        <?php endif; ?>
                      </td>

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
                              <p>TTL : <?php echo $ttl; ?> </p>
                              <p>Agama : <?php echo $agama; ?> </p>
                              <p>Kelamin :
                                <?php if($kelamin == 1) {
                                  echo "Pria";
                                }
                                else {
                                  echo "Wanita";
                                } ?>
                              </p>
                              <p>Alamat : <?php echo $alamat; ?> </p>
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
                        $agama= $siswa['agama'];
                        $tahun_ajaran= $siswa['tahun_ajaran'];
                        $alamat = $siswa['alamat'];
                        $nama_depan = $siswa['nama_depan'];
                        $nama_belakang = $siswa['nama_belakang'];
                        $id_jurusan = $siswa['id_jurusan'];
                        $ttl = $siswa['ttl'];
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
                                                 <label>Agama</label>
                                                 <input type="text" name="agama" id="agama" class="form-control" value=<?php echo $agama; ?> onkeypress="isInputChar(event)"
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
                        <div id="modal-tgl-<?php echo $nis; ?>" class="modal fade">
                              <div class="modal-dialog">
                                   <form method="post" action="<?php echo base_url(); ?>c_admin/set_tgl_deadline">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Update Siswa</h4>
                                             </div>
                                             <div class="modal-body">
                                                  <label>Tanggal Deadline</label>
                                                  <input type="date" name="tanggal_deadline" id="tanggal_deadline" class="form-control"
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
