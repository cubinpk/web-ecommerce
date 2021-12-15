<?php

class SanPham{
    private $SanPhamID ;
    private $TenSanPham;
    private $LoaiID;
    private $ThuongHieuID;
    private $TinhTrang;
    private $MoTa;
    private $Gia;
    private $Image;
    function getSanPhamID() {
        return $this->SanPhamID;
    }

    function getTenSanPham() {
        return $this->TenSanPham;
    }

    function getLoaiID() {
        return $this->LoaiID;
    }

    function getThuongHieuID() {
        return $this->ThuongHieuID;
    }

    function getTinhTrang() {
        return $this->TinhTrang;
    }

    function getMoTa() {
        return $this->MoTa;
    }
    function getGia() {
        return $this->Gia;
    }
    function getImage() {
        return $this->Image;
    }

    function setLoaiID($LoaiID) {
        $this->LoaiID = $LoaiID;
    }

    function setTenSanPham($TenSanPham) {
        $this->TenSanPham = $TenSanPham;
    }

    function setSanPhamID($SanPhamID) {
        $this->SanPhamID = $SanPhamID;
    }

    function setThuongHieuID($ThuongHieuID) {
        $this->ThuongHieuID = $ThuongHieuID;
    }

    function setTinhTrang($TinhTrang) {
        $this->TinhTrang = $TinhTrang;
    }

    function setMoTa($MoTa) {
        $this->MoTa = $MoTa;
    }
    function setGia($Gia) {
        $this->Gia = $Gia;
    }
    function setImage($Image) {
        $this->Image = $Image;
    }

    
}
