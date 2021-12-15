
<?php include 'inc/header.php';?>

<?php include 'inc/sidebar.php';?>
<?php 

if (isset($_GET['id_DonHang_giao'])){
	
	$id1 = $_GET['id_DonHang_giao'];  
	$updateDH= $dh->update_NhanHang($id1,1);
	header('location:inbox.php');
	}

if (isset($_GET['id_DonHang_huy'])){
	
	$id2 = $_GET['id_DonHang_huy'];  
	$updateDH= $dh->update_NhanHang($id2,0);
	header('location:inbox.php');}

if (isset($_GET['id_DonHang_xoa'])){
	
	$id3 = $_GET['id_DonHang_xoa'];  
	$updateDH= $dh->DonHang_Xoa($id3);
	header('location:inbox.php');}
?>


		
      
    <div class="card shadow  col p not-print">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Đơn Hàng</h6>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách đơn hàng</h2>
                    <div class="block">  
                        <table class="data display datatable" id="example">
                            <thead>
                                <tr>
									<th width="5%">STT</th>
									<th width="10%">Mã ĐH</th>
									<th  width="10%">Ngày</th>
									<th  width="10%">SĐT</th>
									<th  width="10%">Tổng tiền</th>
									<th  width="15%">Tên khách hàng</th>
									<th  width="15%">Trạng thái</th>
									<th  width="25%">Thao tác</th>

									
												
                                                        
                                </tr>
                            </thead>
                            <tbody>
										<?php $get_donhang = $dh->DonHang_KH_Dat();
										if($get_donhang){
										$stt=0;
										while($don = $get_donhang->fetch_assoc()){
										$stt++;
										?>
										
                               <tr class="odd gradeX">
									<td><?php echo $stt; ?></td>
									<td><a  class="ctdhclick" href="" data-toggle="modal" data-target="#cthd" ><?php echo $don['SoHD'];?></a></td>
									<td><?php echo $don['NgayHD'];?></td>
									<td><?php echo $don['SDT'];?></td>
									<td><?php echo $fm->format_currency($don['TongTien'])."VNĐ";?></td>
									<td><a  href="info_custom.php?khachhangid=<?php echo $don['KhachHangID'];?>"><button type="button" class="btn btn-info"><?php echo $don['TenKhachHang'];?></button></a></td>
									<td><?php
											if($don['GiaoHang']=='0'){
												echo "<span class='error'>Chờ xử lý</span>";
											}elseif($don['GiaoHang']=='1'){
												echo "Đang Giao Hàng....";
											}else{
												echo "<span class='success'>Khách đã nhận</span>";
											}?>
									</td>
									 <?php 
											if($don['GiaoHang']=='0'){
											?>
										<td><a href="?id_DonHang_giao=<?php echo $don['SoHD']; ?>"><button class="btn btn-success">Giao Hàng</button></a></td>
											<?php }elseif($don['GiaoHang']=='1'){?>
										<td><a href="?id_DonHang_huy=<?php echo $don['SoHD']; ?>"><button class="btn btn-primary">Huỷ giao</button></a> || <a href="?id_DonHang_xoa=<?php echo $don['SoHD']; ?>"><button class="btn btn-danger">Xoá đơn</button></a></td>
										
											<?php }else { ?>
										<td><a onclick="return confirm('Bạn có muốn xoá hoá đơn này không? ')" href="?id_DonHang_xoa=<?php echo $don['SoHD']; ?>"><button class="btn btn-primary">Xoá</button></a></td>

										<?php } ?>
									
						
								</tr>
								<script type="text/javascript">
									$(document).ready(function () {
										
										$(".ctdhclick").click(function(){
										   var idd = $(this).text();
											$.get("ctdh.php", {dh123: idd }, function(data){
												$("#chitietdonhang").html(data);
													});	
											
										});
									});
										
								
										</script>
						
						<?php }}?>
					</tbody>
				
				</table>
				
               </div>
            </div>
        </div>
		</div>
		<div class="container-fluid">
								<div class="col-lg-12">
									
									<div class="fade modal" id="cthd">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header not-print">
													<h1>Chi tiết hoá đơn</h1>
												</div>
												
												<div  class="modal-body print">
												<div id="chitietdonhang"></div>
												</div>

												<div class="modal-footer not-print">
													<button  class="btn btn-success" onclick="print()">Print</button>
													<button  class="btn btn-primary" data-dismiss="modal" >Close</button>
												</div>
											</div>
										</div>
									</div>
								
								</div>
								</div>
								
												
		
	


<?php include 'inc/footer.php';?>
