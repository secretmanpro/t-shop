<?php 
    include_once("DBConnect.php");
    class GioHangModel extends DBConnect{
        public function FindOneProduct($idProduct){
            $sql = "SELECT *
                    from san_pham sp
                    join hinh_san_pham h
                    on sp.ma_sanpham = h.ma_sanpham
                    where h.stt=1 and sp.ma_sanpham ='$idProduct'";
            return $this->loadOneRow($sql);
        }
        // public function UpdateOneProduct($idProduct){
        //     $sql = "UPDATE from san_pham sp
        //             SET sp.ma_sanpham = '$idProduct'";
        //     return $this->loadOneRow($sql);
        // }
  
    }
?>