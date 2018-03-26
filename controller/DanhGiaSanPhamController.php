<?php
    include_once("Controller.php");
    class DanhGiaSanPhamController extends Controller{
        public function getDanhGiaSanPham(){
            check_user_login();
            return $this->loadView("danh-gia-san-pham.php");
        }
    }
?>