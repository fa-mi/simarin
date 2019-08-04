<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Siswa Batal Prakerin</h2>
            <div class="clearfix">
            </div>
          </div>
            <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama Lengkap</th>
                  <th>Alasan Batal</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $data):
                  $id = $data['id'];
                  $nis = $data['nis'];
                  $nama= $data['nama'];
                  $jurusan= $data['jurusan'];
                  $kelamin = $data['kelamin'];
                  $keterangan = $data['keterangan'];

?>
                 <tr data-id='<?php echo $nis; ?>'>
                   <td><span class='span-id caption' data-id='<?php echo $id; ?>'><?php echo $id; ?></span> </td>
                     <td><span class='span-nis caption' data-id='<?php echo $id; ?>'><?php echo $nis; ?></span> </td>
                     <td><span class='span-jurusan caption' data-id='<?php echo $id; ?>'><?php echo $jurusan; ?></span> </td>
                     <td><span class='span-nama caption' data-id='<?php echo $id; ?>'><?php echo $nama; ?></span></td>
                     <td><span class='span-keterangan caption' data-id='<?php echo $id; ?>'><?php echo $keterangan; ?></span></td>
                     <td>
                     <button class='btn btn-xs btn-warning' data-id='<?php echo $id; ?>' data-toggle='modal' data-target='#modal-ubah-<?php echo $id; ?>'>
                       <i class='glyphicon glyphicon-edit'></i> Ubah Alasan</a></button>
                       <button class='btn btn-xs btn-danger hapus-riwayat' data-id='<?php echo $id; ?>'>
                         <i class='glyphicon glyphicon-trash'></i> Hapus</button>
                       </td>
                     </tr>
                     <div id="modal-ubah-<?php echo $id; ?>" class="modal fade">
                           <div class="modal-dialog">
                                <form method="post" action="<?php echo base_url(); ?>c_admin/ubah_alasan_siswa">
                                     <div class="modal-content">
                                          <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title">Ubah Alasan Batal</h4>
                                          </div>
                                          <div class="modal-body">
                                               <label>NIS</label>
                                               <input type="text" name="nis" id="nis" class="form-control" value=<?php echo $nis; ?> readonly>
                                               <br>
                                               <label>Alasan Batal</label>
                                               <input type="text" name="alasan_batal" id="nama_depan" class="form-control" onkeypress="isInputChar(event)"
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
<?php endforeach; ?>


              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
