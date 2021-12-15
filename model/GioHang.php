<?php

class GioHang{
    private $GioHangID;
    private $SanPhamID;
    private $SID;
    private $SoLuong;
    function getGioHangID() {
        return $this->GioHangID;
    }

    function getSanPhamID() {
        return $this->SanPhamID;
    }
    function getSID() {
        return $this->SID;
    }
    function getSoLuong() {
        return $this->SoLuong;
    }

    function setGioHangID($GioHangID) {
        $this->GioHangID = $GioHangID;
    }
    function setSanPhamID($SanPhamID) {
        $this->SanPhamID = $SanPhamID;
    }
    function setSID($SID) {
        $this->SID = $SID;
    }

    function setSoLuong($SoLuong) {
        $this->SoLuong = $SoLuong;
    }
  
}
    
