<?php
include './inc/header.php';
include_once '../controller/SanPham_ctrl.php';
include_once '../controller/LoaiSanPham_ctrl.php';

?>
<?php 
$spp= new SanPham_ctrl();
$loaisp = new LoaiSanPham_ctrl();
if(isset($_GET['DatHangID']) && $_GET['DatHangID']== 'DatHang'){
	$customID = Session::get('customer_id');
	$ttien = Session::get("TongTien");
    $insert_order = $giohang->insert_order($customID,$ttien);
	$del = $giohang->del_all_cart();
	header('Location:success.php');
}
?>


<div class="container-fluid">
	<div class="col-lg-12 col-md-12 col-xs-12">
		
		<div class="fade modal" id="MyModal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h1>Chọn phương thức thanh toán</h1>
					</div>
					
					<div class="modal-body">
					<a href="?DatHangID=DatHang" ><button class="btn btn-warning bt">Thanh toán khi nhận hàng</button></a>
						<br>
						<br>
						<button class="btn btn-success bt">Thanh toán bằng tài khoản ngân hàng</button>
						
					</div>

					<div class="modal-footer">
						<button  class="btn btn-primary" data-dismiss="modal" >Close</button>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	 </div>

 <div class="container-fluid">
	 <br>
	 
 <h1>Thông tin đơn hàng</h1>
    <div class="row">
        
     
       

        
            <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-4 box_ex">
           
					
					<?php  if(isset($updateSL)){
						echo $updateSL;
						}?>
						
						<?php  if(isset($xoaGH)){
						echo $xoaGH;
						}?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên Sản Phẩm</th>
							    
								<th width="15%">Giá</th>
								<th width="25%">Số Lượng</th>
								<th width="20%">Tổng Tiền</th>
							
							</tr>
							<?php $get_Sp_GioHang = $giohang->get_GioHang();
							if($get_Sp_GioHang){
								$subtotal=0;
								$sluong=0;
								while($ketqua = $get_Sp_GioHang->fetch_assoc()){

								
							?>
							<tr class="hangpay">
								<td><?php echo $ketqua['TenSanPham']?></td>
								
								<td><?php echo $fm->format_currency($ketqua['Gia'])." ". "VNĐ";?></td>
								<td>
                                <?php echo $ketqua['SoLuong']; ?>
								</td>
								<td><?php
								$total = $ketqua['Gia']*$ketqua['SoLuong'];
								$subtotal += $total;
								$sluong+= $ketqua['SoLuong'];
								 echo $fm->format_currency($total)." ". "VNĐ"  ;?> 
								</td>
								
							</tr>
							
								<?php }} ?>
						</table>
						<?php 
						$check_cart = $giohang->check_cart();
						if($check_cart){

						
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Thành Tiền : </th>
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
								<th>Tổng Tiền :</th>
								<td><?php
								$tongtien= $thue + $subtotal;
								Session::set('TongTien',$tongtien);
								echo $fm->format_currency($tongtien)." ". "VNĐ" ;
								

								?></td>
							</tr>
					   </table>
					   <?php }else{
						   echo '<span class="error">Giỏ hàng trống vui lòng chọn sản phẩm </span>';} ?>
					</div>
					
    
     
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 p-4 box_ex ">
                <table class="tblone">
                    <?php
                    $khach = new KhachHang_ctrl();
                    $idd =  Session::get('customer_id');
                    $get_kh = $khach->show_KH($idd);
                    if($get_kh){
                        while ($resultt = $get_kh->fetch_assoc()){
                    ?>
                    <tr class="hangpay2">
                        <td>Tên</td>
                        <td>:</td>
                        <td><?php echo $resultt['TenKhachHang'];?></td>
                    </tr>
                    <tr>
                        <td class="hangpay">SDT</td>
                        <td class="hangpay">:</td>
                        <td class="hangpay"><?php echo $resultt['SDT'];?></td>
                    </tr>
                    <tr>
                        <td class="hangpay">Địa chỉ</td>
                        <td class="hangpay">:</td>
                        <td class="hangpay"><?php echo $resultt['DiaChi'];?></td>
                    </tr>
                    <tr>
                        <td class="hangpay">Email</td>
                        <td class="hangpay">:</td>
                        <td class="hangpay"><?php echo $resultt['Email'];?></td>
                    </tr>
                    <tr>
                        <td class="hangpay">Tỉnh/ Thành phố</td>
                        <td class="hangpay">:</td>
                        <td class="hangpay"><?php echo $resultt['DiaPhuong'];?></td>
                    </tr>
                    <?php }} ?>

                </table>
                <?php if(isset($insert_order)){
                    return $insert_order;
                }?>
            </div>
		<!-- <center><a href="?DatHangID=DatHang" ><button class="btn btn-success dathang">Đặt hàng</button></a></center> -->
		<a href="#"  data-toggle="modal" data-target="#MyModal"><button class="btn btn-success dathang">Đặt hàng</button></a>
		
		
		
    </div>
	
		
	</div>
</div>
 
   
 

<?php
include './inc/footer.php';
?>
