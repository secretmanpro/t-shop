<?php
    
    include_once("DBConnect.php");
    class CapNhatTaiKhoanModel extends DBConnect{
      
        public function FindIdUserLogInByUserName($tendn){
            $sql= "SELECT *
                    from nguoi_dung nd
                    where nd.tendn='$tendn'";
            return $this->loadOneRow($sql);
        }
        public function FindInfoUserLogIn($ma_ngdung){
            $sql = "SELECT *
                    from nguoi_dung nd
                    where nd.ma_ngdung = '$ma_ngdung'";              
            return $this->loadOneRow($sql);
        }
        public function UpdateAccount($ma_ngdung,$email,$gioitinh,$matkhau,$dienthoai,$hoten){
            $sql = "UPDATE nguoi_dung nd
                    SET nd.email ='$email',nd.gioitinh='$gioitinh',nd.matkhau='$matkhau', nd.dienthoai= '$dienthoai', nd.hoten='$hoten'
                    where nd.ma_ngdung='$ma_ngdung'";

            return $this->loadOneRow($sql);
        }
    }
?>