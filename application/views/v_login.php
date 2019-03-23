<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIMARIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- alert -->


<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>assets/images/bg.png" alt="IMG">
				</div>


				<form class="login100-form validate-form" action="<?php echo base_url('c_login/login'); ?>" method="post">
					<span class="login100-form-title">
						LOGIN
					</span>

          <?php
      if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
          echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
        }else if($_GET['pesan'] == "logout"){
          echo "<div class='alert alert-danger'>Anda telah logout.</div>";
        }else if($_GET['pesan'] == "login"){
          echo "<div class='alert alert-success'>Silahkan login Kembali.</div>";
        }else if($_GET['pesan'] == "ok"){
          echo "<div class='alert alert-primary'>Success !</div>";
        }else if($_GET['pesan'] == "email"){
          echo "<div class='alert alert-primary'>Berhasil Silahkan Cek Email Anda </div>";
        }
      }
  ?>
      <div class="wrap-input100 validate-input" data-validate = "Contoh NIS : 12345">
        <input class="input100" type="text" name="nis" placeholder="NIS">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-user" aria-hidden="true"></i>
        </span>
				<?php echo form_error('nis'); ?>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Password harus diisi">
        <input class="input100" type="password" name="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
      </div>
			<?php echo form_error('password'); ?>

      <div class="container-login100-form-btn">
        <button class="login100-form-btn">
          Login
        </button>
      </div>
					<div class="text-center p-t-12">
						<a class="txt2" href="<?php echo site_url(); ?>c_login/v_login_admin">
							Login Sebagai Admin/Guru Kelas.
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>
