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

                 echo "<tr data-id='$data[id_industri]'>
                     <td><span class='span-nama caption' data-id='$data[id_industri]'>$data[id_industri]</span> </td>
                     <td><span class='span-nama caption' data-id='$data[id_industri]'>$data[jurusan]</span> </td>
                     <td><span class='span-email caption' data-id='$data[id_industri]'>$data[industri]</span></td>
                     <td><span class='span-email caption' data-id='$data[id_industri]'>$data[siswa_mendaftar]</span></td>
                     <td>
                     <button class='btn btn-xs btn-default' data-id='$data[id_industri]' data-toggle='modal' data-target='.modal-info-$data[id_industri]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                     <button class='btn btn-xs btn-warning' data-id='$data[id_industri]' data-toggle='modal' data-target='.modal-update-$data[id_industri]'><i class='glyphicon glyphicon-edit'></i> Edit</button>
                      ";
                      if ($data['siswa_mendaftar'] == 0) {
                        echo "<button class='btn btn-xs btn-danger hapus-industri' data-id='$data[id_industri]'><i class='glyphicon glyphicon-trash'></i> Hapus</button>";
                      }
                      echo "
                     </td>
                     <div class='modal fade modal-info-$data[id_industri]' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Info Industri</h4>
                           </div>
                           <div class='modal-body'>
                           <p>Keterangan Industri : $data[industri]<p>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class='modal fade modal-update-$data[id_industri]' tabindex='-1' role='dialog' aria-hidden='true'>
                       <div class='modal-dialog modal-sm'>
                       <form method='post' action='ubah_data_industri'>
                         <div class='modal-content'>
                           <div class='modal-header'>
                             <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                             </button>
                             <h4 class='modal-title' id='myModalLabel2'>Update Data Industri</h4>
                           </div>
                           <div class='modal-body'>
                           <label>Id Industri</label>
                           <input type='text' name='id' id='id' class='form-control' value=$data[id_industri] readonly>
                           <label>Industri</label>
                           <input type='text' name='industri' id='industri' class='form-control' value=$data[industri]>
                           </div>
                           <div class='modal-footer'>
                                <input type='hidden' name='user_id' id='user_id' />
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                <input type='submit' name='action' id='action' class='btn btn-success' value='Update' />
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
