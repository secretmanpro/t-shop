<?php
    include_once("Controller.php");
    include_once("model/NguoiDungDanhGiaSanPhamModel.php");
    include_once("model/ChiTietSanPhamModel.php");
    include_once("function/function.php");
    if(!isset($_SESSION)){
        session_start();
    }
    class NguoiDungDanhGiaSanPhamController extends Controller{
        public function NguoiDungDanhGiaSanPham(){
            
            $alias = $_GET['url'];
            
            if(isset($_SESSION["maNguoiDung"]) && isset($_SESSION["tendn"])){
                //$ma_ngdung = isset($_POST["maNguoiDung"])?$_POST["maNguoiDung"]:null;
                // $ma_sanpham = isset($_POST["maSanPham"])?$_POST["maSanPham"]:null;
                $noi_dung = isset($_POST["inputCmt"])?$_POST["inputCmt"]:null;
                $rating = isset($_POST["rating"])?$_POST["rating"]:null;
                $ngay_danh_gia = date('Y-m-d H:i:s',time());
                $an_hien =1;
                $model = new NguoiDungDanhGiaSanPhamModel;
                $model1 = new ChiTietSanPhamModel;
                $model2 = new NguoiDungDanhGiaSanPhamModel;
                $model3 = new NguoiDungDanhGiaSanPhamModel;
                //$productDetail = $model1->getProductDetail($alias);
                // print_r($productDetail);
                // die;
                $UserRating =$model2->FindAllUserRating($_SESSION["maNguoiDung"]);
            
                // echo $allUserRating->ma_sanpham;
                // die;
                $userLogIn = $model3->FindUserLogInById($_SESSION["maNguoiDung"]);
                // print_r($userLogIn);
                // die;

                if($userLogIn){
                    if($UserRating->ma_sanpham=$allUserRating->ma_ngdung){
                        $_SESSION["mess"] = "Bạn đã đánh giá rùi";
                        redirect($_SERVER['REQUEST_URI']);
                    
                    }
                    else{
                        $data=$model->InsertRatingProduct($userLogIn->ma_ngdung,$productDetail->ma_sanpham,$noi_dung,$rating,$ngay_danh_gia,$an_hien);
                        $_SESSION["mess"] = "Cảm ơn bạn đã đánh giá";
                        redirect($_SERVER['REQUEST_URI']);
                    }
                }
            }
            else{

                //header("Location: {$_SERVER['REQUEST_URL']}"); // redirect to the base page to clear the form data 
              
                $_SESSION["url"] = $_GET["url"];
                header("location:reload-form.php");

               // header("Location:{$_SERVER['REQUEST_URL']}");
            }
        }
        public function NguoiDungXoaDanhGiaSanPham(){
            $alias = $_GET['url'];
            $masanpham = isset($_POST["masanpham"])?$_POST["masanpham"]:null;
            $ngdung = isset($_POST["manguoidung"])?$_POST["manguoidung"]:null;
            if(isset($_SESSION["maNguoiDung"]) && isset($_SESSION["tendn"])){
                $model1 = new NguoiDungDanhGiaSanPhamModel;
               
                $model2 = new NguoiDungDanhGiaSanPhamModel;
                $model3 = new NguoiDungDanhGiaSanPhamModel;
                $userCmt = $model2->FindUserRating($ngdung);
              
                //$allUserRating =$model2->FindAllUserRating($_SESSION["maNguoiDung"]);
                $userLogIn = $model3->FindUserLogInById($_SESSION["maNguoiDung"]);
                // print_r(["usercmt"=>$userCmt,"userlogin"=>$userLogIn]);
                // die;
             
                if($userCmt->ma_ngdung =$userLogIn->ma_ngdung){
                    $model1->DeleteRatingProduct($ngdung,$masanpham);
                }
            }
            else{
                
                //header("Location: {$_SERVER['REQUEST_URL']}"); // redirect to the base page to clear the form data 
                
                $_SESSION["url"] = $_GET["url"];
                header("location:reload-form.php");

                // header("Location:{$_SERVER['REQUEST_URL']}");
            }
        }
    }
?>