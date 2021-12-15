<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../controller/ThuongHieuSP_ctrl.php'?>;
<?php 
     $thuonghieu = new ThuongHieuSP_ctrl();
    if (isset($_GET['delID'])){
      echo"<script>window.location=catlist.php</script>";
      $id = $_GET['delID'];  
      $xoaTH= $thuonghieu->delete_TH($id);
     
}

        
?>
    <div class="card shadow  col p">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Thương Hiệu</h6>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách Thương Hiệu</h2>
                <div class="block"> 
                    <?php if(isset($xoaTH)){
                        echo $xoaTH ;
                    }?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Tên danh mục</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
               <?php $hienthi  = $thuonghieu->show_TH();
                  if($hienthi){
                  $i=0;
                  while ($result= $hienthi->fetch_assoc()){
                  $i++;
                                                            
              ?> 
                  <tr class="">
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $result['TenThuongHieu']; ?></td>
                    <td><a href="brandedit.php?THID=<?php echo $result['ThuongHieuID']; ?>"><button type="button" class="btn btn-success">Sửa</button></a> || <a onclick="return confirm('Bạn có muốn xoá danh mục này không? ')" href="?delID=<?php echo $result['ThuongHieuID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
                  </tr>
              <?php }}?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
    </div>
       
<script type="text/javascript">
	$(document).ready(function () {
	    // setupLeftMenu();

	    $('#example').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

