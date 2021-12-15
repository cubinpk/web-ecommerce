<?php
include '../controller/session.php';
Session::init();//kiem tra da dang nhap hay chua
?>
<?php
include_once '../controller/database.php';
include_once '../controller/format.php';
spl_autoload_register(function($className){
	include_once "../controller/".$className.".php";
});

  $db = new Database();
  $fm = new Format();
  $loai = new LoaiSanPham_ctrl();
  $giohang = new Cart_ctrl();
  $sp = new SanPham_ctrl();
  $user = new user_ctrl();
  $kh = new KhachHang_ctrl();



?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<?php
//kiem tra dang nhap

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
$login = $kh->login_KhachHang($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="/phong1312/views/admin/image/png" href="admin/login/login_v3/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/login/login_v3/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/phong1312/views/admin/login/login_v3/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
					        Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="Email" placeholder="Nhập email của bạn">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="Password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div><?php
					if(isset($login)){
						echo $login ;
					} ?>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<?php 
					
					?>
					<div class="container-login100-form-btn">
						
						<input type="submit" name="login"  value="Login" class="login100-form-btn"/>
						
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="/phong1312/views/login22.php">
							Create Accout
						</a>
						<br>
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/login/login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/daterangepicker/moment.min.js"></script>
	<script src="admin/login/login_v3/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="admin/login/login_v3/js/main.js"></script>

</body>
</html>