<?php
    include_once("Controller.php");
    include_once("model/TimKiemModel.php");
    include_once("model/TrangChuModel.php");
    include_once("model/ChiTietSanPhamModel.php");
    include_once("model/pager.php");
    class TimKiemController extends Controller{
        public function getTimKiem(){
        
            $model = new TimKiemModel;
            $keyword = isset($_GET["keyword"])?$_GET["keyword"]:null;   
            
            $idProductType = isset($_GET["maloai"])?$_GET["maloai"]:null;
            $idProductBrand =isset($_GET["mathuonghieu"])?$_GET["mathuonghieu"]:null;
           
            $min = isset($_GET["minPrice"])?$_GET["minPrice"]:null;
         
            $max = isset($_GET["maxPrice"])?$_GET["maxPrice"]:null;;
            
            
            $model1= new TimKiemModel;
            $model2= new TimKiemModel;
            $productType =$model1->getAllProductType();
            $productBrand =$model2->getAllBrand();
            
            $model3=new TimKiemModel;
            $model4=new TimKiemModel;
            isset($_GET["btnSearch"])?$_GET["btnSearch"]:null;
            isset($_GET["btnTimNC"])?$_GET["btnTimNC"]:null;
            $countSearch= $model3->Search($keyword);
            $countFilterProduct = $model4->FilterProduct($keyword,$idProductType,$idProductBrand,$min,$max);
            
            if(isset($_GET["btnSearch"])){
                if(($_GET["keyword"]!="" || isset($_GET["keyword"]))){
                    $keyword = trim($_GET["keyword"]);
                      //Pagination
                    $product = $model->SearchPagination(-1,0,$keyword);
                    $totalProduct = count($product);   //tổng số lượng sản phẩm  
                    // die;
                    
                    if(isset($_GET["page"]) && $_GET["page"]!=0 && is_numeric($_GET["page"])) //trang hiện tại
                    {
                        $currentPage = abs($_GET["page"]);
                    }
                    else{
                        $currentPage = 1;
                    }
                    $productOnOnePage = 2;//tổng sản phẩm 1 trang
                    $totalPageShow =ceil($totalProduct/$productOnOnePage);;//tổng số lượng trang
                    
                    $pager = new Pager($totalProduct,$currentPage,$productOnOnePage,$totalPageShow);
                    $pagination = $pager->showPagination();

                    $position = ($currentPage-1)*$productOnOnePage;//vi trí của trang hiện tại
                    $product = $model->SearchPagination($position,$productOnOnePage,$keyword);
                    
                
                }
            }
            elseif(isset($_GET["btnTimNC"])){
                if( isset($_GET["keyword"])||$_GET["keyword"]!=''){
                    $keyword = trim($_GET["keyword"]);
                    //Pagination
                   
                    $product = $model->FilterProductPagination(-1,0,$keyword,$idProductType,$idProductBrand,$min,$max);
                    $totalProduct = count($product);   //tổng số lượng sản phẩm  
                  
                    
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

                    $product = $model->FilterProductPagination($position,$productOnOnePage,$keyword,$idProductType,$idProductBrand,$min,$max);
                   
                    
                }
            }
           

            $data =[
                "product" => $product,
                "pagination" => $pagination,
                "productType"=>$productType,
                "productBrand"=>$productBrand,
                "countFilterProduct" =>$countFilterProduct,
                "countSearch"=>$countSearch
            ] ;
            // echo "<pre>";
            // print_r($filter);
            // echo "</pre>";
            // die;
           
            return $this->loadView("tim-kiem.php",$data);
        }
    }
?>