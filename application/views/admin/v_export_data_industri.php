<!DOCTYPE html>
<html>
<head>
  <title>Data Industri</title>
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
      width: 250px;
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
        <br><br>    <div align="center" class="prtitle">DATA INDUSTRI</div><br><br>
        <div id="outtable">
          <table>
            <thead>
              <tr>
                <th class="normal">Industri</th>
                <th class="normal">Jurusan</th>
                <th class="short">Siswa Mendaftar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $industri): ?>
                <tr>
                <td><?php echo $industri['industri']; ?></td>
                <td><?php echo $industri['jurusan']; ?></td>
                <td><center><?php echo $industri['siswa_mendaftar']; ?></center></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
         </div>
   <br>
   <br>
</body>
</html>
