<?php
include './inc/header.php';
// include './inc/slider.php';
?>

		

<div class="container-fluid main">
   
		<div class="content">
			<div class="content_top  navbar-expand-sm bg-success navbar-danger">
				<div class="heading">
				<h3>Tất cả sản phẩm</h3>
				</div>
				<div class="clear"></div>
			</div>
	    	<div class="row">
				<?php
				$spall;
				if(isset($_POST['tensp'])){
				  $spall = $sp->getSP_search($_POST['tensp']);
			  } else {
				$spall = $sp->show_SP();}
				if($spall){
					while($result_all = $spall->fetch_assoc() ){
				?>
				<!-- <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img class="hinhsp" src="admin/uploads/<?php echo $result['image']?>" alt="<?php echo $result['TenSanPham']; ?>" /></a>
					 <h2><?php echo $result['TenSanPham']; ?></h2>
					 <p><span class="price"><?php echo $result['Gia']; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div> -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 phongphong">
					<div class="hovereffect">
						<img class="img-responsive hinh" src="admin/uploads/<?php echo $result_all['image']?>" alt="<?php echo $result_all['TenSanPham']; ?>" />
							<div class="overlay">
								<h2>Sản phẩm</h2>
								<a class="info" href="details.php?spid=<?php echo $result_all['SanPhamID']; ?>">XEM</a>
							
							</div>
							<br>
							<h1 class="tensanpham"><?php echo $result_all['TenSanPham']; ?></h1>
							<br>
							<p><span class="price"><?php echo $fm->format_currency($result_all['Gia'])." ". "VNĐ"; ?></span></p>
					</div>
				</div>			
					<?php }}?>			
			</div>
			<div>
			<?php
				$spall_phantrang = $sp->show_phantrang_SP();
				$spall_count = mysqli_num_rows($spall_phantrang);
				$spall_button=ceil($spall_count)/12;
				$i=1;
				echo '<p>Trang : </p>';
				for($i=1;$i<=$spall_button;$i++){
					echo ' <button type="button" class="btn btn-outline-warning"><a style="text-decoration:none;color: black"style="0 5px;" href="allproduct.php?trang='.$i.'">'.$i.'</a></button>';
					
				}

			?>
			</div>
		</div>
	</div>
<?php
include './inc/footer.php';

?>

