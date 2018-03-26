<?php
    include_once("Controller.php");
    include_once("function/function.php");
    include_once("model/TaiKhoanNguoiDungModel.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 
    class TaiKhoanNguoiDungController extends Controller{
        public function getTaiKhoanNguoiDung(){
            $model = new TaiKhoanNguoiDungModel;
              // print_r($user);
            // die;
            check_user_login();
      
            if(isset($_SESSION["tendn"])){
                $userInfo=$model->FindIdUserLogInByUserName($_SESSION["tendn"]);
                
                // $userData =$model->FindInfoUserLogIn($user->ma_ngdung);
              
               // print_r($userData);
            //die;
            }
            elseif(isset($_COOKIE["tendn"])){
                $userInfo=$model->FindIdUserLogInByUserName($_COOKIE["tendn"]);
                
               // $userData =$model->FindInfoUserLogIn($user->ma_ngdung);
            }
         
            $data=[
                "userInfo"=>$userInfo 
            ];
         
            // else{
            //     unset($_SESSION["maNguoiDung"]) ;
            //     unset($_SESSION["tendn"])  ;
            //     unset($_SESSION["email"]) ;
            //     unset($_SESSION["hoten"]) ;
            //     unset($_SESSION["gioitinh"]) ;
            //     unset($_SESSION["dienthoai"]); 
            //     unset($_SESSION["matkhau"]) ;   
                
            //     setcookie("maNguoiDung",'');
            //     setcookie("tendn",'');
            //     setcookie("email",'');
            //     setcookie("hoten",'');
            //     setcookie("gioitinh",'');
            //     setcookie("dienthoai",'');
            //     setcookie("matkhau",'');
              
            //     header("location:index.php");
            //     $_SESSION["mess"]= "Bạn chưa đăng nhập";        
            // }
        
            return $this->loadView("tai-khoan-nguoi-dung.php",$data);
        }
    }
?>