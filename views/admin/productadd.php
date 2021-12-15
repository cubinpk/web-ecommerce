<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../controller/ThuongHieuSP_ctrl.php';
      include '../../controller/LoaiSanPham_ctrl.php';
      include '../../controller/SanPham_ctrl.php';
?>
<?php
$pd = new SanPham_ctrl();
if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])){
 
    $insert_SP = $pd->insert_SP($_POST, $_FILES['image']);
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
                    Thêm loại sản phẩm mới
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
                                Tạo loại sản phẩm</h6>
                        </div>
                    </div>
                <div class="text-success text-center p-1">
                <?php if(isset($insert_SP)){
                        echo $insert_SP ;} ?> 
                </div>
       


                <form class="card-body" action="productadd.php" method="post" enctype="multipart/form-data"> <!--Dùng để up file hình ảnh-->
                    <div class="mr-md-4 ml-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">
                                        <i class="fas fa-file-signature"></i>
                                        <strong>Tên sản phẩm</strong>
                                    </label>
                                    <input type="text" name="TenSanPham" class="form-control Name" placeholder="Tên sản phẩm" required="">
                                    <div class="NameError invalid-feedback">
                                        Chưa nhập tên sản phẩm!!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Brand">
                                        <i class="fas fa-city"></i>
                                        <strong>Thương hiệu</strong>
                                    </label>
                                    <select class="form-control Type-product" id="select" name= "ThuongHieuID">
                                    <option>Thương hiệu</option>
                                    <?php 
                                        $_thuonghieu = new ThuongHieuSP_ctrl();
                                        $dsth = $_thuonghieu->show_TH();
                                        if($dsth){
                                            while ($kqq= $dsth->fetch_assoc()){
                        
                                    ?>
                                    <option  value="<?php echo $kqq['ThuongHieuID']; ?>"><?php echo $kqq['TenThuongHieu']; ?></option>
                                        <?php }} ?>
                                </select>
                                </div>


                                <div class="form-group">
                                    <label for="Gia">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Giá bán</strong>
                                    </label>
                                    <input type="text" name="Gia" class="form-control Price" placeholder="Giá" required>
                                    <div class="PriceError invalid-feedback">
                                        Chưa nhập giá sản phẩm!!
                                    </div>
                                </div>

                                <div class="form-group form-inline">
                                    <label for="Price" class="mr-md-2">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Ảnh sản phẩm</strong>
                                    </label>
                                    <label for="image">
                                    <input name="image" type="file"/>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Type-product"><strong>Loại sản phẩm</strong></label>
                                    <!-- <select class="form-control Type-product" name="Type-product"> -->
                                    <select class="form-control Type-product" id="select" name="LoaiID" >
                                        <option>Chọn loại sản phẩm</option>
                                            <?php 
                                                $loaii = new LoaiSanPham_ctrl();
                                                $ds = $loaii->show_LSP();
                                                if($ds){
                                                    while ($kq= $ds->fetch_assoc()){
                                
                                            ?>
                                        <option  value="<?php echo $kq['LoaiID']; ?>"><?php echo $kq['TenLoaiSP'];?></option>
                                        <?php }}?> 
                                    </select>
                                    <!-- </select> -->
                                </div>

                                

                                <div class="form-group">
                                    <label for="Short-Description">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Tình trạng</strong>
                                        <select class="form-control Type-product"  name="TinhTrang" >
                                            <option>Chọn tình trạng</option> 
                                            <option value="0">Mặc định</option>                              
                                            <option value="1">Nổi bật</option>                  
                                            <option value="2">Sản phẩm mới</option>
                                         </select>
                                    </label> 
                                </div>

                                <div class="form-group">
                                    <label for="Description">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Mô tả</strong>
                                    </label>
                                    <textarea class="form-control" rows="4" id="Description" name="MoTa" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                            <input type="submit" name="submit" Value="Lưu thông tin sản phẩm" class="btn btn-success"/>
                            <!-- <button type="submit" class="btn btn-secondary">Secondary</button> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include 'inc/footer.php';?>











       



