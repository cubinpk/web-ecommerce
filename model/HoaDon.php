<?php
class HoaDon{
    private $SoHD;
    private $KhachHangID;
    private $NgayHD;
    private $TongTien;
    private $SID;
    private $GiaoHang;

    function getSoHD() {
        return $this->SoHD;
    }
    function setSoHD($SoHD) {
        $this->SoHD = $SoHD;
    }
    function getKhachHangID() {
        return $this->KhachHangID;
    }
    function setKhachHangID($KhachHangID) {
        $this->KhachHangID = $KhachHangID;
    }
    function getNgayHD() {
        return $this->NgayHD;
    }
    function setNgayHD($NgayHD) {
        $this->NgayHD = $NgayHD;
    }
    function getTongTien() {
        return $this->TongTien;
    }
    function setTongTien($TongTien) {
        $this->TongTien = $TongTien;
    }
    function getSID() {
        return $this->SID;
    }
    function setSID($SID) {
        $this->SID = $SID;
    }
    function getGiaoHang() {
        return $this->GiaoHang;
    }
    function setGiaoHang($GiaoHang) {
        $this->GiaoHang = $GiaoHang;
    }
    


}