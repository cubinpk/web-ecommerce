
<?php
include './inc/header.php';

?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' ){ // && isset($_POST['submit'])
	$cartid = $_POST['GioHangID'];
	$sll = $_POST['SoLuong'];
	$updateSL = $giohang->update_GioHang($sll,$cartid);
	header('Location:cart.php');

}
$giohang = new Cart_ctrl();
if (isset($_GET['delID'])){
	echo"<script>window.location=productlist.php</script>";
	$id = $_GET['delID'];  
	$xoaGH= $giohang->del_GioHang($id);}
?> 
<?php
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>

<div class="container-fluid row m-0">
    <div class="card shadow mb-4 col-md-12 p-1">
	<?php  if(isset($updateSL)){
						echo $updateSL;
						}?>
						
						<?php  if(isset($xoaGH)){
						echo $xoaGH;
						}?>
		<div class="card-body">
		
		<table class="tblone">
							<tr>
								<th width="20%">Tên Sản Phẩm</th>
								<th width="10%">Hình Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số Lượng</th>
								<th width="20%">Tổng Tiền</th>
								<th width="10%">Thao tác</th>
							</tr>
							<?php $get_Sp_GioHang = $giohang->get_GioHang();
							if($get_Sp_GioHang){
								$subtotal=0;
								$sluong=0;
								while($ketqua = $get_Sp_GioHang->fetch_assoc()){
								
							?>
							<tr>
								<td><?php echo $ketqua['TenSanPham']?></td>
								<td><img src="admin/uploads/<?php echo $ketqua['image'];?>" alt="<?php echo $ketqua['TenSanPham']?>"/></td>
								<td><?php echo $fm->format_currency($ketqua['Gia'])." ". "VNĐ"; ?></td>
								<td>
									<form action="" method="post">
										<!-- <input type="hidden" name="GioHangID" min="1" value="<?php echo $ketqua['GioHangID'];?>"/> -->
										<input type="number"  onchange="updateQuan(<?php echo $ketqua['GioHangID'];?>, this.value)" 
											name="SoLuong" min="1"  value="<?php echo $ketqua['SoLuong'];?>"/>
										<!-- <input type="submit" name="submit" value="Update"/> -->
									</form>
									
								</td>
								<td><?php
								$total = $ketqua['Gia']*$ketqua['SoLuong'];
								$subtotal += $total;
								$sluong+= $ketqua['SoLuong'];
								 echo $fm->format_currency($total)." ". "VNĐ";?>
								</td>
								<td><a onclick="return confirm('Bạn có muốn xoá sản phẩm này không? ')" href="?delID=<?php echo $ketqua['GioHangID']; ?>"><button type="button" class="btn btn-danger">X</button></a></td>
							</tr>
							
								<?php }} ?>
						</table>
						<?php 
						$check_cart = $giohang->check_cart();
						if($check_cart){

						
						?>
						<table style="float:right;text-align:left;margin-top:50px;" width="40%">
							<tr>
								<th>Thành tiền : </th>
								<td><?php echo $fm->format_currency($subtotal)." ". "VNĐ" ; 
										
										  Session::set('soluong',$sluong); ?></td>
							</tr>
							<tr>
								<th>VAT (10%) : </th>
								<td><?php
								$thue = $subtotal * 0.1;
								echo $fm->format_currency($thue)." ". "VNĐ" ;
								?></td>
							</tr>
							<tr>
								<th>Tổng tiền :</th>
								<td><?php
								$tongtien= $thue + $subtotal;
								echo $fm->format_currency($tongtien)." ". "VNĐ" ;

								?></td>
							</tr>
					   </table>
					   <?php }else{
						   echo '<span class="error">Giỏ hàng trống vui lòng chọn sản phẩm </span>';} ?>
					
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img  src="images/giohang.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a  onclick = "MyTT()" href="?checkout=check_login"> <button  class="btn btn-success">Thanh Toán</button></a>
							<?php
							$check = $giohang->check_cart();
						     if($check_cart==false){
                                            echo '<script>
											function myTT() {
											  alert("Hello! I am an alert box!");
											}
											</script>
											';
											
										}else{
							?>
							<?php if (isset($_GET['checkout']) && $_GET['checkout']=='check_login'){
										$login_check = Session::get('customer_login');
										
									 
										
										if($login_check==false){
											header('Location:login.php');
										}else{
											header('Location:payoffline.php');
										}} }
							 ?>
						</div>
	
				</div>
				</div>
</div>
				
</div>					
<div class="clear">
</div>
<script>
	updateQuan = function(ghID, quan){
		const data = {
			'GioHangID' : ghID,
			'SoLuong' : quan
		}
		console.log(data)
		$.ajax({
			url: '/phong1312/views/cart.php',
			data: data,
			type: 'post',
			success : function (res){
				location.reload();
			}
		});
	}
</script>

<?php
include './inc/footer.php';
?>