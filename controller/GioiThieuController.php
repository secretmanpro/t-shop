<?php
    include_once("Controller.php");
    class GioiThieuController extends Controller{
        public function getGioiThieu(){
            return $this->loadView("gioi-thieu.php");
        }
    }
?>