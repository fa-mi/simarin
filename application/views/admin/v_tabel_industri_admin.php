<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Industri</h2>
            <div class="clearfix">
            </div>
          </div>
          <button class='btn btn-md btn-info'><a href="<?php echo site_url(); ?>c_admin/v_tambah_industri"><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Industri</a></button>
          <button class='btn btn-md btn-default'><a href="<?php echo site_url(); ?>c_admin/pdf"><i class='glyphicon glyphicon-share'></i> Export Data</a></button>
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

                foreach ($data as $industri) {
                  echo "<tr data-id='$industri[id_industri]'>
                  <td><span class='span-jurusan caption' data-id='$industri[id_industri]'>$industri[id_industri]</span> </td>
                      <td><span class='span-jurusan caption' data-id='$industri[id_industri]'>$industri[jurusan]</span> </td>
                      <td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[industri]</span></td>
                      <td><span class='span-industri caption' data-id='$industri[id_industri]'>$industri[siswa_mendaftar]</span></td>
                      <td>
                      <button class='btn btn-xs btn-info' data-id='$industri[id_industri]' data-toggle='modal' data-target='.modal-info-$industri[id_industri]'><i class='glyphicon glyphicon-zoom-in'></i> Info </button>
                      <button class='btn btn-xs btn-warning' data-id='$industri[id_industri]' data-toggle='modal' data-target='#modal-update-$industri[id_industri]'><i class='glyphicon glyphicon-edit'></i> Edit</button>
                      ";
                      if ($industri['siswa_mendaftar'] == 0) {
                        echo "  <button class='btn btn-xs btn-danger hapus-industri' data-id='$industri[id_industri]'><i class='glyphicon glyphicon-remove'></i> Hapus</button>";
                      }
                    else {
                      echo "
                      </td>
                      </tr><div class='modal fade modal-info-$industri[id_industri]' tabindex='-1' role='dialog' aria-hidden='true'>
                        <div class='modal-dialog modal-sm'>
                          <div class='modal-content'>

                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                              </button>
                              <h4 class='modal-title' id='myModalLabel2'>Detail Industri</h4>
                            </div>
                            <div class='modal-body'>
                            </div>
                          </div>
                        </div>
                      </div>";
                      echo "<div id='modal-update-$industri[id_industri]' class='modal fade'>
                            <div class='modal-dialog'>
                                 <form method='post' action='ubah_data_industri'>
                                      <div class='modal-content'>
                                           <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                <h4 class='modal-title'>Update Industri</h4>
                                           </div>
                                           <div class='modal-body'>
                                           <label>ID Industri</label>
                                           <input type='text' name='id_industri' id='id_industri' class='form-control' value=$industri[id_industri] readonly>
                                           <label>Nama Industri</label>
                                           <input type='text' name='industri' id='industri' class='form-control' value=$industri[industri] required>
                                           </div>
                                           <div class='modal-footer'>
                                                <input type='hidden' name='user_id' id='user_id' />
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <input type='submit' name='action' id='action' class='btn btn-success' value='Update' />
                                           </div>
                                      </div>
                                 </form>
                            </div>
                       </div>";
                     }
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
