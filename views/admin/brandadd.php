<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../../controller/ThuongHieuSP_ctrl.php';?>
<?php
$thsp = new ThuongHieuSP_ctrl();
if(isset($_POST['tenbrand'])){
    $ten = $_POST['tenbrand'];
    
    
    $insertBrand = $thsp->insert_THSP($ten);
}
?>
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
            Thêm thương hiệu mới
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
                    Tạo thương hiệu</h6>
            </div>
        </div>
        <div class="text-success text-center p-1">
        <?php if(isset($insertBrand)){
                      echo $insertBrand ;} ?>
               
        </div>
        
        <div class="card-body">

            <form class="row" action="brandadd.php" method="POST">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="tenloai"><strong>Tên thương hiệu</strong></label>
                        <input type="text" name="tenbrand" class="form-control Name" placeholder="Nhập tên thương hiệu">
                    </div>

                   
                    <div class="d-flex justify-content-end">
                    <input type="submit" name="submit" class="btn btn-primary" value="Thêm thương hiệu"/>
                        <!-- Tạo loại sản phẩm</button> -->
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div> 
                           
              
                   <!-- <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name= "tenloai" placeholder="Nhập danh mục sản phẩm ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div> -->
</main>
               
              
                    <!-- <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name= "tenbrand" placeholder="Nhập danh mục thương hiệu sản phẩm ..." class="medium" />
                            </td>
                        </tr>
			<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div> -->
<?php include 'inc/footer.php';?>