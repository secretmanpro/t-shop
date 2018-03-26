<?php
    include_once("DBConnect.php");
    class TimKiemModel extends DBConnect{
  


        public function getAllProductType(){
            $sql = "SELECT * from loai_san_pham lsp";
            return $this->loadMoreRows($sql);
        }
        public function getAllBrand(){
            $sql = "SELECT * from thuong_hieu th";
            return $this->loadMoreRows($sql);
        }
     
        public function Search($keyword){
            $sql ="SELECT *
                   from san_pham sp
                   join page_url p
                   on p.ma_sanpham = sp.ma_sanpham
                   join loai_san_pham lsp
                   on sp.ma_loaisp = lsp.ma_loaisp
                   join hinh_san_pham h
                   on h.ma_sanpham = sp.ma_sanpham
                   join thuong_hieu th
                   on th.ma_thuonghieu = sp.ma_thuonghieu
                   where h.stt=1  and sp.tensp like '%$keyword%'";
            return $this->loadMoreRows($sql);
        }

        public function FilterProduct($keyword,$idProductType,$idProductBrand,$minPrice,$maxPrice){
            $sql ="SELECT *
                   from san_pham sp
                   join page_url p
                   on p.ma_sanpham =sp.ma_sanpham
                   join loai_san_pham lsp
                   on sp.ma_loaisp = lsp.ma_loaisp
                   join hinh_san_pham h
                   on h.ma_sanpham = sp.ma_sanpham
                   join thuong_hieu th
                   on th.ma_thuonghieu = sp.ma_thuonghieu
                   where h.stt=1  and sp.tensp like '%$keyword%' and  sp.ma_loaisp='$idProductType' and sp.ma_thuonghieu='$idProductBrand'
                       and sp.giagiam BETWEEN $minPrice and $maxPrice";
            return $this->loadMoreRows($sql);
        }

        //SỬ DỤNG PAGINATION
       

        public function SearchPagination($position=-1,$quantity=0,$keyword){
            $sql ="SELECT *
                   from san_pham sp
                   join page_url p
                   on p.ma_sanpham = sp.ma_sanpham
                   join loai_san_pham lsp
                   on sp.ma_loaisp = lsp.ma_loaisp
                   join hinh_san_pham h
                   on h.ma_sanpham = sp.ma_sanpham
                   join thuong_hieu th
                   on th.ma_thuonghieu = sp.ma_thuonghieu
                   where h.stt=1  and sp.tensp like '%$keyword%'";
                if($position!=-1 && $quantity!=0){
                   $sql.=" limit $position,$quantity";
                }
            return $this->loadMoreRows($sql);
        }
        
        public function FilterProductPagination($position,$quantity,$keyword,$idProductType,$idProductBrand,$minPrice,$maxPrice){
            // $setMaxPrice = $maxPrice*1000;
            // $setMinPrice = $minPrice*1000;
            // if($maxPrice !==0 && $setMinPrice !==0 ){
            //     $condition .="and sp.giagiam between {$setMinPrice} and {$setMaxPrice}";
            // }
            // elseif($maxPrice!==0){
            //     $condition .="and sp.giagiam <= {$maxPrice}";
            // }
            // elseif($minPrice!==0){
            //     $condition .="and sp.giagiam >= {$minPrice}";
            // }
            
            $sql ="SELECT *
                    from san_pham sp
                    join page_url p
                    on p.ma_sanpham =sp.ma_sanpham
                    join loai_san_pham lsp
                    on sp.ma_loaisp = lsp.ma_loaisp
                    join hinh_san_pham h
                    on h.ma_sanpham = sp.ma_sanpham
                    join thuong_hieu th
                    on th.ma_thuonghieu = sp.ma_thuonghieu
                    where h.stt=1  and sp.tensp like '%$keyword%' and  sp.ma_loaisp='$idProductType' and sp.ma_thuonghieu='$idProductBrand'
                     and sp.giagiam between $minPrice and $maxPrice";
                    if($position!=-1 && $quantity!=0){
                        $sql.=" limit $position,$quantity";
                    }
            return $this->loadMoreRows($sql);
        }
    }
?>