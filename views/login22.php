
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
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
$insert_KhachHang = $kh->insert_KhachHang($_POST);
}
?>

 <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tạo tài khoản mới</title>
        <link href="/phong1312/views/admin/formadmin/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>







<div class="bg-primary">
<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
	
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                        
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản mới</h3></div>
                                    <div class="card-body">
                                        <div class="text-success text-center p-1">
											<?php 
											if(isset($insert_KhachHang)){
												echo $insert_KhachHang;
											}
											?>	
                                        </div>				
                                        <form action="" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Tên Khách Hàng</label>
                                                        <input class="form-control py-4" id="inputFirstName" name="TenKhachHang" type="text" placeholder="Enter name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Password</label>
                                                        <input class="form-control py-4" id="inputLastName" name="Password" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="Email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">SDT</label>
                                                        <input class="form-control py-4" id="inputPassword" name="SDT" type="text" placeholder="Enter phone" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Địa Chỉ</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" name="DiaChi" type="text" placeholder="Enter address" />
                                                    </div>
                                                </div>
                                            </div>
                                            

                                           
                                                <div class="row">
                                                    <label class="col-4" for="cars">Lựa chọn địa phương :</label>
                                                        <select id="country" name="DiaPhuong" onchange="change_country(this.value)" class="col-8"  >
                                                            <option value="TP Hồ Chí Minh">TP.HCM</option>
                                                            <option value="Hà Nội">Hà Nội</option>
                                                            <option value="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="Hải Phòng">Hải Phòng</option>
                                                        </select>
													<br><br>
													
												</div>
												<br>
												<div class="search"><input type="submit" name="submit" value="Tạo tài khoản" class="btn btn-primary"/></div>
										</div>
                                            
  
                                            



											
											
										</form>
										<div class="card-footer text-center">
                                        <div class="small"><a href="/phong1312/views/login.php">Have an account? Go to login</a></div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
			</div>
			</div>	
