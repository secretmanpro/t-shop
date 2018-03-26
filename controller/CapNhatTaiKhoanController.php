<?php
    include_once("Controller.php"); 
    include_once("model/CapNhatTaiKhoanModel.php");
    include_once("function/function.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    class CapNhatTaiKhoanController extends Controller{
        public function getCapNhatTaiKhoan(){
            check_user_login();
            $model = new CapNhatTaiKhoanModel;
            
            $emailUpdate = isset($_POST["emailUpdate"])?$_POST["emailUpdate"]:null;
            $passOldUpdate = isset($_POST["passOldUpdate"])?$_POST["passOldUpdate"]:null;
            $passUpdate = isset($_POST["passUpdate"])?$_POST["passUpdate"]:null;
            
            $phoneUpdate = isset($_POST["phoneUpdate"])?$_POST["phoneUpdate"]:null;
            $sexUpdate = isset($_POST["sexUpdate"])?$_POST["sexUpdate"]:null;
            $nameUpdate = isset($_POST["nameUpdate"])?$_POST["nameUpdate"]:null;
            
            $nameUpdate= trim($nameUpdate);
            $emailUpdate = trim($emailUpdate);
            $passOldUpdate = hash('sha1',$passOldUpdate);
            $passUpdate = hash('sha1',$passUpdate);
            $phoneUpdate = trim($phoneUpdate);
           
            
                if((isset($_SESSION["maNguoiDung"]) &&  isset($_SESSION["tendn"])) )
                {
                   $user = $model->FindIdUserLogInByUserName($_SESSION["tendn"]);
                  
                //    print_r($user->matkhau);
                //    die;
                    if(isset($_POST["btnUpdateAccount"])){
                        if($passOldUpdate != $user->matkhau){
                            $_SESSION["mess"] = "Mật khẩu cũ không đúng";
                        }
                        else{
                            $userDataUpdate = $model->UpdateAccount($user->ma_ngdung,$emailUpdate,$sexUpdate,$passUpdate,$phoneUpdate,$nameUpdate);
                            $_SESSION["mess"] = "Cập nhật tài khoản thành công";
                        }
                           
                       
                    }
                    
                }
                // elseif(isset($_COOKIE["maNguoiDung"]) && isset($_COOKIE["tendn"])){

                // }
                else{
                    header("location:index.php");
                    $_SESSION["mess"]= "Bạn chưa đăng nhập";        
                
                }
         
          
            return $this->loadView("cap-nhat-tai-khoan.php");
        }
    }
?>