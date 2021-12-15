
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
spl_autoload_register(function($className){
	include_once "../model/".$className.".php";
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
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
<script
src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<!-- <script
src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script> -->
<!-- <script>
$(document).ready(function(){
	$(".dropdown-toggle").hover(function(){
    	//alert()
    	$(".dropdown-menu").toggleClass("show")
    })
})
</script> -->
</head>
<body>
<div class="container-fluid">
	  
    <header class="row">
		<div style="margin-top:85px" class="col-lg-4 col-md-2 col-sm-12 col-xs-12 ">
			<form class="form-inline d-flex justify-content-center md-form form-sm mt-0 phon" method="post">
				<div class="input-group my-4 col-6 mx-auto">
				<input class="form-control py-2 border-right-0 " name="tensp" type="text" placeholder="Nhập sản phẩm tìm kiếm ..." >
					<!-- <span class="input-group-append"> -->
					<!-- <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split border border-left-0 border-right-0 rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
					
					<!-- </button> -->
					<button class="btn btn-outline-secondary rounded-right" type="button">
					<i class="fas fa-search"></i>
					</button>
					
					<!-- </span> -->
				</div>
			</form>
		</div> 
		
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mende">
			<a href="index.php"><img src="http://theme.hstatic.net/200000259513/1000660906/14/logo.png?v=259" alt="" /></a>
		</div>
			
			
		<!-- <div class="col-lg-4 col-md-4 col-sm-2 col-xs-12 loginn"> -->
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex iconn" > 
			<a href="cart.php" title="Giỏ hàng" ><i class="fas fa-shopping-cart">
			<span class = "gh" >
				<?php 
				$check_cart= $giohang->check_cart();
				if($check_cart){
				$soluongg= Session::get("soluong");
				echo $soluongg ;} else{echo '0';}
				?> 
			</span></i></a>	
			<div class="dropdown p-0">
				<?php  //Tinh nang dang xuat
					if(isset($_GET['cusid'])){
						$gh= new Cart_ctrl();
						$kq = $gh->del_all_cart();
						Session::destroy_home();}
				?>
				<?php //Thông tin đăng nhập
				$login_check = Session::get('customer_login');
					
				$tencus = Session::get('customer_name');
				if($login_check==false){
					echo '<a href="login.php" data-toggle="dropdown" class="dropdown-toggle"><i class="fas fa-user" ></i></a> 
					<div class="dropdown-menu menu2 p-1">	  
						<a class="dropdown-item" href="login.php">Đăng nhập thành viên</a>
						<a class="dropdown-item" href="admin/login.php">Admin</a>
						<a class="dropdown-item" href="login22.php">Đăng kí thành viên</a>
					</div>';
				}else{
					echo '
					
					<a href="login.php" data-toggle="dropdown" class="dropdown-toggle"><i class="fas fa-user" ><span class="success">'.$tencus.'</span></i></a> 
					<div class="dropdown-menu menu2 p-1">
						<a class="dropdown-item" href="?cusid='.Session::get('customer_id').'">Đăng xuất</a>
						<a class="dropdown-item" href="DonHang_KH.php">Đơn hàng của bạn</a></a>
					</div>';
				}
				?>
			</div>
		</div>
	</header>
	
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" >
	
		<button class="navbar-toggler but_tog" type="button" data-toggle ="collapse" data-target="#navbarReponsive">
					<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarReponsive">
			<ul class="navbar-nav  md-auto mr-auto mt-2 mt-lg-0">
				<!-- <li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a> </li>
				<li><a href="topbrands.php">Top Brands</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="contact.php">Contact</a> </li> -->
				        <li class="nav-item notify_hover">
							<a  class="effect-underline text-secondary" active href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
						</li>
						<span>|</span>
						<li class="nav-item notify_hover">
							<a style="width:200px"class="header_notify_link effect-underline text-secondary" active href="index.php"> Danh mục</a>
							<div style="margin-right:50px;border-right-width: 50px;padding-right: 0px;width: 220px;left: 0px;" class="header_notify">
								<header class="header_notify_header">
									<ul class="header_notify_list" >
										<li class="header_notify_item">
											<a href="allproduct.php?trang=1" class="header_notify_link effect-underline arieng text-secondary">Tất cả sản phẩm</a>
										</li>
										<li class="header_notify_item">
											<a href="productbycat.php?loaispid=41" class="header_notify_link effect-underline text-secondary">Tai nghe</a>
										</li>
										<li class="header_notify_item">
											<a href="productbycat.php?loaispid=42" class="header_notify_link effect-underline text-secondary">Sạc,cáp</a>
										</li>
										<li class="header_notify_item">
											<a href="productbycat.php?loaispid=43" class="header_notify_link effect-underline text-secondary">Ốp lưng</a>
										</li>
										<li class="header_notify_item">
											<a href="productbycat.php?loaispid=44" class="header_notify_link effect-underline text-secondary">Loa</a>
										</li>
										
									</ul>
								</header>
							</div>
						</li>
						<span>|</span>
						<li class="nav-item">
						<span><a class="effect-underline text-secondary" href="cart.php"> Giỏ hàng</a>
							</span>
						</li>
						<span>|</span>
						<li class="nav-item">
							<a class="effect-underline text-secondary" href="contact.php"> Chính sách đổi trả</a>
						</li>
						<span>|</span>
						<li class="nav-item">
						<span><a class="effect-underline text-secondary" href="tel:0349890809" > <i class="fas fa-phone"></i><i></i> 0349890809 </a>
							</span>
						</li>
						<span>|</span>
						
					
					</ul>
				
			
		</div>
		
	
</nav>
