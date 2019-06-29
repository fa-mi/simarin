<!DOCTYPE html>
<html>
<head>
  <title>Penjajakan Siswa</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/smk.png"/>
  <style type="text/css">
    #outtable{
      padding: 3px;
      border:5px solid #808080;
      width:700px;
      border-radius: 3px;
    }

    .short{
      width: 75px;
    }

    .normal{
      width: 135px;
    }

    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }

    thead th{
      text-align: center;
      padding: 5px;
    }

    tbody td{
      border-top: 1px solid #808080;
      padding: 5px;
    }
  </style>
</head>
<body bgcolor="#ffffff">
  <table cellpadding="0" cellspacing="0" border="0" width="500" align="center">
    <td class="prtext">
      <table cellpadding="0" cellspacing="0" border="0">
        <td valign="top" width="90">
          <img width="85" src="assets/images/smk.png"></td>
          <td class="prsmall" valign="top" width="410" align = center>
            SMK MUHAMMADIYAH 1 MALANG
            <br>-----------------------------------------------------------------------------------------------------
            <br>SISTEM INFORMASI MANAJEMEN PRAKERIN
          </td>
        </table>
 <?php
 foreach ($data as $siswa):
   $nis = $siswa['nis'];
   $nama= $siswa['nama_lengkap'];
   $domisili= $siswa['domisili'];
   $jurusan= $siswa['jurusan'];
   $tahun_ajaran= $siswa['tahun_ajaran'];
 ?>
 <div align="center" class="prtitle">FORMULIR PENJAJAKAN SISWA <?php echo "$tahun_ajaran"; ?> </div>
<br>
 <div align="center">
 NIS : <?php echo $nis ?><br>
 Nama Siswa : <?php echo $nama ?><br>
 Domisili : <?php echo $domisili ?><br>
 Jurusan : <?php echo $jurusan ?>

     <?php endforeach;?>
     </div>
<br>
Cara Melakukan Penjajakan Prakerin adalah dengan meminta tanda tangan sebagaimana kolom yang dimaksud di bawah ini :
<br>
<div id="outtable">
  <table>
    <thead>
      <tr>
        <th class="normal">NO</th>
        <th class="normal">Bidang Konfirmasi</th>
        <th class="short">Validasi TTD</th>
        <th class="normal">Keterangan</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <td>1</td>
        <td>SPP Semester Ganjil <br>(Semester 3)</td>
        <td align="center">TU<br><br><br>.........................</td>
        <td></td>
        </tr>
        <tr>
        <td>2</td>
        <td>Biaya Administrasi Prakerin</td>
        <td align="center">TU<br><br><br>.........................</td>
        <td></td>
        </tr>
        <tr>
        <td>3</td>
        <td>Remidial</td>
        <td align="center">Wali Kelas<br><br><br>.........................</td>
        <td></td>
        </tr>
        <tr>
        <td>4</td>
        <td>Tanggungan Peminjaman<br>Buku Perpustakaan</td>
        <td align="center">TU<br><br><br>.........................</td>
        <td></td>
        </tr>
        <tr>
        <td>5</td>
        <td>Ketua Program Keahlian</td>
        <td align="center">Ketua Program Keahlian<br><br><br>.........................</td>
        <td></td>
        </tr>
    </tbody>
  </table>
 </div>
<br>
<div style="float:right">Malang,
  <br>Koordinator Prakerin<br><br><br><br><br>
  -----------------------------------------<br>
  Kusdarmadi, S.Pd
</div>
  <div style="float:left">Mengetahui
    <br>Kepala Sekolah<br><br><br><br><br>
    -----------------------------------------
    <br>
    Drs. Arif Efendi
    <br></div>
</td>
</table>
</body>
</html>
