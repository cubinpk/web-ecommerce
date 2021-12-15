<?php
include './inc/header.php';
include_once './inc/slider.php';
?>

		

<div class="container-fluid main">
    <div class="content ">
    	<div class="content_top  navbar-expand-sm bg-successs navbar-danger">
    		<div class="heading">
    		<h3>Sản Phẩm Nổi Bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="row">
		  <?php
		  		$spnoibat;
		  		if(isset($_POST['tensp'])){
					$spnoibat = $sp->getSP_Noibat_search($_POST['tensp']);
				} else {
				$spnoibat = $sp->getSP_Noibat();}
				if($spnoibat){
					while($result = $spnoibat->fetch_assoc() ){
				?>
				<!-- <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img class="hinhsp" src="admin/uploads/<?php echo $result['image']?>" alt="<?php echo $result['TenSanPham']; ?>" /></a>
					 <h2><?php echo $result['TenSanPham']; ?></h2>
					 <p><span class="price"><?php echo $result['Gia']; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div> -->
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-4 phongphong">
    			<div class="hovereffect">
        			<img class="img-responsive hinh" src="admin/uploads/<?php echo $result['image']?>" alt="<?php echo $result['TenSanPham']; ?>" />
        				<div class="overlay">
          				 	<h2>NỔI BẬT</h2>
							<a class="info" href="details.php?spid=<?php echo $result['SanPhamID']; ?>">XEM</a>
						  
						</div>
						<br>
						<h1 class="tensanpham"><?php echo $result['TenSanPham']; ?></h1>
						<br>
						<p><span class="price"><?php echo $fm->format_currency($result['Gia'])." ". "VNĐ"; ?></span></p>
   				</div>
			</div>
					<?php }}?>
		</div>
			
		<div class="content">
    	<div class="content_top  navbar-expand-sm bg-successs navbar-danger">
    		<div class="heading">
    		<h3>Sản Phẩm Mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="row">
		<?php
				$spnew;
				if(isset($_POST['tensp'])){
				  $spnew = $sp->getSP_Moi_search($_POST['tensp']);
			  } else {
				$spnew = $sp->getSP_Moi();}
				if($spnew){
					while($result_new = $spnew->fetch_assoc() ){
				?>
				<!-- <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img class="hinhsp" src="admin/uploads/<?php echo $result['image']?>" alt="<?php echo $result['TenSanPham']; ?>" /></a>
					 <h2><?php echo $result['TenSanPham']; ?></h2>
					 <p><span class="price"><?php echo $result['Gia']; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div> -->
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-4  phongphong">
    			<div class="hovereffect">
        			<img class="img-responsive hinh" src="admin/uploads/<?php echo $result_new['image']?>" alt="<?php echo $result_new['TenSanPham']; ?>" />
        				<div class="overlay">
          				 	<h2>Mới</h2>
							<a class="info" href="details.php?spid=<?php echo $result_new['SanPhamID']; ?>">XEM</a>
						  
						</div>
						<br>
						<h1 class="tensanpham"><?php echo $result_new['TenSanPham']; ?></h1>
						<br>
						<p><span class="price"><?php echo $fm->format_currency($result_new['Gia'])." ". "VNĐ"; ?></span></p>
   				</div>
			</div>
					<?php }}?>
					</div>
		
		</div>
	</div>
<?php
include './inc/footer.php';

?>

