<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMARIN</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
    <script type="text/javascript">
    function CheckColors(val){
     var element=document.getElementById('color');
     if(val=='pick a color'||val=='others')
       element.style.display='block';
     else
       element.style.display='none';
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

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/dashboard/build/css/custom.min.css" rel="stylesheet">
      <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url(); ?>c_admin" class="site_title"><i class="	fa fa-life-saver"></i> <span>Dashboard Admin </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/admin.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $this->session->userdata('tipe_admin'); ?></h2>
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

                  <li><a><i class="fa fa-user"></i> Menu Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>c_admin/data_siswa">Tabel Siswa</a></li>
                      <li><a href="<?php echo site_url(); ?>c_admin/tabel_siswa_belum_konfirmasi">Data Calon Prakerin Belum Konfirmasi</a></li>
                      <li><a href="<?php echo site_url(); ?>c_admin/tabel_siswa_sudah_konfirmasi">Data Calon Prakerin Sudah Konfirmasi</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-building"></i> Menu Industri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>c_admin/tabel_industri">Tabel Industri</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>c_admin/data_chart">Data Industri</a></li>
                      <li><a href="chartjs2.html">Data Siswa</a></li>
                    </ul>
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

                    <?php echo $this->session->userdata('tipe_admin'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url(); ?>c_admin/v_ubah_password"><i class="fa fa-key pull-right"></i>Ubah Password</a></li>
                    <li><a href="<?php echo site_url(); ?>c_admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-comments-o"></i>
                <span class='badge bg-red'> <?php echo $this->session->flashdata('notif'); ?>
                      </span>
                          </a>
                          <ul class='dropdown-menu list-unstyled msg_list' role='menu'>
                            <li>
                              <a>
                                <span class='image'><img src='<?php echo base_url(); ?>assets/dashboard/images/siswa.png' alt='Profile Image' /></span>
                                <span>
                                  <span>Validasi Siswa</span>
                                  <span class='time'><?php echo $this->session->flashdata('notif'); ?></span>
                                </span>
                              </a>
                            </li>
                          </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
