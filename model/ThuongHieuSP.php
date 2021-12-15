<?php

class ThuongHieuSP{
    private $ThuongHieuID ;
    private $TenThuongHieu;
   
    function getThuongHieuID() {
        return $this->ThuongHieuID;
    }

    function getTenThuongHieu() {
        return $this->TenThuongHieu;
    }

   

    function setThuongHieuID($ThuongHieuID) {
        $this->ThuongHieuID = $ThuongHieuID;
    }

    function setTenThuongHieu($TenThuongHieu) {
        $this->TenThuongHieu = $TenThuongHieu;
    }

    

    
}
