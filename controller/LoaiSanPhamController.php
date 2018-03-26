<?php
    include_once("Controller.php");
    include_once("model/LoaiSanPhamModel.php");
    include_once("model/TrangChuModel.php");
    include_once("model/pager.php");
    class LoaiSanPhamController extends Controller{
        public function getLoaiSanPham(){
            $model =new LoaiSanPhamModel;
            $model1 =new LoaiSanPhamModel;
            $model2 =new LoaiSanPhamModel;
                     
           
            $idProductType = isset($_GET["maloai"])?$_GET["maloai"]:null;
    
            $countAllProductById = $model1->getcountAllProductTypeByIdType($idProductType);
            $nameBanner =$model2->getAllProductTypeByIdType($idProductType);
            //Pagination
            $product = $model->getAllProductTypeByIdTypePagination(-1,0,$idProductType);;
            $totalProduct = count($product);   //tổng số lượng sản phẩm  
            // die;
            
            if(isset($_GET["page"]) && $_GET["page"]!=0 && is_numeric($_GET["page"])) //trang hiện tại
            {
                $currentPage = abs($_GET["page"]);
            }
            else{
                $currentPage = 1;
            }
            $productOnOnePage = 1;//tổng sản phẩm 1 trang
            
            $totalPageShow =ceil($totalProduct/$productOnOnePage);//tổng số lượng trang
            
            $pager = new Pager($totalProduct,$currentPage,$productOnOnePage,$totalPageShow);
            $pagination = $pager->showPagination();

            $position = ($currentPage-1)*$productOnOnePage;//vi trí của trang hiện tại
            $product = $model->getAllProductTypeByIdTypePagination($position,$productOnOnePage,$idProductType);
            
            //     echo "<pre>";
            // print_r($product);
            // echo "</pre>";
            // die;
            
            $data =[
               
                "product" => $product,
                "nameBanner"=>$nameBanner,
                "countAllProductById" => $countAllProductById,
                "pagination" => $pagination
              
            ] ;
            return $this->loadView("loai-san-pham.php",$data);
        }
    }
?>