<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:700px;
      border-radius: 5px;
    }

    .short{
      width: 75px;
    }

    .normal{
      width: 150px;
    }

    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

    thead th{
      text-align: left;
      padding: 7px;
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
          <img width="85" src="assets/images/smk.jpg"></td>
          <td class="prsmall" valign="top" width="410" align = center>
            SMK MUHAMMADIYAH 1 MALANG
            <br>-----------------------------------------------------------------------------------------------------
            <br>SISTEM INFORMASI MANAJEMEN PRAKERIN
          </td>
        </table>
        <br><br>    <div align="center" class="prtitle">DATA SISWA PRAKERIN</div><br><br>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
          <th class="short">Username</th>
	  			<th class="normal">Nama Lengkap</th>
	  			<th class="normal">Jurusan</th>
          <th class="normal">Tahun Ajaran</th>
          <th class="short">Tanggal Deadline</th>
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
          <td><?php echo $nis; ?></span></td>
	  			<td><?php echo $nama; ?></td>
	  			<td><?php echo $jurusan; ?></td>
          <td><?php echo $tahun_ajaran; ?></td>
          <td><?php echo $tgl_deadline; ?></td>
	  		  </tr>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
   <br>
   <div>
     <strong>* Mohon Untuk Segera Mendaftar Sebelum Pada Tanggal Deadline yang Tertera</strong>
   </div>
   <br>
   <table align="right">
       <td>
         <div><strong>Malang,
           <br>
           <br>Wakil Kepala Humas<br><br><br><br><br>
           -----------------------------------------<br>
           <br>
           <br></strong></div>
       </td>
     </table>

</body>
</html>
