<?php
    include_once("DBConnect.php");
    class TaiKhoanNguoiDungModel extends DBConnect{
     
        public function FindIdUserLogInByUserName($tendn){
            $sql= "SELECT *
                    from nguoi_dung nd
                    where nd.tendn='$tendn'";
            return $this->loadOneRow($sql);
        }
        // public function FindInfoUserLogIn($ma_ngdung){
        //     $sql = "SELECT *
        //             from nguoi_dung nd
        //             where nd.ma_ngdung = '$ma_ngdung'";              
        //     return $this->loadOneRow($sql);
        // }
      

    }
?>