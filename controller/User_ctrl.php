<?php

include_once 'database.php';
include_once 'format.php';
?>
<?php
class user_ctrl {
    private $db;
    private $fm;
   
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    
  
}
