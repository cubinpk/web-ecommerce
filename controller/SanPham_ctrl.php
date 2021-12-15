<?php

include_once 'database.php';
include_once 'format.php';

?>
<?php
class SanPham_ctrl {
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_SP($data, $files){
       
        $TenSanPham = mysqli_real_escape_string($this->db->link,$data['TenSanPham']);
        $LoaiID = mysqli_real_escape_string($this->db->link, $data['LoaiID']);
        $ThuongHieuID = mysqli_real_escape_string($this->db->link, $data['ThuongHieuID']);
        $MoTa = mysqli_real_escape_string($this->db->link, $data['MoTa']);
        $Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
        $TinhTrang = mysqli_real_escape_string($this->db->link, $data['TinhTrang']);
        //kiem tra hinh anh va lay hinh anh vao folder upload
        $premited = ['jpg','jpeg','png','gif'];
       
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        
        

        
        
        if($TenSanPham ==""||$LoaiID ==""||$ThuongHieuID==""||$MoTa==""||$Gia==""||$TinhTrang==""||$file_name==""){ //kiem tra null
            $alert = " <span class='error'>Các trường không được bỏ trống !!</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO `sanpham`(`TenSanPham`, `LoaiID`, `ThuongHieuID`, `TinhTrang`, `MoTa`, `Gia`, `Image`) VALUES ('$TenSanPham','$LoaiID','$ThuongHieuID','$TinhTrang','$MoTa','$Gia','$unique_image')";
            $result = $this->db->insert($query);
            
            if($result){
                $alert = "<span class='success'>Thêm sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Thêm sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
            
        
    }
    public function show_SP (){
        $sp_tungtrang=12;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $tung_trang=($trang-1)*$sp_tungtrang;
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID order by SanPhamID ASC LIMIT $tung_trang,$sp_tungtrang";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_SP_admin (){
      
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID order by SanPhamID desc" ;
        $result = $this->db->select($query);
        return $result;
    }
    public function show_SP_admin_Tensp ($tensp){
      
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID and lower(TenSanPham) like lower('%$tensp%') " ;
        $result = $this->db->select($query);
        return $result;
    }
    public function show_phantrang_SP (){
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID order by SanPhamID asc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_SP($data,$file,$id){
         $TenSanPham = mysqli_real_escape_string($this->db->link,$data['TenSanPham']);
        $LoaiID = mysqli_real_escape_string($this->db->link, $data['LoaiID']);
        $ThuongHieuID = mysqli_real_escape_string($this->db->link, $data['ThuongHieuID']);
        $MoTa = mysqli_real_escape_string($this->db->link, $data['MoTa']);
        $Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
        $TinhTrang = mysqli_real_escape_string($this->db->link, $data['TinhTrang']);
        //kiem tra hinh anh va lay hinh anh vao folder upload
        $premited = ['jpg','jpeg','png','gif'];
       
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        
        
         if($TenSanPham ==""||$LoaiID ==""||$ThuongHieuID==""||$MoTa==""||$Gia==""||$TinhTrang==""){ //kiem tra null
            $alert = " <span class='error'>Loại sản phẩm không được bỏ trống !!</span>";
            return $alert;
        } else {
            if(!empty($file_name)){
                //nếu người dùng chọn ảnh
                if($file_size > 200000){
                    $alert = "<span class='success'>Kích cỡ hình ảnh không được lớn hơn 2MB!</span>";
                    return $alert;
                }elseif (in_array($file_ext, $premited)==false) {
                    $alert = "<span class='success'> Hình ảnh không hợp lệ </span>";
                    return $alert;
                    
                }
                 move_uploaded_file($file_temp,$uploaded_image);
                 $query = "UPDATE `sanpham` SET `TenSanPham`= '$TenSanPham',`TinhTrang`='$TinhTrang',`MoTa`='$MoTa',`Gia`='$Gia',`image`='$unique_image' WHERE SanPhamID= '$id'";
                   
            }else{
                //Nếu người dùng không chọn ảnh
                  $query = "UPDATE `sanpham` SET `TenSanPham`= '$TenSanPham',`TinhTrang`='$TinhTrang',`MoTa`='$MoTa',`Gia`='$Gia' WHERE SanPhamID= '$id'";
            }
           
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Chỉnh sửa sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Chỉnh sửa sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
    }
    
    public function del_SP ($id){
        $query = "DELETE FROM SanPham WHERE SanPhamID = '$id'";
        $result = $this->db->delete($query);
         if($result){
                $alert = "<span class='success'>Xoá sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xoá sản phẩm thất bại !!!</span>";
                return $alert;
            }
    }
    public function getSPID($id){
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID and SanPhamID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSP_Noibat (){
        $query = "SELECT * FROM SANPHAM WHERE TINHTRANG  = 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSP_Noibat_search ($ten){
        $query = "SELECT * FROM SANPHAM WHERE TINHTRANG  = 1 and lower(TenSanPham) like lower('%$ten%')";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSP_Moi (){
        $query = "SELECT * FROM SANPHAM WHERE TINHTRANG  = 2";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSP_Moi_search ($ten){
        $query = "SELECT * FROM SANPHAM WHERE TINHTRANG  = 2 and lower(TenSanPham) like lower('%$ten%')";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSP_search ($ten){
        $query = "SELECT * FROM SANPHAM WHERE lower(TenSanPham) like lower('%$ten%')";
        $result = $this->db->select($query);
        return $result;
    }
    public function getTT_SP($id){
        $query = "select * from SanPham sp , loaisanpham lsp, thuonghieusp th where sp.LoaiID = lsp.LoaiID and sp.ThuongHieuID = th.ThuongHieuID and sanphamID='$id'";
        $result=$this->db->select($query);
        return $result;
    }  
    public function Dem_SanPham(){
        $query = "select count(SanPhamID) as sp from SanPham";
        $result = $this->db->select($query);
        return $result;
    }
   
}



