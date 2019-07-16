<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Industri</h2>
            <div class="clearfix">
              <?php
              if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "telp"){
              echo "<div class='col-md-3 col-md-offset-3 alert alert-danger'>No Telp Sudah Ada!</div>";
              }
              }
              ?>
            </div>
          </div>
          <a href="<?php echo site_url(); ?>c_admin/form_tambah_industri"><button class='btn btn-md btn-info'><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Industri</button></a>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Jurusan</th>
                  <th>Industri</th>
                  <th>Jumlah Siswa Mendaftar</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
<?php
                foreach ($data as $data):
                  $id_industri = $data['id_industri'];
                  $jurusan = $data['jurusan'];
                  $industri = $data['industri'];
                  $siswa_mendaftar = $data['siswa_mendaftar'];
                  $alamat = $data['alamat'];
                  $telp = $data['no_telp'];
?>


                    <tr data-id='<?php echo $id_industri ?>'>
                     <td><span class='span-nama caption' data-id='<?php echo $id_industri; ?>'><?php echo $id_industri; ?></span> </td>
                     <td><span class='span-nama caption' data-id='<?php echo $id_industri; ?>'><?php echo $jurusan; ?></span> </td>
                     <td><span class='span-email caption' data-id='<?php echo $id_industri; ?>'><?php echo $industri; ?></span></td>
                     <td><span class='span-email caption' data-id='<?php echo $id_industri; ?>'><?php echo $siswa_mendaftar; ?></span></td>
                     <td>
                     <button class='btn btn-xs btn-default' data-id='<?php echo $id_industri; ?>' data-toggle='modal' data-target='.modal-info-<?php echo $id_industri; ?>'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                     <button class='btn btn-xs btn-warning' data-id='<?php echo $id_industri; ?>' data-toggle='modal' data-target='#modal-update-<?php echo $id_industri; ?>'><i class='glyphicon glyphicon-edit'></i> Ubah</button>
<?php
                      if ($siswa_mendaftar == 0): ?>
                        <button class='btn btn-xs btn-danger hapus-industri' data-id='<?php echo $id_industri; ?>'><i class='glyphicon glyphicon-trash'></i> Hapus</button>
                    <?php endif; ?>
                     </td>
                     <div class='modal fade modal-info-<?php echo $id_industri; ?>' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Info Industri</h4>
                           </div>
                           <div class='modal-body'>
                           <p>Alamat Industri : <?php echo $alamat; ?><p>
                           <p>No. Telp : <?php echo $telp; ?><p>
                           </div>
                         </div>
                       </div>
                     </div>

                     <div id="modal-update-<?php echo $id_industri; ?>" class="modal fade">
                           <div class="modal-dialog">
                                <form method="post" action="<?php echo base_url(); ?>c_admin/ubah_data_industri">
                                     <div class="modal-content">
                                          <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title">Update Industri</h4>
                                          </div>
                                          <div class="modal-body">
                                            <label>Id Industri</label>
                                            <input type="text" name="id" id="id" class="form-control" value=<?php echo $id_industri; ?> readonly>
                                            <label>Industri</label>
                                            <input type="text" name="industri"  class="form-control"
                                            required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat"  class="form-control"
                                            required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong !')" oninput="setCustomValidity('')">
                                               <label>No. Telp</label>
                                               <input type="text" name="telp" id="telp" class="form-control" onkeypress="isInputNumber(event)"
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
