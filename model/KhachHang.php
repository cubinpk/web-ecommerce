<?php

class KhachHang{
    private $KhachHangID;
    private $TenKhachHang;
    private $SDT;
    private $Password;
    private $DiaChi;
    private $DiaPhuong;
    private $Email;
    function getKhachHangID() {
        return $this->KhachHangID;
    }

    function getTenKhachHang() {
        return $this->TenKhachHang;
    }
    function getSDT() {
        return $this->SDT;
    }
    function getPassword() {
        return $this->Password;
    }
    function getDiaChi() {
        return $this->DiaChi;
    }
    function getDiaPhuong() {
        return $this->DiaPhuong;
    }
    function getEmail() {
        return $this->Email;
    }

    function setKhachHangID($KhachHangID) {
        $this->KhachHangID = $KhachHangID;
    }
    function setTenKhachHang($TenKhachHang) {
        $this->TenKhachHang = $TenKhachHang;
    }
    function setSDT($SDT) {
        $this->SDT = $SDT;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }
    function setDiaChi($DiaChi) {
        $this->DiaChi = $DiaChi;
    }
    function setDiaPhuong($DiaPhuong) {
        $this->DiaPhuong = $DiaPhuong;
    }
    function setEmail($Email) {
        $this->Email = $Email;
    }
  
}
    
