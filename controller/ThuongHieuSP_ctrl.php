<?php

include_once 'database.php';
include_once 'format.php';
?>
<?php
class ThuongHieuSP_ctrl {
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_THSP($tenTHSP){
        $tenTHSP = $this->fm->validation($tenTHSP); //kiểm tra hợp lệ
        $tenTHSP = mysqli_real_escape_string($this->db->link, $tenTHSP); //kết nối với csdl
        
        
        if(empty($tenTHSP)){ //kiem tra null
            $alert = " <span class='error'>Tên thương hiệu không được bỏ trống !!</span>";
            return $alert;
        } else {
            $query = "insert into ThuongHieuSP (TenThuongHieu) values('$tenTHSP');";
            $result = $this->db->insert($query);
            
            if($result){
                $alert = "<span class='success'>Thêm thương hiệu sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Thêm thương hiệu sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
            
        
    }
    public function show_TH (){
        $query = "select * from ThuongHieuSP order by ThuongHieuID asc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_TH($tenTH,$id){
        $tenTH = $this->fm->validation($tenTH); //kiểm tra hợp lệ
        $tenTH = mysqli_real_escape_string($this->db->link, $tenTH); //kết nối với csdl
        $id = mysqli_real_escape_string($this->db->link, $id); //kết nối với csdl
        if(empty($tenTH)){ //kiem tra null
            $alert = " <span class='error'>Thương hiệu không được bỏ trống !!</span>";
            return $alert;
        } else {
            $query = "update ThuongHieuSP set TenThuongHieu = '$tenTH' where ThuongHieuID = '$id';";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Chỉnh sửa thương hiệu sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Chỉnh sửa thương hiệu sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
    }
    public function delete_TH ($id){
        $query = "DELETE FROM ThuongHieuSP WHERE ThuongHieuID = '$id'";
        $result = $this->db->delete($query);
         if($result){
                $alert = "<span class='success'>Xoá Thương hiệu sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Xoá  Thương hiệu sản phẩm thất bại !!!</span>";
                return $alert;
            }
    }
    public function getTHID($id){
        $query = "select * from ThuongHieuSP where ThuongHieuID ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
  
}


