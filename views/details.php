
<?php
ob_start();
include_once './inc/header.php';
include_once '../controller/SanPham_ctrl.php';


?>
<?php 
$spp= new SanPham_ctrl();
$loaisp = new LoaiSanPham_ctrl();
if(!isset($_GET['spid'])|| $_GET['spid']== null){
    echo"<script>window.location=index.php</script>";
} else {
      $idd = $_GET['spid']; 
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
	$SoLuong = $_POST['SoLuong'];
	if($giohang->check_cart_mua($idd)){
		$giohang->update_GioHang_muaTrung($SoLuong,$idd);
	}
	else{
	$themvaogiohang = $giohang->insert_GioHang($SoLuong,$idd);
	}
}

?>

<br>
<div class="container-fluid row m-0">
<div class=" col-md-1 p-1 "></div>
    <div class="card shadow mb-4 col-md-8 p-1">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-12 d-flex align-items-center font-weight-bold text-primary">
                    Thông tin sản phẩm</h6>
            </div>
		</div>
		<div class="card-body">
		<?php 
		
		$get_thongtinsp = $spp ->getTT_SP($idd);
		if($get_thongtinsp){
			while($resulttt=$get_thongtinsp->fetch_assoc()){
		?>     
        
				
					<!-- <div class="grid images_5_of_3"> -->
						
						<div class="desc span_3_of_2">
							<h2><?php echo $resulttt['TenSanPham'] ?> </h2>
							<p><?php echo $resulttt['MoTa'] ?> </p>					
							<div class="price">
								<p>Giá: <span><?php echo $fm->format_currency($resulttt['Gia'])." ". "VNĐ"; ?></span></p>
								<p>Loại Sản Phẩm: <span><?php echo $resulttt['TenLoaiSP'] ?> </span></p>
								<p>Thương Hiệu:<span><?php echo $resulttt['TenThuongHieu'] ?> </span></p>
							</div>
						<div class="add-cart">
							<form action="" method="post">
								<input type="number" class="buyfield" name="SoLuong" value="1" min="1"/>
								<input href='' type="submit" class="btn btn-primary" name="submit" value="Mua"/>
							</form>				
						</div>
						</div>
						<img class="details" src="admin/uploads/<?php echo $resulttt['image']?>" alt="" />
					<!-- </div> -->
				
			
            
			<?php }}?>


        </div>
	</div>
	<div class="rightsidebar span_3_of_1 col-md-2">
					<h2>LOẠI SẢN PHẨM</h2>
					<ul>
						<?php $loaiii = $loaisp->show_LSP_fontend();
						      if($loaiii){
								  while($kqq= $loaiii->fetch_assoc()){

							  ?>
				      <li><a href="productbycat.php?loaispid=<?php echo $kqq['LoaiID']?>"><?php echo $kqq['TenLoaiSP']?></a></li>
								  <?php }}?>
    				</ul>
    	
 				</div>
 		</div>
 	


				
				
<?php
include './inc/footer.php';
?>
