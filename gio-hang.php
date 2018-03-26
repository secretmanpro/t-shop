<?php
    include_once("controller/GioHangController.php");
    $c = new GioHangController;
    $action = isset($_POST["action"])?$_POST["action"]:"addItem";
    if($action == "updateItem"){
        return $c->CapNhatGioHang();
    }
    elseif($action == "deleteItem"){
        return $c->XoaGioHang();
    }
    else{
        return $c->ThemGioHang();
    }
   
?>