<?php
    include_once("DBConnect.php");
    class DangNhapNguoiDungModel extends DBConnect{
        public function FindUserLogIn($username,$password){
            $sql = "SELECT *
                    from nguoi_dung nd
                    where nd.tendn='$username' and nd.matkhau='$password'";
            return $this->loadMoreRows($sql);

        }
    }
?>