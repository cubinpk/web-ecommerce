<?php 

include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$khach = new KhachHang_ctrl();
if(isset($_GET['khachhangid'])){
    $idd =  $_GET['khachhangid'];
    $get_kh = $khach->show_KH($idd);
}
if(isset($_POST['xacnhan'])){
  $diachi =  $_POST['Phone'];
  $capnhat = $khach->update_kh_dc($diachi,$_GET['khachhangid']);
 
}
?>









<div class="card shadow  col p">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Khách Hàng</h6>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thông tin khách hàng</h2>
                    <div class="block">  

<form class="row" method="POST" enctype="multipart/form-data">


  

  <!-- Button trigger modal -->
  
  <?php
                               if(isset($capnhat)){
                                 echo $capnhat;
                                 header('Location:inbox.php');
                               }
                              
                               if($get_kh){
                                   while ($resultt = $get_kh->fetch_assoc()){
                               ?>
 
  <!-- Modal -->

<div class="col-12">
  <div class="form-group row">
    <label for="FullName" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Họ và tên :</strong></label>
    <div class="col-sm-4">
    <input  type="text" readonly="" class="form-control " name="Email" value= "<?php echo $resultt['TenKhachHang'];?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Email" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>SDT :</strong></label>
    <div class="col-sm-4">
      <input id="Email" type="text" readonly="" class="form-control Email" name="Email" value="<?php echo $resultt['SDT'];?>">
    </div>  
  </div>


  <div class="form-group row">
    <label for="Phone" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Địa chỉ:</strong></label>
    <div class="col-sm-4">
      <input  type="text" class="form-control "  maxlength="100px" name="Phone" value="<?php echo $resultt['DiaChi'];?>">
     
    </div>
  </div>


  <div class="form-group row">
    <label for="Address" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Email:</strong></label>
    <div class="col-sm-4">
      <input id="Address" type="text" readonly="" class="form-control Address" name="Address" value="<?php echo $resultt['Email'];?>">
      <div class="AddressError invalid-feedback">
        Địa chỉ không thể trống!!
      </div>
    </div>
  </div>


                  <div class=" m-auto"><span> <input class="btn btn-success" type="submit" name="xacnhan" value="Xác nhận"/>
 
  
  <?php }} ?>
  </form>
                    <a href="inbox.php"><button type="button" class="btn btn-primary">Quay lại</button></a></div></span>
  </div>
  </div>
  </div>
  </div>
</div>














        <!-- <div class="grid_10">
            <div class="box round first grid">
                
                <div class="block">               
                <div class="">
                            <table class="tblone">
                                <?php
                               
                              
                                if($get_kh){
                                    while ($resultt = $get_kh->fetch_assoc()){
                                ?>
                                <tr>
                                    <td>Tên</td>
                                    <td>:</td>
                                    <td><?php echo $resultt['TenKhachHang'];?></td>
                                </tr>
                                <tr>
                                    <td>SDT</td>
                                    <td>:</td>
                                    <td><?php echo $resultt['SDT'];?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>:</td>
                                    <td><?php echo $resultt['DiaChi'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $resultt['Email'];?></td>
                                </tr>
                                <tr>
                                    <td>Tỉnh/ Thành phố</td>
                                    <td>:</td>
                                    <td><?php echo $resultt['DiaPhuong'];?></td>
                                </tr>
                                <?php }} ?>

                            </table>
                
            </div> 
                </div>
            </div>
        </div> -->
<?php include 'inc/footer.php';?>