<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/smk.png"/>
  <style type="text/css">
    #outtable{
      padding: 25px;
      border:1px solid #e3e3e3;
      width:700px;
      border-radius: 5px;
    }

    .short{
      width: 15px;
    }

    .normal{
      width: 125px;
    }
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
    thead th{
      text-align: justify;
      padding: 5px;
    }
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 7px;
    }
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }

    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
      <table cellpadding="0" cellspacing="0" border="0">
        <td valign="top" width="90">
          <img  width="725" src="assets/images/header_print.jpeg"></td>
        </table>

        <br><br>    <div align="center" class="prtitle">DATA SISWA PRAKERIN</div><br><br>

	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
          <th class="short">Username</th>
	  			<th class="normal">Nama Lengkap</th>
	  			<th class="normal">Jurusan</th>
          <th class="short">Tahun Ajaran</th>
          <th class="normal">Tanggal Deadline</th>
	  		</tr>
	  	</thead>
	  	<tbody>
        <?php
        foreach ($data as $siswa):
          $nis = $siswa['nis'];
          $nama= $siswa['nama'];
          $jurusan= $siswa['jurusan'];
          $tahun_ajaran= $siswa['tahun_ajaran'];
          if ($siswa['tanggal_deadline'] != 'kosong') {
            $tgl_deadline = date("d-m-Y", strtotime($siswa['tanggal_deadline']));
          }
          else {
            $tgl_deadline = "-";
          }
         ?>
	  		  <tr>
          <td><?php echo $nis; ?></td>
	  			<td><?php echo $nama; ?></td>
	  			<td><?php echo $jurusan; ?></td>
          <td><?php echo $tahun_ajaran; ?></td>
          <td><?php echo $tgl_deadline; ?></td>
	  		  </tr>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
   <div>
     <strong>* Username dan Password Sama</strong><br>
     <strong>* Mohon Untuk Segera Mendaftar Sebelum Tanggal Deadline yang Tertera</strong>
   </div>
   <br>
   <table align="right">
       <td>
         <div><strong>Malang,</strong>
           <br>
           <br><strong>Penanggung Jawab</strong><br><br><br><br><br>
           -----------------------------------------<br>
           <br>
           <br></div>
       </td>
     </table>

</body>
</html>
