<?php
    include_once("Controller.php");
    include_once("model/TrangChuModel.php");
    include_once("function/function.php");
    class TrangChuController extends Controller{
        public function getTrangChu(){
           
            $model = new TrangChuModel;
            $thuongHieu = $model->getBrands();
            $spMoi = $model->getLatestProducts();
            $loaiLapTop = $model->getProductTypeLapTop(); 
            $loaiSmartPhone = $model->getProductTypeSmartPhone();
            $loaiAccessory = $model->getProductTypeAccessory();
            $loaiTablet = $model->getProductTypeTablet();
            
            $data =[
                "thuongHieu"=>$thuongHieu,
                "spMoi" => $spMoi,
                "loaiLapTop"=> $loaiLapTop,
                "loaiAccessory"=>$loaiAccessory,
                "loaiTablet"=>$loaiTablet,
                "loaiSmartPhone"=>$loaiSmartPhone,
                
            ];

            // echo "<pre>";
            // print_r($loaiTablet);
            // echo "</pre>";
            // die;
            return $this->loadView("index.php",$data);
        }
    }
?>