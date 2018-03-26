<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// // Change Title Tag Version 1.5
// function ch_title($title){
//  $output = ob_get_contents();
//  if ( ob_get_length() > 0) { ob_end_clean(); }
//  $patterns = array("/<title>(.*?)<\/title>/");
//  $replacements = array("<title>$title</title>");
//  $output = preg_replace($patterns, $replacements,$output);
//  echo $output;
// }
    function redirect($location){
        header("location: ".$location);
        exit;
    }
    function check_user_login(){
        if((!isset($_SESSION["maNguoiDung"]) && !isset($_SESSION["tendn"]))){
            if((!isset($_COOKIE["maNguoiDung"]) && !isset($_SESSION["tendn"]))){
                header("location:index.php");
                
                $_SESSION["mess"] = "Bạn chưa đăng nhập ";
                exit();
            }

        }
    }
    function check_url(){
        if(!isset($_GET["url"])){
            header("location:404.php");
        }
    }
    function star_rating($dgtb){
        $str='';
        for($i=1;$i<6;$i++){
            if($i<=$dgtb){
               $str.= "<i class='fa fa-star fa-lg'></i>";
            }
            elseif(($i-$dgtb)<=0.5){
                $str.= "<i class='fa fa-star-half-o fa-lg'></i>";
            }
            else{
                $str.= "<i class='fa fa-star-o fa-lg'></i>";
            }
        }
        return $str;
    }
    
        
    

?>