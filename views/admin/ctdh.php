<?php ob_clean();?>
<?php 
spl_autoload_register(function($className){
	include_once "../../controller/".$className.".php";
});
spl_autoload_register(function($className){
	include_once "../../model/".$className.".php";
});?>
<?php
$fm = new Format();
$dh = new DonHang_ctrl();
if(!isset($_GET['dh123'])|| $_GET['dh123']== null){
    echo"<script>window.location=inbox.php</script>";

  
} else {
     $sohd= $_GET['dh123'];
}


?>
<style>.chu {
    font-size: 15px;
    font-weight: bold;
}</style>
<?php
if(isset($_GET['dh123'])){
    $get_kh = $dh->show_info_cus($sohd);
   if($get_kh){
  
   while($kq = $get_kh->fetch_assoc()){
  
   ?>
<div>
    Số Hoá Đơn &ensp; &ensp; &nbsp; : <span class="chu"><?php echo $sohd ;?></span> <br>
    Tên Khách Hàng : <span class="chu"><?php echo $kq['TenKhachHang']?></span> <br>
    SDT  &ensp; &ensp; &nbsp;&nbsp; &ensp; &ensp; &ensp; &nbsp;&nbsp;  : <span class="chu"><?php echo $kq['SDT']?></span> <br>
    Địa chỉ  &ensp; &ensp; &nbsp; &nbsp; &ensp; &ensp; :  <span class="chu"><?php echo $kq['DiaChi']?></span> <br>
    <hr>
</div>
<?php }}} ?> 
    
                
                   
                        <table class="data display datatable" id="example">
                            <thead>
                                <tr>
									<th width="10%">STT</th>
									<th width="10%">MSP</th>
									<th  width="20%">Tên sản phẩm</th>
                                    <th  width="10%">Hình ảnh</th>
                                    <th  width="20%">Đơn giá</th>
									<th width = "10%">Số lượng</th>
									<th width="20%">Thành tiền</th>
									
                                                        
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
                                        if(isset($_GET['dh123'])){
                                         $get_donhang = $dh->CTDH_KH_Dat($sohd);
										if($get_donhang){
										$stt=0;
										while($don = $get_donhang->fetch_assoc()){
										$stt++;
										?>
                             <tr class="odd gradeX">
									<td><?php echo $stt; ?></td>
									<td><?php echo $don['SanPhamID'];?></td>
									<td><?php echo $don['TenSanPham'];?></td>
									<td><img width="80px" height="80px"  src="uploads/<?php echo $don['image'];?>"/></td>
									<td><?php echo $fm->format_currency($don['Gia'])." VNĐ";?></td>
									<td><?php echo $don['SoLuong'];?></td>
									<td><?php echo $fm->format_currency($don['ThanhTien'])." VNĐ";?></td>
									
									
						
								</tr>
						
						<?php }}}?>
					</tbody>
				
                </table>
               <?php $tt=$dh->Get_TongTien_HoaDon($sohd);
               if($tt){
                   while($kkq=$tt->fetch_assoc()){
                ?>
                <br>
                Tổng tiền : <?php echo '<span class="success">'.$fm->format_currency($kkq['TongTien'])." VNĐ".'</span>';?>
                <?php  }}?>

               
												
   
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('#example').dataTable();
        setSidebarHeight();
    });
</script>

