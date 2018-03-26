<?php 
    include_once("Controller.php");
    include_once("model/ThuongHieuModel.php");
    include_once("model/TrangChuModel.php");
    include_once("model/pager.php");
 
    class ThuongHieuController extends Controller{
        public function getThuongHieu(){
            $model = new ThuongHieuModel;
            $model1= new ThuongHieuModel;
            $model2= new ThuongHieuModel;
            $idBrand = isset($_GET["mathuonghieu"])?$_GET["mathuonghieu"]:null;
            $nameBanner = $model1->getAllBrandByIdBrand($idBrand);
            $countAllProductBrandById =$model2->getCountAllBrandByIdBrand($idBrand);
            
            $product = $model->getAllBrandByIdBrandPagination(-1,0,$idBrand);
            $totalProduct = count($product);
        
          
        
            if(isset($_GET["page"]) && $_GET["page"]!='' && is_numeric($_GET["page"])) //trang hiện tại
            {
                $currentPage = abs($_GET["page"]);
            }
            else $currentPage=1;
            $productOnOnePage = 1;
            $totalPageShow = ceil($totalProduct/$productOnOnePage);
            
            $pager = new Pager($totalProduct,$currentPage,$productOnOnePage,$totalPageShow);
            $pagination = $pager->showPagination();
            $postion =($totalPageShow-1)*$productOnOnePage;
            $product = $model->getAllBrandByIdBrandPagination($postion,$productOnOnePage,$idBrand);
            // echo "<pre>";
            // print_r($product);
            // echo "</pre>";
            // die;
            
            $data1=[
        
                "product"=>$product,
                "nameBanner"=> $nameBanner,
                "countAllProductBrandById"=>$countAllProductBrandById,
                "pagination"=>$pagination
            ];
            return $this->loadview("thuong-hieu.php",$data1);
        }
    }
?>