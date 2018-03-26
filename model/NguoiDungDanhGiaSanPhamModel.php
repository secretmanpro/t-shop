<?php
    include_once("DBConnect.php");
    class NguoiDungDanhGiaSanPhamModel extends DBConnect{
        //Tìm user đang log in
        public function FindUserLogInById($ma_ngdung){
            $sql = "SELECT * 
                    FROM nguoi_dung nd
                    where nd.ma_ngdung ='$ma_ngdung'";
            return $this->loadOneRow($sql);
        }
        //Tìm  user đã rating rồi khi login trc đó
        public function FindAllUserRating($ma_ngdung){
            $sql = "SELECT *
                    FROM danh_gia dg
                    where dg.ma_ngdung='$ma_ngdung'";
            return $this->loadOneRow($sql);
        }
        //Thêm đánh giá
        public function InsertRatingProduct($ma_ngdung,$ma_sanpham,$noidung,$rating,$ngaydanhgia,$anhien){
            $sql = "INSERT INTO danh_gia(ma_ngdung,ma_sanpham,noidung,rating,ngaydanhgia,anhien)
                    VALUES('$ma_ngdung','$ma_sanpham','$noidung','$rating','$ngaydanhgia','$anhien')";
                  
            $r = $this->executeQuery($sql);
            if($r){
                return $this->getLastID();
            }      
            else{
                return false;
            }
        }
        //Xoá đánh giá 
        public function DeleteRatingProduct($ma_ngdung,$ma_sanpham){
            $sql = "DELETE FROM danh_gia dg
                    where dg.ma_sanpham='$ma_sanpham' and dg.ma_ngdung='$ma_ngdung'";
            return $this->executeQuery($sql);
          
        }
    }
?>