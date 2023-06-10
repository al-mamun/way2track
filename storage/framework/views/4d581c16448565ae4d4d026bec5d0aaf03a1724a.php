<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(URL::asset( 'login/images/icons/favicon.ico')); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/fonts/iconic/css/material-design-iconic-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/animsition/css/animsition.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/vendor/daterangepicker/daterangepicker.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset( 'login/css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo e(URL::asset( 'login/images/bg-01.jpg')); ?>');">
			<div class="wrap-login100">
				 <?php echo Form::open(array('url'=>'login/custom','role'=>'form','method'=>'POST','class'=>'login100-form validate-form')); ?>

					<span class="login100-form-logo">
					    <img src="<?php echo e(URL::asset( 'assets/img/logo.png')); ?>" alt="Total Office Logo" class="brand-image" style="opacity: 1;width: 94px;">
						<!--<i class="zmdi zmdi-landscape"></i>-->
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username ">
						<input class="input100" type="text" name="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/bootstrap/js/popper.js')); ?>"></script>
	<script src="<?php echo e(URL::asset( 'vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/daterangepicker/moment.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset( 'vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(URL::asset( 'js/main.js')); ?>"></script>

</body>
</html><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/auth/index.blade.php ENDPATH**/ ?>