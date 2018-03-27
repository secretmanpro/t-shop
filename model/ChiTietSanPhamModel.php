<?php
    include_once("DBConnect.php");
    class ChiTietSanPhamModel extends DBConnect{
        public function getProductDetail($alias){
            $sql = "SELECT *,avg(dg.rating) as dgtb
                    from san_pham sp
                    left join danh_gia dg
                    on sp.ma_sanpham = dg.ma_sanpham
                    left join nguoi_dung nd
                    on nd.ma_ngdung = dg.ma_ngdung
                    join page_url p
                    on sp.ma_sanpham = p.ma_sanpham
                    left join hinh_san_pham h
                    on sp.ma_sanpham = h.ma_sanpham
                    join thuong_hieu th
                    on sp.ma_thuonghieu = th.ma_thuonghieu
                    where p.url='$alias'
                    group by sp.ma_sanpham";
            return $this->loadOneRow($sql);
        }
        public function getAllComment($alias){
            $sql = "SELECT *
                    from san_pham sp
                    left join danh_gia dg
                    on sp.ma_sanpham = dg.ma_sanpham
                    join nguoi_dung nd
                    on nd.ma_ngdung = dg.ma_ngdung
                    join page_url p
                    on p.ma_sanpham = sp.ma_sanpham
                    where p.url='$alias'";
            return $this->loadMoreRows($sql);
        }
        public function getImageThumnail($alias){
            $sql = "SELECT sp.tensp,h.tenhinh
                    from san_pham sp
                    join hinh_san_pham h
                    on h.ma_sanpham = sp.ma_sanpham
                    join page_url p
                    on sp.ma_sanpham = p.ma_sanpham
                    where p.url='$alias'";
            return $this->loadMoreRows($sql);
        }
        public function getSameProduct($position=-1,$quantity=0,$idProductType,$nameProduct){
            $sql ="SELECT *, avg(dg.rating) as dgtb
                   from san_pham sp
                   left join danh_gia dg
                   on sp.ma_sanpham = dg.ma_sanpham
                   join page_url p
                   on p.ma_sanpham = sp.ma_sanpham
                   join loai_san_pham lsp
                   on sp.ma_loaisp = lsp.ma_loaisp
                   join hinh_san_pham h
                   on h.ma_sanpham = sp.ma_sanpham
                   join thuong_hieu th
                   on th.ma_thuonghieu = sp.ma_thuonghieu
                   where h.stt=1  and sp.tensp !='$nameProduct' and lsp.ma_loaisp = '$idProductType'
                   group by sp.ma_sanpham";
                if($position!=-1 && $quantity!=0){
                   $sql.=" limit $position,$quantity";
                }
            return $this->loadMoreRows($sql);
        }

        public function productForCart($id)
        {
          $sql = "SELECT tensp, tenhinh, price FROM san_pham WHERE ma_sanpham = $id LIMIT 1";
          return $this->loadOneRow($sql);
        }
    }

?>
