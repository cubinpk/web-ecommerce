<?php

class DonHang{
    private $DonHangID ;
    private $KhachHangID;
    private $SanPhamID;
    private $SoLuong;
    private $SID;
    private $ThanhTien;
    private $NgayDatHang;
    private $GiaoHang;
    function getDonHangID() {
        return $this->DonHangID;
    }

    function getKhachHangID() {
        return $this->KhachHangID;
    }

    function getSanPhamID() {
        return $this->SanPhamID;
    }

    function getSoLuong() {
        return $this->SoLuong;
    }

    function getSID() {
        return $this->SID;
    }

    function getThanhTien() {
        return $this->ThanhTien;
    }
    function getNgayDatHang() {
        return $this->NgayDatHang;
    }
    function getGiaoHang() {
        return $this->GiaoHang;
    }

    function setDonHangID($DonHangID) {
        $this->DonHangID = $DonHangID;
    }

    function setKhachHangID($KhachHangID) {
        $this->KhachHangID = $KhachHangID;
    }

    function setSanPhamID($SanPhamID) {
        $this->SanPhamID = $SanPhamID;
    }

    function setSoLuong($SoLuong) {
        $this->SoLuong = $SoLuong;
    }

    function setSID($SID) {
        $this->SID = $SID;
    }

    function setThanhTien($ThanhTien) {
        $this->ThanhTien = $ThanhTien;
    }
    function setNgayDatHang($NgayDatHang) {
        $this->NgayDatHang = $NgayDatHang;
    }
    function setGiaoHang($GiaoHang) {
        $this->GiaoHang = $GiaoHang;
    }

    
}
