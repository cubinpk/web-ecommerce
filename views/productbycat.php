<?php
include './inc/header.php';

?>
<?php 

if(!isset($_GET['loaispid']) || $_GET['loaispid']== null){
    echo "<span>Lỗi rồi nè !!</span>";
     
  
} else {
      $id = $_GET['loaispid']; 
}


?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php $getlsp = $loai->show_LSP_byID($id);
			  if($getlsp){
				  while($tenloai = $getlsp->fetch_assoc()){ ?>
			<h3><?php $tenloai['TenLoaiSP'] ; ?></h3>
			<?php }} ?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="row">
			  <?php 
			  $getsp_lsp = $loai->getsp_by_LSPID($id);
			  if($getsp_lsp){
				  while($result2=$getsp_lsp->fetch_assoc()){
				
			  ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 phongphong">
    			<div class="hovereffect">
        			<img class="img-responsive hinh" src="admin/uploads/<?php echo $result2['image']?>" alt="<?php echo $result2['TenSanPham']; ?>" />
        			<div class="overlay">
          				 <h2>NỔI BẬT</h2>
						<a class="info" href="details.php?spid=<?php echo $result2['SanPhamID']; ?>">XEM</a>
						  
					</div>
					<br>
					<h1 class="tensanpham"><?php echo $result2['TenSanPham']; ?></h1>
					<br>
					<p><span class="price"><?php echo $fm->format_currency($result2['Gia'])." ". "VNĐ"; ?></span></p>
   				</div>
			</div>
				  <?php 
				  }}
				  ?>
 </div>
<?php
include './inc/footer.php';
?>
