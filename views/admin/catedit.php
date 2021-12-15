<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../controller/LoaiSanPham_ctrl.php';?>
<?php

$lsp1 = new LoaiSanPham_ctrl();
$m_loai2 = new LoaiSanPham();
if(!isset($_GET['loaispID'])|| $_GET['loaispID']== null){
    echo"<script>window.location=catlist.php</script>";
     
  
} else {
      $m_loai2->setLoaiID($_GET['loaispID']) ; 
}

if(isset($_POST['tenloaisp'])){
    $m_loai2->setTenLoaiSP($_POST['tenloaisp']);
    $updatelsp= $lsp1->update_LSP($m_loai2->getTenLoaiSP(),$m_loai2->getLoaiID());
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
                        Sửa thông tin loại sản phẩm
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
                                Sửa tên loại sản phẩm</h6>
                        </div>
                    </div>
                    <div class="text-success text-center p-1">
                    <?php if(isset($updatelsp)){
                          echo $updatelsp ;} ?>
                    </div>
                
            <div class="card-body">
            
                    <?php $result = $lsp1->getLoaiID($m_loai2->getLoaiID());
                          while($result){
                            
                            ?>
                    <form class="row" action="" method="POST"> 
                        <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="tenloaisp"><strong>Tên loại sản phẩm</strong></label>
                                    <input type="text" value="<?php echo $result->getTenLoaiSP(); ?>" name="tenloaisp" class="form-control Name" placeholder="Nhập tên loại sản phẩm">
                                </div>

                        
                            <div class="d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật tên loại sản phẩm"/>
                             
                        </div>   
                        <?php } ?>       
                    </form>
            </div>  
        </div>
    <!-- /.container-fluid -->
    </div> 
</main>




















        
<?php include 'inc/footer.php';?>