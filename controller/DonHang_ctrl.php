<?php
ob_start();
include_once 'database.php';
include_once 'format.php';

?>
<?php
class DonHang_ctrl{
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function get_DonHang($cusid){
      
        $query="SELECT * FROM hoadon hd inner join khachhang kh on hd.khachhangid  where kh.khachhangid= '$cusid' order by ngayhd desc";
        $result = $this->db->select($query);
        return $result;

    }
    public function get_NgayDatHang ($cusid){
        $cusid = mysqli_real_escape_string($this->db->link, $cusid);
        $query="SELECT DISTINCT(NgayHD) FROM HoaDon where KhachHangid='$cusid' ";
        $result = $this->db->select($query);
        return $result;

    }
    public function update_NhanHang ($id,$sl){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query="update hoadon set GiaoHang = '$sl' where sohd= '$id' ";
        $result = $this->db->update($query);
        return $result;

    }
    public function DonHang_KH_Dat (){
        $query="SELECT * FROM hoadon hd inner join khachhang kh on hd.khachhangid  = kh.khachhangid ";
        $result = $this->db->select($query);
        return $result;
    }
    public function DonHang_Xoa ($id){
        $query="DELETE FROM hoadon WHERE sohd = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function CTDH_KH_Dat ($sohd){
        $query="SELECT * FROM CTHD CT inner join sanpham sp on CT.SanPhamID = sp.SanPhamID where sohd  = '$sohd' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function Get_TongTien_HoaDon ($SoHD){
        $query="SELECT TongTien FROM HoaDon  where sohd  = '$SoHD' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function DoanhThu (){
        $query="SELECT Sum(TongTien) as tien FROM HoaDon  where GiaoHang= 2 group by giaohang ";
        $result = $this->db->select($query);
        return $result;
    }
    public function Dem_DonHangMoi(){
        $query = "select count(SoHD) as HD from HoaDon Where GiaoHang = 0 or  GiaoHang = 1 group by GiaoHang";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_info_cus($id){
        $query = "select * from HOADON HD INNER JOIN KHACHHANG KH WHERE HD.KHACHHANGID = KH.KHACHHANGID AND SOHD = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_info_ad($id){
        $query = "select * from HOADON HD INNER JOIN admin ad WHERE HD.adminid = ad.adminid AND SOHD = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

   
    }

            

    
  



