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
                  <th>NIS</th>
                  <th>Jurusan</th>
                  <th>Nama</th>
                  <th>Kelamin</th>
                  <th>Alasan Batal</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $data):
                  $nis = $data['nis'];
                  $nama= $data['nama'];
                  $jurusan= $data['jurusan'];
                  $kelamin = $data['kelamin'];
                  $keterangan = $data['keterangan'];

?>
                 <tr data-id='<?php echo $nis; ?>'>
                     <td><span class='span-nis caption' data-id='<?php echo $nis; ?>'><?php echo $nis; ?></span> </td>
                     <td><span class='span-jurusan caption' data-id='<?php echo $nis; ?>'><?php echo $jurusan; ?></span> </td>
                     <td><span class='span-nama caption' data-id='<?php echo $nis; ?>'><?php echo $nama; ?></span></td>
                     <td><span class='span-kelamin caption' data-id='<?php echo $nis; ?>'><?php if($kelamin == 1) {
                       echo "Pria";} else { echo "Wanita"; }; ?></span></td>
                     <td><span class='span-keterangan caption' data-id='<?php echo $nis; ?>'><?php echo $keterangan; ?></span></td>

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
