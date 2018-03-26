<?php
    include_once("Controller.php");
    include_once("model/ChiTietSanPhamModel.php");
    include_once("model/pager.php");
    include_once("function/function.php");
    if(!isset($_SESSION)){
        session_start();
    }
    class ChiTietSanPhamController extends Controller{
        public function getChiTietSanPham(){
            $alias = $_GET['url'];
            check_url();
            $model = new ChiTietSanPhamModel;
            $model1= new ChiTietSanPhamModel;
            $model2=new ChiTietSanPhamModel;
            $model3= new ChiTietSanPhamModel;
            $productDetail = $model->getProductDetail($alias);
            // print_r($productDetail);
            // die;
            $imageThumnail = $model1->getImageThumnail($alias);
            $allComment = $model3->getAllComment($alias);
            // print_r($allComment);
            // die;


            if(isset($_GET["url"])){
              
                      //Pagination
                    $sameProduct = $model2->getSameProduct(-1,0,$productDetail->ma_loaisp,$productDetail->tensp);
                    $totalProduct = count($sameProduct);   //tổng số lượng sản phẩm  
                    // die;
                    
                    if(isset($_GET["page"]) && $_GET["page"]!=0 && is_numeric($_GET["page"])) //trang hiện tại
                    {
                        $currentPage = abs($_GET["page"]);
                    }
                    else{
                        $currentPage = 1;
                    }
                    $productOnOnePage = 1;//tổng sản phẩm 1 trang
                    $totalPageShow =ceil($totalProduct/$productOnOnePage);;//tổng số lượng trang
                    
                    $pager = new Pager($totalProduct,$currentPage,$productOnOnePage,$totalPageShow);
                    $pagination = $pager->showPagination();

                    $position = ($currentPage-1)*$productOnOnePage;//vi trí của trang hiện tại
                    $sameProduct = $model->getSameProduct($position,$productOnOnePage,$productDetail->ma_loaisp,$productDetail->tensp);
                    
                
           
            }
            $data=[
                "productDetail" => $productDetail,
                "imageThumbail" => $imageThumnail,
                "allComment" => $allComment,
                "sameProduct" =>$sameProduct,
                "pagination"=>$pagination
            ];
            // echo "<pre>";
            // print_r ( $productDetail);
            // echo "</pre>";
        
            // echo $productDetail->tensp;
          
            // die;
            return $this->loadView("chi-tiet-san-pham.php",$data);
        }
    }
?>