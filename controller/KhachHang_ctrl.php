<?php
include_once 'database.php';
include_once 'format.php';


?>
<?php
class KhachHang_ctrl{
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_KhachHang($data){
        $TenKhachHang = mysqli_real_escape_string($this->db->link,$data['TenKhachHang']);
        $Password = mysqli_real_escape_string($this->db->link, $data['Password']);
        $SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
        $DiaChi = mysqli_real_escape_string($this->db->link, $data['DiaChi']);
        $DiaPhuong = mysqli_real_escape_string($this->db->link, $data['DiaPhuong']);
        $Email = mysqli_real_escape_string($this->db->link, $data['Email']);

        
        
        if($TenKhachHang ==""||$Password ==""||$SDT==""||$DiaChi==""||$DiaPhuong==""||$Email==""){ //kiem tra null
            $alert = " <span class='error'>Các trường không được bỏ trống !!</span>";
            return $alert;
        } else{
            $check_email="select * from khachhang where email = '$Email' LIMIT 1";
            $result_email = $this->db->select($check_email);
            if($result_email){
                $alert1= "<span class='error'>Email đã tồn tại vui lòng nhập lại !</span>";
                return $alert1;
            }else {
           
                $query = "INSERT INTO `KhachHang`(`TenKhachHang`, `Password`, `SDT`, `DiaChi`, `DiaPhuong`, `Email`) VALUES ('$TenKhachHang','$Password','$SDT','$DiaChi','$DiaPhuong','$Email')";
                $result = $this->db->insert($query);
                
                if($result){
                    $alert = "<span class='success'>Tạo tài khoản thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class=' error'>Tạo tài khoản thất bại !!!</span>";
                    return $alert;
                    }
                }
            }
        }
        public function login_KhachHang ($data){
            $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
            $Password = mysqli_real_escape_string($this->db->link, $data['Password']);
            if(empty($Email)|| empty($Password)){ //kiem tra null
                $alert = " <span class='error'>Vui lòng nhập đầy đủ !! !!</span>";
                return $alert;
            } else{
                $check_user="select * from khachhang where email = '$Email' and password = '$Password' ";
                $result_user = $this->db->select($check_user);
                if($result_user != false){
                    $value = $result_user->fetch_assoc();
                   
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['KhachHangID']);
                    Session::set('customer_name',$value['TenKhachHang']);
                   
                    header("Location:index.php");
                }else {
                    $alert="<span class='error'>Email hoặc mặt khẩu không đúng nè !!</span>";
                    return $alert;
               
                   
                    }
                }
        }
        public function show_KH ($id){
            $query = "select * from KhachHang where KhachHangID= '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function Dem_KhachHang(){
            $query = "select count(KhachHangID) as kh from KhachHang ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_kh_dc($DiaChi,$id){
            
            $DiaChi = mysqli_real_escape_string($this->db->link, $DiaChi); //kết nối với csdl
            $id = mysqli_real_escape_string($this->db->link, $id); //kết nối với csdl
            if(empty($DiaChi)){ //kiem tra null
                $alert = " <span class='error'>Địa chỉ không được bỏ trống !!</span>";
                return $alert;
            } else {
                $query = "update KhachHang set DiaChi = '$DiaChi' where KhachHangID = '$id';";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Xác nhận thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Xác nhận thất bại !!!</span>";
                    return $alert;
                }
               
                }
        }

       
        
    
    }

            

    
  



