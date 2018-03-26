<?php

    include_once("model/GioHangModel.php");
    include_once("controller/GioHang.php");
    include_once("Controller.php");
    ob_start();
    if(!isset($_SESSION))
    session_start();
    class QuanLyGioHangController extends Controller{
        public function getQuanLyGioHang(){
            $oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
            $dataCart = new Cart($oldCart);
            // echo "<pre>";
            // print_r($dataCart);
            // echo "</pre>";
            // die;
            
            return $this->loadView("quan-ly-gio-hang.php",$dataCart);
        }
        public function OrderDonHang(){
            
        }
       
    }
?>