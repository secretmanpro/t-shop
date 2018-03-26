<?php
    include_once("function/function.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_SESSION["maNguoiDung"]) && isset($_SESSION["tendn"])){
        unset($_SESSION["maNguoiDung"]);
        unset($_SESSION["tendn"]);
        if(isset($_COOKIE["tendn"]) && isset($_COOKIE["maNguoiDung"])){
            setcookie("maNguoiDung",'');
            setcookie("tendn",'');
            $_SESSION["mess"] = "Đăng xuất thành công";
            header("Location:index.php");
         
        }
      
    $_SESSION["mess"] = "Đăng xuất thành công";
    header("Location:index.php");
    }
?>