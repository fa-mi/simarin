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

                foreach ($data as $siswa) {
                  echo "<tr data-id='$siswa[nis]'>
                  <td><span class='span-jurusan caption' data-id='$siswa[nis]'>$siswa[nis]</span> </td>
                      <td><span class='span-jurusan caption' data-id='$siswa[nis]'>$siswa[jurusan]</span> </td>
                      <td><span class='span-industri caption' data-id='$siswa[nis]'>$siswa[nama]</span></td>
                      <td><span class='span-industri caption' data-id='$siswa[nis]'>$siswa[tahun_ajaran]</span></td>";
                      echo "<td>
                      <button class='btn btn-xs btn-default' data-id='$siswa[nis]' data-toggle='modal' data-target='.modal-info-$siswa[nis]'><i class='glyphicon glyphicon-info-sign'></i> Info</button>
                      ";
                      echo "<button class='btn btn-xs btn-warning update' data-id='$siswa[nis]'><i class='glyphicon glyphicon-edit'></i> Update</button>";
                      echo "
                      <button class='btn btn-xs btn-danger hapus-siswa' data-id='$siswa[nis]'><i class='glyphicon glyphicon-trash'></i> Hapus</button>
                      </td>";
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
