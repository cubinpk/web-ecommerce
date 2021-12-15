<?php
include './inc/header.php';
include './inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Thanh toán</h3>
              </div>
              <h1>Chọn phương thức thanh toán</h1>
              <a class="payhref" href="payoffline.php"><button class="btn btn-primary">Thanh toán khi nhận hàng</button> </a>
              <a class="payhref" href="payonline.php"><button class="btn btn-primary">Thanh toán Online</button></a>
              <a class="payhref" href="cart.php"><button class="btn btn-primary">Trở về</button></a>
  			<div class="clear"></div>
  		</div>
    	
    </div>
 </div>
<?php
include './inc/footer.php';
?>