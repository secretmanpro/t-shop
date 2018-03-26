<?php
    include_once("function/function.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
    // header("Location:chi-tiet-san-pham.php?url={$_SESSION['url']}");
    header("Location:chi-tiet-san-pham.php?url={$_SESSION['url']}");
    
    $_SESSION["mess"] = "Bạn phải đăng nhập để thực hiện chức năng này";
?>