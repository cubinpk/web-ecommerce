<?php 

include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">WelCome To My WebSite</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dữ liệu</li>
                        </ol>
                       
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">DOANH THU</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php $dthu = $dh->DoanhThu();
                                              if($dthu){
                                                  while($doanhthu= $dthu->fetch_assoc()){
                                                      ?>
                                        <a class="small text-white stretched-link" href=""> <?php echo $fm->format_currency($doanhthu['tien'])." VNĐ"; ?> </a><?php }} ?> 
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Khách hàng</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $khach = $kh->Dem_KhachHang();
                                              if($khach){
                                                  while($khachh= $khach->fetch_assoc()){
                                                      ?>
                                        <a class="small text-white stretched-link" href="">Khách hàng tiềm năng ( <?php  $resu = $khachh['kh'];
                                                                                                                        if($resu==null)
                                                                                                                        {echo '0';} else{echo $resu;}?> ) </a> <?php }} ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Sản phẩm</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php  $sp1 = new SanPham_ctrl();
                                    $sanphamm = $sp1->Dem_SanPham();
                                              if($sanphamm){
                                                  while($kq= $sanphamm->fetch_assoc()){
                                                      ?>
                                        <a class="small text-white stretched-link" href="productlist.php">Thông tin sản phẩm ( <?php  $resu = $kq['sp'];
                                                                                                                        if($resu==null)
                                                                                                                        {echo '0';} else{echo $resu;}?> ) </a> <?php }} ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Đơn hàng</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $don = $dh->Dem_DonHangMoi();
                                              if($don){
                                                  while($kq1= $don->fetch_assoc()){
                                                      
                                                    
                                                      ?>
                                        <a class="small text-white stretched-link" href="inbox.php">Đơn hàng mới ( <?php echo $kq1['HD']?> ) </a> <?php }} ?>
                                                                                                                       
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <img style="width: 100%" src="/phong1312/views/images/nguoituyet1.jpg" alt="">
                        </div>
                        
                    </div>
                </main>
<?php include 'inc/footer.php';?>