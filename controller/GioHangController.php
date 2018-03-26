<?php

    include_once("model/GioHangModel.php");
    include_once("controller/GioHang.php");
   
    if(!isset($_SESSION))
    session_start();
    class GioHangController {
        public function ThemGioHang(){
            

            $idProduct = isset($_POST["masanpham"])?$_POST["masanpham"]:null; //Lấy bên ajax qua
            $quantity = isset($_POST["soluong"])?$_POST["soluong"]:null;
            $model = new GioHangModel;
            $product = $model->FindOneProduct($idProduct);
            // echo "<pre>";
            // print_r($product);
            // echo "</pre>";
            // die;

          
            $oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
            $cart = new Cart($oldCart);

            $cart->add($product,$quantity);
            $_SESSION["cart"] = $cart;
            echo "<pre>";
            print_r($cart);
            echo "</pre>";
            die;
            
           // echo $product->tensp;
            $tensp =$product->tensp;
            $tongSanPham = count($cart->items);
            $arr = ["tensp"=>$tensp,"tongSanPham"=>$tongSanPham];
            
            echo json_encode($arr);
            //return $this->loadView("gio-hang.php",$data);
        }
        public function CapNhatGioHang(){
            $idProduct = isset($_POST["masanpham"])?$_POST["masanpham"]:null; //Lấy bên ajax qua
            $quantity = isset($_POST["soluong"])?$_POST["soluong"]:null;
            $model = new GioHangModel;
            $product = $model->FindOneProduct($idProduct);
            $oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
            $cart = new Cart($oldCart);
            $cart->update($product,$quantity);
            $_SESSION["cart"]=$cart;
         
            
            $thanhTien= number_format($cart->items[$idProduct]["price"],0,"",".");
            $tongSanPham = count($cart->items);
            $tongTien = number_format($cart->totalPrice,0,"",".");
            $arr = ["tongTien"=>$tongTien,"tongSanPham"=>$tongSanPham,"thanhTien"=>$thanhTien];
            echo json_encode($arr);

        }
        public function XoaGioHang(){
            $id = isset($_POST["id"])?$_POST["id"]:null; 
            //id này là id của từng items không phải idSP của từng item
            //$model = new GioHangModel;
            //$product = $model->DeleteOneProduct($idProduct);
            // echo "<pre>";
            // print_r($product);
            // echo "</pre>";
            // die;

          
            $oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
            $cart = new Cart($oldCart);

            $cart->removeItem($id);
            $_SESSION["cart"] = $cart;
            $tongSanPham  = count($cart->items);
            $tongTien= number_format($cart->totalPrice,0,"",".");
            $arr = ["tongSanPham"=>$tongSanPham,"tongTien"=>$tongTien];
            
            echo json_encode($arr);
           
        }
    }
?>