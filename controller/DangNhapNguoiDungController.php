<?php 
    include_once("Controller.php");
    include_once("model/DangNhapNguoiDungModel.php");
    include_once("function/function.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    class DangNhapNguoiDungController extends Controller{
        public function getDangNhap(){
            $tendn =isset($_POST["tendn"])?$_POST["tendn"]:null;
            $tendn = trim($tendn);
            $matkhau = isset($_POST["matkhaudn"])?$_POST["matkhaudn"]:null;
            $matkhau =hash("sha1",$matkhau);
            $ghinho = isset($_POST["ghinhodn"])?$_POST["ghinhodn"]:null;
            $model =new DangNhapNguoiDungModel;

            $allUser = $model->FindUserLogIn($tendn,$matkhau);
            // print_r($allUser);
            // die;
            if($allUser){
                foreach($allUser as $user){
                    
                   
                    if($user->tendn != $tendn){
                        $_SESSION["mess"]= "Tên tài khoản không đúng";
                       
                    }
                    if($user->matkhau != $matkhau){
                        $_SESSION["mess"] = "Mật khẩu không đúng";
                    }
                    else{
                        $_SESSION["maNguoiDung"] = $user->ma_ngdung;
                        $_SESSION["tendn"] = $user->tendn;
                        if(isset($_POST["ghinhodn"]) && $ghinho == 1){
                            setcookie("maNguoiDung",$user->ma_ngdung,time()+120);
                            setcookie("tendn",$user->tendn,time()+120);
                            $_SESSION["mess"] = "Đăng nhập thành công. Xin chào <strong>".$user->tendn."</strong>";
                            redirect($_SERVER['REQUEST_URI']);
                           
                        }
                        
                        $_SESSION["mess"] = "Đăng nhập thành công. Xin chào <strong>".$user->tendn."</strong>";
                        redirect($_SERVER['REQUEST_URI']);
                    
                    }
                }
            }
           
        }
    }
?>