<?php
ob_start();
include_once 'database.php';
include_once 'format.php';

?>
<?php
class Cart_ctrl{
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function check_cart_mua ($idsp){
        $sid = session_id();
        $query="SELECT * FROM GIOHANG where SanphamID = '$idsp' and sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_GioHang_muaTrung($sl, $spid){
        $sid = session_id();
        $sl = mysqli_real_escape_string($this->db->link, $sl); //kết nối với csdl
        $spid = mysqli_real_escape_string($this->db->link, $spid); //kết nối với csdl
            $query = "update GioHang set soluong = soluong + '$sl' where SanPhamID = '$spid' and sid = '$sid' ;";
            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            }
            
            }
    public function insert_GioHang($sl, $id){
        $sl = $this->fm->validation($sl);
        $sl = mysqli_real_escape_string($this->db->link,$sl);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sid = session_id();
    
      
       
       
        
        $ins_GH = "INSERT INTO `giohang`(`SanPhamID`, `SID`, `SoLuong`) VALUES ('$id','$sid','$sl')";
        $ketqua = $this->db->insert($ins_GH);
     
        if($ketqua){
            header('Location:cart.php');
        }else{
            $alert = "<span class=' error'>lỗi rồi nè!!!</span>";
            return $alert;
        }
       
    }
    public function get_GioHang(){
        $sid = session_id();
        $query="SELECT * FROM GIOHANG gh inner join sanpham sp on gh.SanPhamID  = sp.SanPhamID WHERE sid='$sid'";
        $result = $this->db->select($query);
        return $result;

    }
    public function update_GioHang($sl, $id){
        
        $sl = mysqli_real_escape_string($this->db->link, $sl); //kết nối với csdl
        $id = mysqli_real_escape_string($this->db->link, $id); //kết nối với csdl
            $query = "update GioHang set soluong = '$sl' where GioHangID = '$id';";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Chỉnh sửa số lượng thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Chỉnh sửa số lượng  thất bại !!!</span>";
                return $alert;
            }
           
            }
    public function del_GioHang ($id){
                $query = "DELETE FROM GioHang WHERE GioHangID = '$id'";
                $result = $this->db->delete($query);
                 if($result){
                        $alert = "<span class='success'>Xoá sản phẩm thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class=' error'>Xoá sản phẩm thất bại !!!</span>";
                        return $alert;
                    }
            }
    public function check_cart(){
        $sid = session_id();
        $query = "select * from giohang where sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    } 
    public function del_all_cart(){
        $sid = session_id();
        $query = "delete from giohang where sid = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }    
    public function insert_order($customID,$tien)    {
        $sid = session_id();
        $sohdd = rand();
        $query2= "INSERT INTO `hoadon`(`SoHD`,`KhachHangID`,`NgayHD`,`TongTien`,`SID`) VALUES ('$sohdd','$customID',NOW(),'$tien','$sid')";
        $hoadon= $this->db->insert($query2);
      
        if($hoadon){
            
                   
            $query3="SELECT * FROM GIOHANG gh inner join sanpham sp on gh.SanPhamID  = sp.SanPhamID WHERE sid='$sid'";
            $get_gh=$this->db->select($query3);
                            if($get_gh){
                                while($result2= $get_gh->fetch_assoc()){
                                $spid = $result2['SanPhamID'];
                                $sl = $result2['SoLuong'];
                                $thanhtien = $sl * $result2['Gia'];
                                $ins_DH = "INSERT INTO `cthd`(`SoHD`,`SanPhamID`,`SoLuong`,`ThanhTien`) VALUES ('$sohdd','$spid','$sl','$thanhtien')" ;
                                $this->db->insert($ins_DH);}
                            }
                            
                          
             
            }
        
    }  
  
  
}

            

    
  



