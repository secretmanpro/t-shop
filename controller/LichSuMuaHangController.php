<?php
    include_once("Controller.php");
    class LichSuMuaHangController extends Controller{
        public function getLichSuMuaHang(){
            return $this->loadView("lich-su-mua-hang.php");
        }
    }
?>