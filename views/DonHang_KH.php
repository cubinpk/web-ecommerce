<?php
include './inc/header.php';
header('refresh:3');

?>
<?php 
$dh = new DonHang_ctrl();
if (isset($_GET['id_DonHang'])){
	
	$id = $_GET['id_DonHang'];  
	$updateDH= $dh->update_NhanHang($id,2);}
?> 
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="giohang">
                    <h2>CÁC ĐƠN HÀNG CỦA BẠN</h2>
                    <div class="cartpage p-4">
                   
						<table class="tblone">
							<tr>
								<th width="5%">Mã HD</th>
								<th width="10%">Tên khách hàng</th>
								<th width="15%">Ngày đặt</th>
								<th width="30%">Địa chỉ</th>
								<th width="10%">Tổng tiền</th>
                                <th width="20%">Tình trạng</th>
                                <th width="10%">Thao tác</th>
							</tr>
                            <?php 
                            
                           $idkh = Session::get('customer_id');
                           $get_Sp = $dh->get_DonHang($idkh);
                           if($get_Sp){
                               while($ketqua=$get_Sp->fetch_assoc()){

                        
							?>
							<tr>
								<td class="mau"><?php echo $ketqua['SoHD']?></td>
								<td class="mau"><?php echo $ketqua['TenKhachHang'];?></td>
                                <td class="mau"><?php echo $fm->formatDate($ketqua['NgayHD'])?></td>
                                <td class="mau"><?php echo $ketqua['DiaChi']?></td>
                                <td class="mau"><?php echo $fm->format_currency($ketqua['TongTien'])." ". "VNĐ"; ?></td>
                                <td class="mau"><?php
                                     if($ketqua['GiaoHang']=='0'){
                                         echo "Chờ xử lý";
                                     }elseif($ketqua['GiaoHang']=='1'){
                                         echo "<span class='error'>Đang Giao Hàng</span>";
                                     }else{
                                        echo "<span class='success'>Đã nhận</span>";
                                     }?>
                                </td>
                                
                                    <?php 
                                    if($ketqua['GiaoHang']=='0'){
                                    ?>
                               <td class="mau"><?php echo "N/A"; ?></td>
                                    <?php }elseif($ketqua['GiaoHang']=='1'){?>
                                <td class="mau"><a href="?id_DonHang=<?php echo $ketqua['SoHD']; ?>"><button class="btn btn-primary">Nhận Hàng</button></a></td>
                                    <?php }else { ?>
                                <td class="success mau"><?php echo "Thành công"; ?></td>

                                   <?php } ?>
								
								
                            </tr>
                            <?php }} ?>
                      
                        </table>
                    </div>
					</div>
            </div>	
       <div class="clear"></div>
    </div>
 </div>
<?php
include './inc/footer.php';
?>