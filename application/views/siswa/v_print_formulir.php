<!DOCTYPE html>
<html>
<head>
  <title>Data Prakerin Siswa</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icons/favicon.png"/>

</head>
<body bgcolor="#ffffff">
  <table cellpadding="0" cellspacing="0" border="0" width="500" align="center">
    <td class="prtext">
      <<table cellpadding="0" cellspacing="0" border="0">
        <td valign="top" width="90">
          <img width="85" src="assets/images/smk.jpg"></td>
          <td class="prsmall" valign="top" width="410" align = center>
            SMK MUHAMMADIYAH 1 MALANG
            <br>-----------------------------------------------------------------------------------------------------
            <br>SISTEM INFORMASI MANAJEMEN PRAKERIN
          </td>
        </table><br><br>
 <div align="center" class="prtitle">FORMULIR PRAKERIN SISWA</div>
 <br><br>
 <?php
 foreach ($data as $siswa):
   $nis = $siswa['nis'];
   $nama= $siswa['nama'];
   $domisili= $siswa['domisili'];
   $jurusan= $siswa['jurusan'];
   $tahun_ajaran= $siswa['tahun_ajaran'];
   $keterangan = $siswa['keterangan'];
   $industri = $siswa['industri'];
   $nama_wali = $siswa['nama_wali'];
   $status_wali = $siswa['status'];
   $kelamin = $siswa['kelamin'];
   $no_telp = $siswa['no_telp'];
   if ($industri == 'Lainnya') {
     $industri = $keterangan;
   }
 ?>
 <div align="center">
 <table cellpadding="5" cellspacing="1" border="0">
   <tr class="prtext">
     <td width="100">NIS</td>
     <td width="350">: <?php echo $nis; ?></td>
   </tr>
     <tr class="prtext">
       <td>Nama</td>
       <td>: <?php echo $nama ?></td>
</tr>
       <tr class="prtext">
         <td>Jurusan</td>
         <td>: <?php echo $jurusan ?></td>
       </tr>
       <tr class="prtext">
         <td>Jenis Kelamin</td>
         <td>: <?php if ($kelamin == 1) {
           echo "Laki-Laki";
         }
         else {
           echo "Perempuan";
         } ?></td>
       </tr>
       <tr class="prtext">
         <td>Tahun Ajaran</td>
         <td>: <?php echo $tahun_ajaran ?></td>
       </tr>
       <tr class="prtext">
         <td>Domisili</td>
         <td>: <?php echo $domisili ?></td>
       </tr>
       <tr class="prtext">
         <td>Nama Wali Murid</td>
         <td>: <?php echo $nama_wali ?></td>
       </tr>
       <tr class="prtext">
         <td>Status Wali Murid</td>
         <td>: <?php echo $status_wali ?></td>
       </tr>
       <tr class="prtext">
         <td>No.Telpon Wali Murid</td>
         <td>: <?php echo $no_telp ?></td>
       </tr>
       <tr class="prtext">
         <td>Rencana Tempat Prakerin</td>
         <td>: <?php echo $industri ?></td>
       </tr>
     </table>
     <?php endforeach;?>
     </div>
<br>
<br>
<div style="float:right">Malang,
  <br>
  <br>Ketua Jurusan<br><br><br><br><br>
  -----------------------------------------<br>

  <br>
  <br></div>
  <div style="float:left">
    <br>
    <br>Wali Murid<br><br><br><br><br>
    -----------------------------------------<br>

    <br>
    <br></div>
</td>
</table>
</body>
</html>
