<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../../controller/LoaiSanPham_ctrl.php'?>
<?php include '../../controller/SanPham_ctrl.php'?>
<?php include '../../controller/ThuongHieuSP_ctrl.php'?>

<?php 
$sp = new SanPham_ctrl();
    
    if (isset($_GET['delID'])){
      echo"<script>window.location=productlist.php</script>";
      $id = $_GET['delID'];  
      $xoasp= $sp->del_SP($id);
     
}
?>
     
    <div class="card shadow  col p">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Sản Phẩm</h6>
                
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách sản phẩm</h2> 
                    <div class="block">  
                        <table class="data display datatable m-auto" id="example">
                            <thead>
                                <tr>
                                    <th width = "5%">ID</th>
                                    <th width = "15%">Tên</th>
                                    <th width = "5%">Loại</th>
                                    <th width = "10%">Thương hiệu</th>
                                    <th width = "5%">Tình trạng</th>
                                    <th width = "15%">Gía</th>
                                    <th width = "15%">Hình</th>
                                    <th width = "15%">Thao Tác</th>
                                                        
                                </tr>
                            </thead>
                            <tbody>
                                            <?php $sp = new SanPham_ctrl();
                                            $listsp;
                                            if(isset($_POST['tensp'])){
                                                $listsp = $sp->show_SP_admin_Tensp($_POST['tensp']);
                                            } else {
                                                $listsp = $sp->show_SP_admin();
                                            }
                                                if($listsp){
                                                
                                                    $i=0;
                                                    while($resultt = $listsp->fetch_assoc()){
                                                    $i++;
                                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i;?></td>
                                                        <td><?php echo $resultt['TenSanPham']?></td>
                                                        <td><?php echo $resultt['TenLoaiSP']; ?></td>
                                                        <td><?php echo $resultt['TenThuongHieu']; ?></td>
                                    <td><?php if($resultt['TinhTrang']==0){
                                                                        echo 'Mặc định';}
                                                                else if($resultt['TinhTrang']==1){
                                                                        echo 'Nổi bật';}
                                                                        else{
                                                                        echo 'Sản phẩm mới';
                                                                        }
                                                                ?></td>
                                    <td><?php echo $resultt['Gia']; ?></td>
                                                        <td><img width="150px" height="150px" src="uploads/<?php echo $resultt['image'];?>"/></td>
                                    <td><a href="productedit.php?SPID=<?php echo $resultt['SanPhamID'];?>"><button type="button" class="btn btn-success">Sửa</button></a> || 
                                    <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không? ')" href="?delID=<?php echo $resultt['SanPhamID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a></td>
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
        setupLeftMenu();
        $('#example').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
