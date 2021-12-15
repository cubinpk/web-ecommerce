<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../controller/ThuongHieuSP_ctrl.php' ;?>
<?php
$TH= new ThuongHieuSP_ctrl();
if(!isset($_GET['THID'])|| $_GET['THID']== null){
    echo"<script>window.location=catlist.php</script>";
     
  
} else {
      $id = $_GET['THID']; 
}

if(isset($_POST['tenTH'])){
    $tenTHH = $_POST['tenTH'];
    $updateTH= $TH->update_TH($tenTHH, $id);
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
                        Sửa thông tin thương hiệu
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
                                Sửa tên thương hiệu</h6>
                        </div>
                    </div>
                    <div class="text-success text-center p-1">
                    <?php if(isset($updateTH)){
                          echo $updateTH ;} ?>
                    </div>
                
            <div class="card-body">
            
                <?php $get_tenTH = $TH->getTHID($id);
                            if($get_tenTH){
                                while ($result= $get_tenTH->fetch_assoc()){

                                ?>
                    <form class="row" action="" method="POST">  <!--Form action ko nhận giá trị"-->
                        <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="tenloaisp"><strong>Tên loại sản phẩm</strong></label>
                                    <input type="text" value="<?php echo $result['TenThuongHieu']; ?>" name="tenTH" class="form-control Name" placeholder="Nhập tên mới của thương hiệu">
                                </div>

                        
                            <div class="d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật tên thương hiệu"/>
                                <!-- Tạo loại sản phẩm</button> -->
                        </div>   
                        <?php }} ?>       
                    </form>
            </div>  
        </div>
    <!-- /.container-fluid -->
    </div> 
</main>















        <!-- <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục </h2>
                <div class="block copyblock"> 
                    <?php if(isset($updateTH)){
                          echo $updateTH ;} ?>
                    <?php $get_tenTH = $TH->getTHID($id);
                          if($get_tenTH){
                              while ($result= $get_tenTH->fetch_assoc()){

                            ?>

             
                    <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['TenThuongHieu']; ?>" name= "tenTH" placeholder="Sửa danh mục sản phẩm ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                        <?php }} ?>
                    </table>
                    </form>
                        
                </div>
            </div>
        </div> -->
<?php include 'inc/footer.php';?>
