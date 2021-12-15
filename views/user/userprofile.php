<html>

<head>
    <title>Thông tin tài khoản</title>
    <?php
include '../../controller/session.php';

?>
    <?php 

include '../inc/header.php';?>
<?php include '../inc/sidebar.php';?>
</head>
<body>

<?php 
$khach = new KhachHang_ctrl();
if(isset($_GET['khachhangid'])){
    $idd =  $_GET['khachhangid'];
    $get_kh = $khach->show_KH($idd);
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
                               
                              
                               if($get_kh){
                                   while ($resultt = $get_kh->fetch_assoc()){
                               ?>
 
  <!-- Modal -->

<div class="col-12">
  <div class="form-group row">
    <label for="FullName" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Họ và tên :</strong></label>
    <div class="col-sm-4">
    <input id="Email" type="text" readonly="" class="form-control Email" name="Email" value= <?php echo $resultt['TenKhachHang'];?>>
    </div>
  </div>

  <div class="form-group row">
    <label for="Email" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>SDT :</strong></label>
    <div class="col-sm-4">
      <input id="Email" type="text" readonly="" class="form-control Email" name="Email" value=<?php echo $resultt['SDT'];?>>
    </div>  
  </div>


  <div class="form-group row">
    <label for="Phone" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Địa chỉ:</strong></label>
    <div class="col-sm-4">
      <input id="Phone" type="text" readonly="" class="form-control Phone" name="Phone" value=<?php echo $resultt['DiaChi'];?>>
      <div class="PhoneError invalid-feedback">
        Số điện thoại không thể sửa!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="Address" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Email:</strong></label>
    <div class="col-sm-4">
      <input id="Address" type="text" readonly="" class="form-control Address" name="Address" value=<?php echo $resultt['Email'];?>>
      <div class="AddressError invalid-feedback">
        Địa chỉ không thể trống!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="City" class="col-sm-4 col-form-label d-flex justify-content-center"><strong>Địa phương:</strong></label>
    <div class="col-sm-4">
      <input id="City" type="text" readonly="" class="form-control City" name="City" value=<?php echo $resultt['DiaPhuong'];?>>
      <div class="CityError invalid-feedback">
        Tỉnh/ thành phố không thể trống!!
      </div>
    </div>
  </div>


  
  <?php }} ?>
  </form>
  </div>
  </div>
  </div>
  </div>
</div>

<?php include '../admin/inc/footer.php';?>