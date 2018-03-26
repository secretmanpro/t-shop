<?php
    include_once("DBConnect.php");
    class DangKyNguoiDungModel extends DBConnect{
        public function InsertUserSignUp($tendk,$emaildk,$gioitinh,$matkhaudk,$dienthoai,$hoten,$ngaydangky){
            $sql = "INSERT INTO nguoi_dung(tendn,email,gioitinh,matkhau,dienthoai,hoten,ngaydangky)
                    VALUES('$tendk','$emaildk','$gioitinh','$matkhaudk','$dienthoai','$hoten','$ngaydangky')";
            $r = $this->executeQuery($sql);
            if($r){
                return $this->getLastID();
            }      
            else{
                return false;
            }
        }
        public function FindAllUserSignUp($emaildk,$tendk){
            $sql = "SELECT * 
                    from nguoi_dung nd
                    where nd.email='$emaildk' or nd.tendn = '$tendk'
                    ";
            return $this->loadMoreRows($sql);
        }
    }
?>