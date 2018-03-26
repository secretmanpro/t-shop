<?php 
    include_once("model/DBConnect.php");
    include_once("model/DangKyNguoiDungModel.php");
    include_once("function/function.php");
    
    //session_start();
    class DangKyNguoiDungController extends Controller{
        public function getDangKy(){
           
            $model = new DangKyNguoiDungModel;
            $tendk   = isset($_POST["tendk"])?$_POST["tendk"]:null;
            $emaildk = isset($_POST["emaildk"])?$_POST["emaildk"]:null;
            $matkhaudk = isset($_POST["matkhaudk"])?$_POST["matkhaudk"]:null;
            $hoten = isset($_POST["hoten"])?$_POST["hoten"]:null;
            $dienthoai = isset($_POST["dienthoai"])?$_POST["dienthoai"]:null;
            $gioitinh = isset($_POST["gioitinh"])?$_POST["gioitinh"]:null;
            $ngaydangky = isset($_POST["ngaydangky"])?$_POST["ngaydangky"]:null;
            $tendk= trim($tendk);
            $emaildk = trim($emaildk);
            $matkhaudk = hash('sha1',$matkhaudk);
            $dienthoai = trim($dienthoai);
            $ngaydangky = date('Y-m-d H:i:s',time());
           
            $allUser = $model->FindAllUserSignUp($emaildk,$tendk);
            
           
            
            if($allUser){
                foreach($allUser as $user){
                   
                    if($user->tendn == $tendk){
                        $_SESSION["mess"] = "Tên đăng ký đã có người sử dụng";
                    }
                    else{
                        $_SESSION["mess"] = "Email đăng ký đã có người sử dụng";
                    }
                }
            } else {
             
                $user = $model->InsertUserSignUp($tendk,$emaildk,$gioitinh,$matkhaudk,$dienthoai,$hoten,$ngaydangky);    
                $_SESSION["mess"] = "Đăng ký tài khoản thành công. Bạn có thể đăng nhập ngay bây giờ";
            }
            // header location gì đó cho nó trở về trang chủ
            // header("location:index.php");
            redirect($_SERVER['REQUEST_URI']);
          
        }
    }
?>