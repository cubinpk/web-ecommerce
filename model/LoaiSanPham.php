<?php

class LoaiSanPham{
    private $LoaiID;
    private $TenLoaiSP;
    function getLoaiID() {
        return $this->LoaiID;
    }

    function getTenLoaiSP() {
        return $this->TenLoaiSP;
    }

    function setLoaiID($LoaiID) {
        $this->LoaiID = $LoaiID;
    }

    function setTenLoaiSP($TenLoaiSP) {
        $this->TenLoaiSP = $TenLoaiSP;
    }
  
}
    
