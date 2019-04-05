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
          <button class='btn btn-md btn-danger'><a href="<?php echo site_url(); ?>c_admin/tabel_siswa"><i class='glyphicon glyphicon-triangle-left'></i> Kembali</a></button>
          <div class="x_content">
          <div class="x_content">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Jurusan</th>
                  <th>Nama Lengkap</th>
                  <th>Tahun Ajaran</th>
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
                  $password = $siswa['password'];
                 ?>

                  <tr data-id='<?php echo $nis; ?>'>
                  <td><span class='span-nis caption' data-id='<?php echo $nis; ?>'><?php echo $nis; ?></span> </td>
                  <td><span class='span-nis caption' data-id='<?php echo $nis; ?>'><?php echo $nis; ?></span> </td>
                      <td><span class='span-jurusan caption' data-id='<?php echo $nis; ?>'><?php echo $jurusan; ?></span> </td>
                      <td><span class='span-nama caption' data-id='<?php echo $nis; ?>'><?php echo $nama; ?></span></td>
                      <td><span class='span-tahun_ajaran caption' data-id='<?php echo $nis; ?>'><?php echo $tahun_ajaran; ?></span></td>
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
</div>
