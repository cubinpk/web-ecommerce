<?php
class CTHD{
    private $SoHD;
    private $SanPhamID;
    private $SoLuong;
    private $ThanhTien;

    function getSoHD() {
        return $this->SoHD;
    }
    function setSoHD($SoHD) {
        $this->SoHD = $SoHD;
    }
    function getSanPhamID() {
        return $this->SanPhamID;
    }
    function setSanPhamID($SanPhamID) {
        $this->SanPhamID = $SanPhamID;
    }
    function getSoLuong() {
        return $this->SoLuong;
    }
    function setSoLuong($SoLuong) {
        $this->SoLuong = $SoLuong;
    }
    function getThanhTien() {
        return $this->ThanhTien;
    }
    function setThanhTien($ThanhTien) {
        $this->ThanhTien = $ThanhTien;
    }


}