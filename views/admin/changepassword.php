<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
















<main>
    <div id="content"><!-- Topbar -->
        <div class="container-fluid bg-white mb-4 text-center shadow" id="admin-navbar">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar info -->
                <div class="sidebar-heading">
                    Thông tin mật khẩu
                </div>
            </nav>
        </div>
        <!-- Begin Page Content -->
        <div class="container-fluid row m-0">
            <div class="col-md-3"></div>
                <div class="card shadow mb-4 col-md-6 p-0">
                    <div class="card-header">
                        <div class="row">
                            <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                                Thay đổi mật khẩu</h6>
                        </div>
                    </div>
                <div class="text-success text-center p-1">
                <?php if(isset($insertsp)){
                        echo $insertsp ;} ?> 
                </div>
                
            <div class="card-body">

                    <form class="row" action="changepassword.php" method="POST">
                        <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="tenloai"><strong>Mật khẩu cũ</strong></label>                                    
                                    <input type="password" name="tenloai" class="form-control Name" placeholder="Nhập mật khẩu cũ">
                                    <label for="tenloai"><strong>Mật khẩu mới</strong></label>
                                    <input type="password" name="tenloai" class="form-control Name" placeholder="Nhập mật khẩu mới">
                                    <label for="tenloai"><strong>Xác nhận mật khẩu mới</strong></label>
                                    <input type="password" id="myInput" name="tenloai" class="form-control Name" placeholder="Xác nhận mật khẩu"> 
                                 

                                            <!-- An element to toggle between password visibility -->
                                            <input type="checkbox" onclick="myFunction()">Show password
                                            <script>
                                                function myFunction() {
                                                    var x = document.getElementById("myInput");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                    } else {
                                                        x.type = "password";
                                                    }
                                                    }

                                            </script>
                            </div>

                        
                            <div class="d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật mật khẩu"/>
                                <!-- Tạo loại sản phẩm</button> -->
                        </div>          
                    </form>
            </div>  
        </div>
    <!-- /.container-fluid -->
    </div>              
</main>

















<!-- <div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form>
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="title" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="slogan" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div> -->
<?php include 'inc/footer.php';?>