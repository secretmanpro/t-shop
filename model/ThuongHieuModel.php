<?php
    include_once("DBConnect.php");
    class ThuongHieuModel extends DBConnect{
        //Hiện menu, slideshow trang index
        public function getAllBrand(){
            $sql = "SELECT * from thuong_hieu th";
            return $this->loadMoreRows($sql); 
        }
        //Tiêu đề banner
        public function getAllBrandByIdBrand($idBrand){
            $sql = "SELECT * from  thuong_hieu th
                    where th.ma_thuonghieu='$idBrand'";
            return $this->loadMoreRows($sql); 
        }
        //Đếm sản phẩm
        public function getCountAllBrandByIdBrand($idBrand){
            $sql = "SELECT * from san_pham sp
                    left join thuong_hieu th
                    on th.ma_thuonghieu =sp.ma_thuonghieu
                    where th.ma_thuonghieu='$idBrand' ";
            return $this->loadMoreRows($sql); 
        }

        //Hiện pagination
        public function getAllBrandByIdBrandPagination($position=-1,$quantity=0,$idBrand){
          
            
                $sql = "SELECT *, avg(dg.rating) as dgtb
                from san_pham sp 
                left join danh_gia dg
                on sp.ma_sanpham= dg.ma_sanpham
                join thuong_hieu th
                on th.ma_thuonghieu =sp.ma_thuonghieu
                join page_url p
                on sp.ma_sanpham = p.ma_sanpham
                join hinh_san_pham h
                on h.ma_sanpham = sp.ma_sanpham
                where th.ma_thuonghieu='$idBrand' and h.stt=1
                group by sp.ma_sanpham";
                if($position!=-1 && $quantity!=0){
                    $sql.=" limit $position,$quantity";
                }
      

            return $this->loadMoreRows($sql); 
        }
    }
?>