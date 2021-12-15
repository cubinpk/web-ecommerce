<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
     $loaiSP = new LoaiSanPham_ctrl();
   
    if (isset($_GET['delID'])){
      echo "<script>window.location=catlist.php</script>";
      $id= $_GET['delID'] ;
      $xoalsp= $loaiSP->del_LSP($id);
     
}

        
?>
     <div class="card shadow  col p">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Loại Sản Phẩm</h6>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách loại sản phẩm</h2>
                <div class="card-body"> 
                    <?php if(isset($xoalsp)){
                        echo $xoalsp ;
                    }?>
                    <table class="display w-100 m-auto" id="example">
					<thead>
						<tr>
							<th >Số thứ tự</th>
							<th >Tên danh mục</th>
							<th >Thao tác</th>
						</tr>
					</thead>
					<tbody>
                                            <?php   $hienthi  = $loaiSP->show_LSP();
                                                     if($hienthi){
                                                        $i=0;
                                                        while ($result= $hienthi->fetch_assoc()){
                                                        $i++;
                                                    ?> 
                                                        <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['TenLoaiSP']; ?></td>
                                                                <td><a href="catedit.php?loaispID=<?php echo $result['LoaiID'];?>"><button type="button" class="btn btn-success">Sửa</button></a> || <a 
                                                                        onclick="return confirm('Bạn có muốn xoá danh mục này không? ')" href="?delID=<?php echo $result['LoaiID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
                                                        </tr>
                                                  <?php }} ?>

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
<?php include 'inc/footer.php'; ?>

