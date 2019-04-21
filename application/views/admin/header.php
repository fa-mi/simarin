<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMARIN V1.0</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
    <script>
    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      var weekday = new Array(7);
      weekday[0] = "Minggu";
      weekday[1] = "Senin";
      weekday[2] = "Selasa";
      weekday[3] = "Rabu";
      weekday[4] = "Kamis";
      weekday[5] = "Jumat";
      weekday[6] = "Sabtu";

      var month = new Array();
      month[0] = "Januari";
      month[1] = "Februari";
      month[2] = "Maret";
      month[3] = "April";
      month[4] = "Mei";
      month[5] = "Juni";
      month[6] = "Juli";
      month[7] = "Agustus";
      month[8] = "September";
      month[9] = "October";
      month[10] = "November";
      month[11] = "Desember";

      var month = month[today.getMonth()];
      var day = weekday[today.getDay()];
      var date = today.getDate();
      var year = today.getFullYear();
      document.getElementById('date').innerHTML =
      day + ", "+date+" "+month+" "+year+" ("+h + ":" + m + ":" + s+")";
      var t = setTimeout(startTime, 500);

    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }

    </script>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/dashboard/build/css/custom.min.css" rel="stylesheet">
      <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
  </head>

  <body class="nav-md" onload="startTime()">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url(); ?>c_admin" class="site_title"><i class="	fa fa-life-saver"></i> <span>SIMARIN V1.0</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/admin.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>ADMIN</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url(); ?>c_admin"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a>
                  </li>

                  <li><a><i class="fa fa-users"></i> Menu Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>c_admin/tabel_siswa">Tabel Siswa</a></li>
                      <li><a href="<?php echo site_url(); ?>c_admin/tabel_siswa_prakerin">Tabel Siswa Prakerin</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url(); ?>c_admin/tabel_industri"><i class="fa fa-building"></i> Tabel Industri <span class="fa fa-chevron-right"></span></a>
                  </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/dashboard/images/admin.png" alt="">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url(); ?>c_admin/v_ubah_password"><i class="fa fa-key pull-right"></i>Ubah Password</a></li>
                    <li><a href="<?php echo site_url(); ?>c_admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a>
                    <span class='badge bg-red'> Waktu Server </span>
                      <span class='badge bg-white' id="date"></span>
                          </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
