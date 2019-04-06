<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:680px;
      border-radius: 5px;
    }

    .short{
      width: 50px;
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
      padding: 10px;
    }

    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
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
	  			<th class="normal">Username</th>
	  			<th class="normal">Password</th>
	  			<th class="normal">Jurusan</th>
	  			<th class="short">Nama Lengkap</th>
          <th class="short">Tanggal Deadline</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php foreach($data as $siswa):
          if ($siswa['tanggal_deadline'] != 'kosong') {
            $tgl_deadline = date("d, m Y", strtotime($siswa['tanggal_deadline']));
          }
          else {
            $tgl_deadline = "-";
          }
          ?>
	  		  <tr>
	  			<td><?php echo $siswa['nis']; ?></td>
	  			<td><?php echo $siswa['nis']; ?></td>
          <td><?php echo $siswa['jurusan']; ?></td>
          <td><?php echo $siswa['nama']; ?></td>
          <td><?php echo $tgl_deadline; ?></td>
	  		  </tr>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
   <br>
   <div>
     <strong>* Mohon Untuk Segera Mendaftar Pada Tanggal yang Tertera</strong>
   </div>
   <br>
   <div style="float:right">Malang,
     <br>
     <br>Wail Kepala Humas<br><br><br><br><br>
     -----------------------------------------<br>
     Kusdarmadi
     <br>
     <br></div>
</body>
</html>
