<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Penjajakan Siswa</h2>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Administrasi</th>
                  <th>Nilai</th>
                  <th>Peminjaman Buku</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $siswa):
                  $nis = $siswa['nis'];
                  $administrasi= $siswa['administrasi'];
                  $nilai= $siswa['nilai'];
                  $peminjaman_buku= $siswa['peminjaman_buku'];
                 ?>

                  <tr data-id='<?php echo $nis; ?>'>
                  <td><span class='span-jurusan caption' data-id='<?php echo $nis; ?>'><? echo $nis; ?></span> </td>
                      <td>
                        <?php if ($administrasi == 0): ?>
                          <?php echo "<button type='button' class='btn btn-danger btn-sm administrasi-siswa' data-id='$siswa[nis]'>Belum</button> " ?>
                        <?php else: echo "<button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Sudah</button> ";?>
                        <?php endif; ?>

                      </td>
                      <td>
                        <?php if ($nilai == 0): ?>
                          <?php echo "<button type='button' class='btn btn-danger btn-sm nilai-siswa' data-id='$siswa[nis]'>Belum</button> " ?>
                        <?php else: echo "<button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Sudah</button> ";?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if ($peminjaman_buku == 0): ?>
                          <?php echo "<button type='button' class='btn btn-danger btn-sm pinjam-siswa' data-id='$siswa[nis]'>Belum</button> " ?>
                        <?php else: echo "<button type='button' class='btn btn-success btn-sm' data-id='$siswa[nis]'>Sudah</button> ";?>
                        <?php endif; ?>
                        </td>
                      <td>
                      <button class='btn btn-xs btn-default' data-id='<?php echo $nis; ?>' data-toggle='modal' data-target='.modal-info-<?php echo $nis; ?>'>
                        <i class='glyphicon glyphicon-info-sign'></i> Info</button>
                      </td>
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
