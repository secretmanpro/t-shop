<?php 
    include_once("model/DBConnect.php");
    class LoaiSanPhamModel extends DBConnect{
        public function getAllProductType(){
            $sql = "SELECT *
            from loai_san_pham lsp";
            return $this->loadMoreRows($sql);
        }
        public function getAllProductTypeByIdType($idType){
            $sql = "SELECT *
                    from loai_san_pham lsp
                    where  lsp.ma_loaisp='$idType'";
            return $this->loadMoreRows($sql);
        }
        public function getCountAllProductTypeByIdType($idType){
            $sql = "SELECT *
                    from san_pham sp
                    left join loai_san_pham lsp
                    on sp.ma_loaisp = lsp.ma_loaisp
                    where  sp.ma_loaisp='$idType'";
            return $this->loadMoreRows($sql);
        }
        public function getAllProductTypeByIdTypePagination($position=-1,$quantity=0,$idType){
           
            
           
                $sql = "SELECT *,avg(dg.rating) as dgtb
                from san_pham sp
                left join danh_gia dg
                on sp.ma_sanpham = dg.ma_sanpham
                join page_url p
                on sp.ma_sanpham = p.ma_sanpham
                join loai_san_pham lsp
                on sp.ma_loaisp = lsp.ma_loaisp
                join hinh_san_pham h
                on h.ma_sanpham = sp.ma_sanpham 
                where sp.ma_loaisp='$idType' and h.stt=1
                group by sp.ma_sanpham";
                if($position!=-1 && $quantity !=0){
                    $sql.=" limit $position,$quantity";
                } 
          
        
            return $this->loadMoreRows($sql);
        }
    }
?>