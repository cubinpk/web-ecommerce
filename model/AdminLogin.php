<?php

class AdminLogin{
    private $adminID ;
    private $adminName;
    private $adminEmail;
    private $adminUser;
    private $adminPass;
    private $level;
    function getAdminID() {
        return $this->adminID;
    }

    function getAdminName() {
        return $this->adminName;
    }

    function getAdminEmail() {
        return $this->adminEmail;
    }

    function getAdminUser() {
        return $this->adminUser;
    }

    function getAdminPass() {
        return $this->adminPass;
    }

    function getLevel() {
        return $this->level;
    }

    function setAdminID($adminID) {
        $this->adminID = $adminID;
    }

    function setAdminName($adminName) {
        $this->adminName = $adminName;
    }

    function setAdminEmail($adminEmail) {
        $this->adminEmail = $adminEmail;
    }

    function setAdminUser($adminUser) {
        $this->adminUser = $adminUser;
    }

    function setAdminPass($adminPass) {
        $this->adminPass = $adminPass;
    }

    function setLevel($level) {
        $this->level = $level;
    }

    
}
