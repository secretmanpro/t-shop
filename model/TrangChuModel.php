<?php
    include_once("DBConnect.php");
    class TrangChuModel extends DBConnect{
        function getBrands(){
            $sql = "SELECT th.ten,th.ma_thuonghieu, th.hinh from thuong_hieu th
                    where th.hinh is not null";
            return $this->loadMoreRows($sql); 
        }
        function getLatestProducts(){
            $sql = "SELECT *, avg(dg.rating) as dgtb
                    from san_pham sp
                    left join danh_gia dg
                    on sp.ma_sanpham = dg.ma_sanpham
                    join page_url p
                    on sp.ma_sanpham = p.ma_sanpham 
                    left join hinh_san_pham h
                    on sp.ma_sanpham = h.ma_sanpham
                    where h.stt=1 and sp.ma_sanpham 
                    group by sp.ma_sanpham
                    order by sp.ngaythem desc 
                    limit 10";
            return $this->loadMoreRows($sql);

        }
        function getProductTypeLapTop(){
            $sql = "SELECT *, avg(dg.rating) as dgtb
                    from san_pham sp
                    left join danh_gia dg
                    on sp.ma_sanpham = dg.ma_sanpham
                    join page_url p
                    on sp.ma_sanpham = p.ma_sanpham 
                    left join hinh_san_pham h 
                    on h.ma_sanpham= sp.ma_sanpham
                    join loai_san_pham lsp 
                    on lsp.ma_loaisp= sp.ma_loaisp
                    where lsp.tenloai ='Laptop' and h.stt=1 
                    group by sp.ma_sanpham
                    limit 10";
            return $this->loadMoreRows($sql);
        }
        function getProductTypeSmartPhone(){
            $sql = "SELECT *,avg(dg.rating) as dgtb
                    from san_pham sp
                    left join danh_gia dg
                    on sp.ma_sanpham = dg.ma_sanpham
                    join page_url p
                    on sp.ma_sanpham = p.ma_sanpham 
                    left join hinh_san_pham h 
                    on h.ma_sanpham= sp.ma_sanpham
                    join loai_san_pham lsp 
                    on lsp.ma_loaisp= sp.ma_loaisp
                    where lsp.tenloai ='Smartphone' and h.stt=1 
                    group by sp.ma_sanpham
                    limit 9";
            return $this->loadMoreRows($sql);
        }
        function getProductTypeAccessory(){
                $sql = "SELECT *,avg(dg.rating) as dgtb
                from san_pham sp
                left join danh_gia dg
                on sp.ma_sanpham = dg.ma_sanpham
                join page_url p
                on sp.ma_sanpham = p.ma_sanpham 
                left join hinh_san_pham h 
                on h.ma_sanpham= sp.ma_sanpham
                join loai_san_pham lsp 
                on lsp.ma_loaisp= sp.ma_loaisp
                where lsp.tenloai ='Phụ kiện' and h.stt=1
                group by sp.ma_sanpham
                limit 9";
         
            
            
            return $this->loadMoreRows($sql);
        }
        function getProductTypeTablet(){
                $sql = "SELECT *,avg(dg.rating) as dgtb
                from san_pham sp
                left join danh_gia dg
                on sp.ma_sanpham = dg.ma_sanpham
                join page_url p
                on sp.ma_sanpham = p.ma_sanpham 
                left join hinh_san_pham h 
                on h.ma_sanpham= sp.ma_sanpham
                join loai_san_pham lsp 
                on lsp.ma_loaisp= sp.ma_loaisp
                where lsp.tenloai ='Máy tính bảng' and h.stt=1
                group by sp.ma_sanpham
                limit 9";
         
           
            return $this->loadMoreRows($sql);
        }
        
    }
?>