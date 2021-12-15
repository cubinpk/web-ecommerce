<?php

include_once 'database.php';
include_once 'format.php';

?>
<?php
class LoaiSanPham_ctrl {
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_LSP($tenLSP){
        $tenLSP = $this->fm->validation($tenLSP); //kiểm tra hợp lệ
        $tenLSP = mysqli_real_escape_string($this->db->link, $tenLSP); //kết nối với csdl
        
        
        if(empty($tenLSP)){ //kiem tra null
            $alert = " <span class='error'>Loại sản phẩm không được bỏ trống !!</span>";
            return $alert;
        } else {
            $query = "insert into LoaiSanPham (TenLoaiSP) values('$tenLSP');";
            $result = $this->db->insert($query);
            
            if($result){
                $alert = "<span class='success'>Thêm danh mục sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Thêm danh mục sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
            
        
    }
    public function show_LSP (){
       
        $query = "select * from LoaiSanPham order by LoaiID asc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_LSP_byID ($id){
      
        $query = "SELECT * FROM `loaisanpham` WHERE loaiid = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_LSP_fontend (){
       
        $query = "select * from LoaiSanPham order by LoaiID asc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_LSP($lsp,$id){
        $Loai = $this->fm->validation($lsp); //kiểm tra hợp lệ
        $Loai = mysqli_real_escape_string($this->db->link, $Loai); //kết nối với csdl
        $id = mysqli_real_escape_string($this->db->link, $id); //kết nối với csdl
        if(empty($Loai)){ //kiem tra null
            $alert = " <span class='error'>Loại sản phẩm không được bỏ trống !!</span>";
            return $alert;
        } else {
            $query = "update LoaiSanPham set tenloaisp = '$Loai' where loaiid = '$id';";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Chỉnh sửa danh mục sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Chỉnh sửa  danh mục sản phẩm thất bại !!!</span>";
                return $alert;
            }
           
            }
    }
    public function del_LSP ($id){
        $query = "DELETE FROM LoaiSanPham WHERE LoaiID = '$id'";
        $result = $this->db->delete($query);
         if($result){
                $alert = "<span class='success'>Xoá danh mục sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class=' error'>Xoá  danh mục sản phẩm thất bại !!!</span>";
                return $alert;
            }
    }
    public function getLoaiID($id){
        
        
        $query = "select * from LoaiSanPham where loaiid='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getsp_by_LSPID($id){
        
       
        $query = "select * from SanPham where LoaiID = '$id' order by LoaiID desc";
        $result = $this->db->select($query);
        return $result;
    }
    

  
}


