<?php

include_once 'session.php';
Session::checkLogin();
include_once 'database.php';
include_once 'format.php';
?>
<?php
class AdminLogin_ctrl {
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($adUser, $adPass){
        $adminUser = $this->fm->validation($adUser); //kiểm tra hợp lệ
        $adminPass = $this->fm->validation($adPass);
        
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser); //kết nối với csdl
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //kết nối với csdl
        
        if(empty($adminUser)||empty($adminPass)){ //kiem tra null
            $alert = "User and Pass must be not empty";
            return $alert;
        } else {
            $query = "SELECT * FROM ADMIN WHERE ADMINUSER = '$adminUser' AND ADMINPASS = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            
            if($result != false){ //ket qua dung
                $value = $result->fetch_assoc(); //truyền ket qua cho $value
                Session::set('adminlogin', true);
                Session::set('adminID', $value['adminID']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);
                header('location:index.php'); //chuyen den trang index
            }else{
                $alert = "Invalid User or Pass";
                return $alert;
            }
            
        }
    }
}

