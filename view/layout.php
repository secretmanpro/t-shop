<?php
    
    //ob_clean();
   
    include_once("controller/GioHang.php");
    include_once("controller/QuanLyGioHangController.php");
    include_once("controller/DangKyNguoiDungController.php");
    include_once("controller/DangNhapNguoiDungController.php");
    include_once("controller/TaiKhoanNguoiDungController.php");
    include_once("function/function.php");
   // ob_start();
   if(!isset($_SESSION)){
    session_start();
   }
  
  
    // if(!isset($_SESSION['cart'])) {
        $oldCart = isset($_SESSION["cart"])?$_SESSION["cart"]:null;
        $dataCart = new Cart($oldCart);
    // }
    $c = new DangKyNguoiDungController;
    if(isset($_POST["btnDangKy"])){
        $u=$c->getDangKy();
    }
    $c1 = new DangNhapNguoiDungController;
    if(isset($_POST["btnDangNhap"])){
       
        $u=$c1->getDangNhap();
    }
  
  
    
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Doan Thanh Tam">
    <title></title>
    <link rel="shortcut icon" type="image/x-icon" href="template/images/favicon.ico">

    <link rel="stylesheet" href="template/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="template/css/rating/fontawesome-stars.css">
    <!-- <link rel="stylesheet" href="template/css/rating/fontawesome-stars-o.css"> -->
    <link rel="stylesheet" href="template/css/latest-product/owl.carousel.css">
    <link rel="stylesheet" href="template/css/animate/animate.css">
    
    <!--BANNER-->
    <link rel="stylesheet" type="text/css" href="template/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="template/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="template/css/banner/slick.css">
    

    <!--SLIDESHOW-->
    <link rel="stylesheet" type="text/css" href="template/css/slideshow/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="template/css/slideshow/custom_swiper.css">
    

    <!--MESS THÔNG BÁO-->
    <link rel="stylesheet" type="text/css" href="template/css/mess/toastr.min.css">
    
    <link rel="stylesheet" href="template/css/layout.css">
    <link rel="stylesheet" href="template/css/index.css">
    <link rel="stylesheet" href="template/css/gioithieu.css">
    <link rel="stylesheet" href="template/css/lienhe.css">
    <link rel="stylesheet" href="template/css/timkiem.css">
    <link rel="stylesheet" href="template/css/chitietsp.css">
    <link rel="stylesheet" href="template/css/giohang.css">
    <link rel="stylesheet" href="template/css/taikhoannguoidung.css">
    <link rel="stylesheet" href="template/css/responsive.css">
     <!--GOOGLEMAP-->
     <!-- <script src="http://maps.google.com/maps/api/js"></script> -->
     <!-- <script type="text/javascript" src="template/js/google map/gmaps.js"></script>
     -->
    <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    -->
<!--   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbwxbUiJUFVf3tRDBlqEKwANQYKBD8_l0&callback=initMap"
    async defer></script>
    
    -->

    <!-- <script>
        function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(10.7712952, 106.6889006,17),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    
    var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    }
   
    </script>
       
  
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXaP2uL_HtT2PcKv_DQ6O-n7FQKPmPxmM&callback=myMap"></script> -->
    <!--JQUERY-->
    <script type="text/javascript" src="template/js/jquery224.js"></script>
    
    <script type="text/javascript">
        function ajaxAddToCart(quantity,idProduct){
            $.ajax({
                url:"gio-hang.php",
                type:"POST",
                data:{
                    "soluong":quantity,
                    "masanpham":idProduct,
                    action:"addItem"
                },
                dataType:"JSON",
                success:function(data){
                    //console.log(data);
                    $("#name-food").text(data.tensp); 
                    $("#modalAddToCart").modal("show");
                   $(".sumCart").text(data.tongSanPham);
                    // 
                },
                error:function(){
                  console.log("Lỗi");
                }
            });
        }
    </script>
    
</head>


<body class="flexcroll">
<div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId            : '1358175710953332',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.12'
        });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=1358175710953332&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--HEADER-->
    <div class="header">
        <div class="navbar-top collapse navbar-collapse js-navbar-collapse">
            <div class="container-fluid">
                <div class="nav navbar-nav menu-top-left">
                        <li><a href="tel">
                                <i class="glyphicon glyphicon-earphone"></i>
                                Gọi cho chúng tôi: 0169.99.99.99</a>
                        </li>
                        <li> <a href="mailto:lioneltam10@email.com">
                                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> 
                                t-shop@gmail.com</a>
                        </li>
                </div>
              
                <?php if((isset($_SESSION["maNguoiDung"]) && isset($_SESSION["tendn"])) || (isset($_COOKIE["maNguoiDung"]) && isset($_COOKIE["tendn"]) )){
                        $username="<div class='nav navbar-nav  menu-top-right-login'><li>
                        <a data-toggle='dropdown' class='dropdown-toggle'> 
                            <span class='glyphicon glyphicon-user'></span>"."&nbsp;&nbsp;"."Chào,"."&nbsp;&nbsp;"."<strong>".(isset($_SESSION["tendn"])?$_SESSION["tendn"]:$_COOKIE["tendn"])."</strong>"."<span class='caret'></span>"."</a>
                            <ul class='dropdown-menu'>
                                <li role='presentation' ><a  tabindex='-1' href='tai-khoan-nguoi-dung.php'>Thông tin tài khoản</a></li>
                                <li role='presentation'><a tabindex='-1' href='cap-nhat-tai-khoan.php'>Cập nhật tài khoản</a></li>
                                <li role='presentation'><a  tabindex='-1' href='#'>Lịch sử mua hàng</a></li>
                                <li role='presentation'><a  tabindex='-1' href='#'>Sản phẩm đánh giá</a></li>
                                <li role='presentation' class='divider'></li>
                                <li role='presentation' ><a name='dang-xuat' tabindex='-1' href='dang-xuat.php'>Đăng xuất</a></li>    
                            </ul>
                            </li>
                            <li class='language'>
                            <select name='language' class='form-control'>
                                <option value=''>Tiếng Việt</option>
                                <option value=''>Tiếng Anh</option>
                            </select>
                            </li>
                        </div>";
                        echo $username;
                        echo $btnAccoutResponsive="<div class='btnAccoutResponsive'><li id='seeAccount'><a href='tai-khoan-nguoi-dung.php' ><button class='btn btn-success'>Thông tin tài khoản</button></a></li>
                            <li id='logOutAccount'><a href='dang-xuat.php' ><button class='btn btn-primary'>Đăng xuất</button></a></li></div>";

                    }
                    else{
                        echo "<div class='nav navbar-nav  menu-top-right'><li>
                                <a id='btnOpenDangKy' href='' data-toggle='modal' data-target='#modalSignUp' data-whatever='@mdo'>
                                    <span class='glyphicon glyphicon-user'></span> Đăng ký</a>
                                </li>
                                <li>
                                    <a id='btnOpenDangNhap' href='' data-toggle='modal' data-target='#modalLogIn' data-whatever='@mdo'>
                                        <span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a>
                                </li>
                                <li class='language'>
                                    <select name='language' class='form-control'>
                                        <option value=''>Tiếng Việt</option>
                                        <option value=''>Tiếng Anh</option>
                                    </select>
                                </li>
                            </div>";
                        
                    }
                ?>
                



            </div>
        </div>

        <nav class="navbar navbar-default  ">
          
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img class="logo" src="template/images/logo.png">
                </a>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav navbar-left menu-trai">
                    <li> <a href="index.php">Trang chủ</a> </li>
                    <li class ="dropdown mega-dropdown"><a data-toggle="dropdown"  data-hover="dropdown" class="dropdown-toggle" data-animations="fadeIn" href="#" >Sản phẩm</a>
                        <ul class="dropdown-content dropdown-menu row" >
                                <!--Dropdown thường-->
                                <!--  <li class="item-dropdown"><a href="">Apple</a></li>
                                <li class="item-dropdown"><a href="">Samsung</a></li>
                                <li class="item-dropdown"><a href="">Oppo</a></li>
                                <li class="item-dropdown"><a href="">LG</a></li>
                                <li class="item-dropdown"><a href="">Sony</a></li>
                                <li class="item-dropdown"><a href="">Nokia</a></li> -->
                                <!--Mega dropdown-->
                            <li  class="item-dropdown col-md-6"><a href="#">Thương hiệu</a>
                                <?php
                                        include_once("model/ThuongHieuModel.php");
                                        $model = new ThuongHieuModel;
                                        $idBrand= isset($_GET["mathuonghieu"])?$_GET["mathuonghieu"]:null;
                                        $allProductBrand = $model->getAllBrand();
                                        // echo "<pre>";
                                        // print_r($allProductBrand);
                                        // echo "</pre>";
                                ?>
                                <?php foreach($allProductBrand as $sp):?>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <ul>
                                        <li><a  href="thuong-hieu.php?mathuonghieu=<?php echo $sp->ma_thuonghieu;?>"><?=$sp->ten;?></a></li>
                                        <!-- <li><a href="">Samsung</a>  </li>
                                        <li> <a href="">Oppo</a></li>
                                        <li> <a href="">LG</a> </li>
                                        <li> <a href="">Sony</a> </li>
                                        <li> <a href="">Nokia</a></li>
                                        <li> <a href="">Asus</a></li>
                                        <li> <a href="">HTC</a></li>
                                        <li> <a href="">Dell</a> </li>          --> 
                                    </ul>
                                </div>
                                <?php endforeach?>
                                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <ul>
                                        <li><a  href="thuong-hieu.php?mathuonghieu=<?php echo $sp->ma_thuonghieu;?>"><?=$sp->ten;?></a></li>
                                    </ul>
                                </div> -->  
                            </li>
                            <li class="item-dropdown col-md-6"><a href="#">Loại sản phẩm</a>
                                <ul>
                                <?php 
                                        include_once("model/LoaiSanPhamModel.php");
                                        $model = new LoaiSanPhamModel;
                                      
                                        $idProductType = isset($_GET["maloai"])?$_GET["maloai"]:null;
                                        $allProductType = $model->getAllProductType();
                                ?>
                                       <?php foreach($allProductType as $sp):?>
                                            <li><a  href="loai-san-pham.php?maloai=<?php  echo $sp->ma_loaisp;?>"><?=$sp->tenloai;?></a></li>
                                       <?php endforeach?>
                                    <!-- <li><a href="">Smartphone</a></li>
                                    <li><a href="">Phụ kiện</a></li>
                                    <li><a href="">Máy tính bảng</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                    <li> <a href="lien-he.php">Liên hệ</a> </li>
                    <li class="cart" style="border:0">
                        <a style="width:215px;padding-left: 0" href="quan-ly-gio-hang.php">
                            <span id="textCart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Giỏ hàng
                            </span> &nbsp;
                            <span value="" class="sumCart badge badge-secondary">
                                <?php  if(isset($_SESSION["cart"]))
                                        echo count($dataCart->items);
                                        else echo "0";
                                ?>
                            </span>
                        </a>
                    </li>
                    <button id="btnOpenSearch" type="button" class="btn btn-default">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </ul>
                <div class="search col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form id="formSearch" action="tim-kiem.php" method="GET" role="form">
                        <div class="form-group">
                            <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11">
                                <input id="inputSearch" name="keyword" type="text" class="form-control " placeholder="Tìm kiếm...">
                            </div>
                            
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-1  col-lg-1 ">
                            <button id="btnSearch" name="btnSearch" type="submit" class="btn btn-default">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            <button id="btnClose" type="button" class="btn btn-default">
                                <i class="fa fa-window-close"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.nav-collapse -->
        </nav>
    </div>


    <?php 
        include_once($view);
    ?>
    
<div id="modalAddToCart" class="modal fade" role="dialog">
  <div class="modal-dialog model-sm">

    <!-- Modal content-->
    <div class="modal-content">
  
      <div class="modal-body">
        <p>Đã thêm sản phẩm <strong><span id="name-food"></span> </strong> vào giỏ hàng</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!--FOOTER-->
<div class="footer-1"></div>
<div class="footer-2">
    <div class="container-fluid">
        <div class=" col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <ul class="listfooter" style="list-style-type: none">
                <p class="tieudefooter">MENU</p>
                <li> <a href="index.php">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a> </li>
                <li> <a href="gioi-thieu.php">Giới thiệu</a> </li>
                <li> <a href="lien-he.php">Liên hệ</a> </li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 ">
            
            <ul class="listfooter" style="list-style-type: none">
                <p class="tieudefooter">THƯƠNG HIỆU</p>
                <?php
                    include_once("model/ThuongHieuModel.php");
                    
                    $model = new ThuongHieuModel;
                    
                    $idBrand= isset($_GET["mathuonghieu"])?$_GET["mathuonghieu"]:null;
                    $allProductBrand = $model->getAllBrand();         
                ?>
                <?php foreach($allProductBrand as $sp):?>
                <li><a href="thuong-hieu.php?mathuonghieu=<?=$sp->ma_thuonghieu;?>"><?=$sp->ten;?></a></li>
                <!-- <li><a href="">Samsung</a></li>
                <li><a href="">Oppo</a> </li>
                <li><a href="">LG</a></li>
                <li><a href="">Sony</a> </li>
                <li> <a href="">Nokia</a></li>
                <li> <a href="">Asus</a></li>
                <li><a href="">HTC</a></li>
                <li> <a href="">Dell</a> </li> -->
                <?php endforeach?>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <ul class="listfooter" style="list-style-type: none">
                <p class="tieudefooter">LIÊN HỆ</p>
                <li>Địa chỉ:</li>
                <li>90 Lê Thị Riêng quận 1, TPHCM</li>
                </br>
                <li>Điện thoại:</li>
                <li>Văn phòng 08.333.9999</li>
            </ul>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <br>
                    <div class="fb-page" data-href="https://www.facebook.com/itlovedesign/" data-tabs="timeline" data-width="270" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/itlovedesign/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/itlovedesign/">It Love Design</a></blockquote></div>
                
                    <a href="#">
                        <img class="imgmxh" src="template/images/icon-face.png">
                    </a>&nbsp;&nbsp;
                    <a href="#">
                        <img class="imgmxh" src="template/images/icon-youtube.png">
                    </a>&nbsp;&nbsp;
                    <a href="#">
                        <img class="imgmxh" src="template/images/icon-google.png">
                    </a>
                        <img style="width: 140px; height: 50px" src="template/images/register.png"/ >
               
            
       
        </div>
    </div>
</div>
<div class="footer-3">      
    Bản quyền 2017 -Thiết kế bởi Thanh Tâm - lioneltam10@gmail.com
</div>
    <!--CHAT-->
    <div class="nd">
		<div class="tieudechat" >
				-- Chat online --
				<span  title="Nhấp vào đây để ẩn chat" style="position:absolute;right:25px;top:10px;" class="glyphicon glyphicon-minus-sign"></span>
			<span  title="Nhấp vào đây để tắt chat" style="position:absolute;right:5px;top:10px;" class="glyphicon glyphicon-remove"></span>	
		</div>
		<div class="kqchat" >
				<div class="xuatNd" v-show="notEndChat"  v-for="chat in dsChat">
						<div class="message-bubble"><span style="color:red;margin-left:-10px">{{chat.ten}}</span><br>{{chat.noiDungChat}}</div>
						<div style="clear: both;"></div>
				</div>
				
  	    </div>
        <div class="noidungchat" v-show="notEndChat">
            <textarea id="inputChat" v-on:keyup.enter="addChat('Tôi')" v-model="noiDungNhapChat"
                    placeholder="Nhập tin nhắn và ấn Enter để gửi ..."  onfocus="this.placeholder=''" onblur="this.placeholder='Nhập tin nhắn...'"></textarea>
        </div>  
    </div>
    <img id="icon_chat" title="CHAT VỚI CHÚNG TÔI" src="template/images/chat.png">
    <img id="backtotop" title="CLICK ĐỂ VỀ ĐẦU TRANG"  src="template/images/backtotop.png">
    <!--Đăng kí-->
    <div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Đăng ký tài khoản</h4>
                </div>
                <div class="modal-body">
            
                    <div  class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                                <img class="img-form" src="template/images/sign-up.png" class="img-responsive img-circle">
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <form id="formDangKy" action="" method="POST" role="form">
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label for="tendk" class="control-label">Tên đăng nhập</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">
                                 <input type="text" value="" class="form-control tendk" id="tendk" name="tendk">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                 <label for="emaildk" class="control-label">Email</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">   
                                <input type="email" value="" class="form-control emaildk" name="emaildk" id="emaildk" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label for="matkhaudk" class="control-label">Mật khẩu</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">   
                                <input type="password" value="" class="form-control matkhaudk" name="matkhaudk" id="matkhaudk" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label for="lapmatkhau" class="control-label">Xác nhận mật khẩu</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">   
                                <input type="password" value="" class="form-control lapmatkhau" name="lapmatkhau" id="lapmatkhau" >
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                 <label for="hoten" class="control-label">Họ tên</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">   
                                 <input type="text" value="" class="form-control hoten" name="hoten" id="hoten" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label for="dienthoai" class="control-label">Điện thoại</label>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 inputformDangKy">   
                               <input type="text" value="" class="form-control dienthoai" name="dienthoai" id="dienthoai" >
                            </div>
                        </div>
                        <div class="form-group form-inline form-gioitinh">

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                     <label for="gioitinh" class="control-label">Giới tính</label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">  
                                    <div class=" form-inline ">
                                        <label for="men" class="radio-inline">
                                        <input type="radio" value="nam" name="gioitinh" id="men">
                                        Nam</label>&nbsp;
                                        <label for="girl" class="radio-inline">
                                        <input type="radio" value="nữ" name="gioitinh" id="girl">
                                        Nữ</label>&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-dongy">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-8 col-lg-9">
                                        <div class="form-inline ">
                                            <div class="checkbox">
                                            <label for="dongy"> 
                                                <input type="checkbox"  id="dongy" class="dongy" name="dongy" > Tôi đồng ý chấp nhận <a title="Click xem điều khoản" style="color:blue" href="gioi-thieu.php">điều khoản</a> của T-Shop</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                             </div>
                        </div>
                        <div class="modal-footer">
                            <button  disabled="disabled"  id="btnDangKy" type="submit" name="btnDangKy" class="btn btnForm" >Đăng ký</button>
                            <button  id="btnDangKyXoa" type="reset" class="btn btnForm  " name="btnXoa" data-dismiss="modal">Thoát</button>
                         </div>
                    
                    </form>
                
                 
                </div>
         
            </div>
        </div>
    </div>

    <!--Đăng nhập-->
    <div class="modal fade" id="modalLogIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Đăng nhập tài khoản</h4>
                </div>
                <div  class="modal-body">
                    <div  class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                                <img src="template/images/log-in.png" class="img-responsive img-form">
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    
                    <form  style="padding-bottom:20px;" id="formDangNhap" action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="tendn" class="control-label">Tên đăng nhập</label>
                            <input placeholder= "Nhập tên đăng nhập" type="text" value="" class="form-control tendn" name="tendn" id="tendn" >
                        </div>
                      
                        <div class="form-group">
                            <label for="matkhau" class="control-label">Mật khẩu</label>
                            <input placeholder= "Nhập mật khẩu" value="" type="password" id="matkhaudn" name="matkhaudn" class="form-control" >
                         
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class=" col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group" style="position:absolute;left:30px;">
                                        <div class="checkbox">
                                            <label for="ghinhodn" class="control-label-agree">
                                            <input type="checkbox"  name="ghinhodn" class="form-checkbox" value="1" id="ghinhodn" >
                                            Ghi nhớ đăng nhập</label>  &nbsp;&nbsp;
                                                <a style="color:brown" href="quenmk.html">Quên mật khẩu?</a>  
                                        </div>
                                    </div>        
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div style="height:20px;width:100%;position:absolute;left:30px;">                      
                                             <button id="btnDangNhap" type="submit" name="btnDangNhap" class="btn btnForm">Đăng nhập</button>
                                             <button id="btnDangNhapXoa" type="reset" class="btn btnForm" data-dismiss="modal">Thoát</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                  
                </div>

                <div class="modal-footer" style="text-align:center">
                        <button type="submit" name="btnGoogle" class="btn btn-danger btnGoogle">Đăng nhập với Google 
                                <i  class="fa fa-google fa-2x" aria-hidden="true"></i>  
                        </button>
                        <button  type="submit" name="btnFace" class="btn btn-primary btnFace" >Đăng nhâp với Facebook <i  class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                        </button>   
                </div>
            </div>
        </div>
    </div>
    
    
    <!--MODAL THÔNG BÁO KẾT QUẢ ĐĂNG KÝ, ĐĂNG NHẬP-->
    
    <div id="modalNotify"  class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p><?php if (isset($_SESSION["mess"]))
                             echo $_SESSION["mess"];
                            
                       ?></p>
                </div>
            </div>
        </div>
    </div>
 
    <?php 
       
    if (isset($_SESSION["mess"])){
            echo  "<script type='text/javascript'>
            $(function(){
                $('#modalNotify').modal('show');
            });
            </script>";
            unset($_SESSION['mess']);
        } 
        
    ?>
    <script type="text/javascript">
  //Do bên trang nào cũng có button add-to-card =>đặt ở layout
    $(document).ready(function(){
        
        $(".btn-add-to-cart,.add-to-cart-link").click(function(){     
                
                var quantity = 1;

                // sum  +=quantity;
                // var tong=$(".sumCart").text(sum);
                // console.log(tong);
                var idProduct = $(this).attr("dataId");
                //dataId là 1 thuộc tính của thẻ a chứa class btn-add-to-card của các trang      
                    // console.log(qty)
                    // console.log(idFood)

                    //Gom lại thành 1 function cho gọn
                 ajaxAddToCart(quantity,idProduct);
                // $.ajax({
                //     url:"gio-hang.php",
                //     type:"POST",
                //     //Gửi data cho controller
                //     data:{
                //         "soluong":qty,
                //         "idSanpham":idFood
                //     },
                //     success:function(data){
                //       $("#name-food").text(data);
                //       $("#myModal").modal('show');
                //     },
                //     error:function(){
                //       console.log("lỗi");
                //     }
                // })
         });
    });
    </script>
    
    <!--CHAT-->
    <script type="text/javascript" src="template/js/vue.js"></script>
    <script type="text/javascript" src="template/js/chat/chat.js"></script>
    

    <script type="text/javascript" src="template/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    
    <!--MEGA DROPDOWN MENU-->
    <script type="text/javascript" src="template/js/hover dropdown menu/bootstrap-dropdownhover.min.js"></script>
    
    <!--SCROLL SMOOTH-->
    <script type="text/javascript" src="template/js/smoothscroll/smoothscroll.js"></script>

    
   
    <!--VALIDATE FORM ĐĂNG NHẬP, ĐĂNG KÝ-->
    <script type="text/javascript" src="template/js/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="template/js/validate/validate_login_signin.js"></script>
    
    <!--RATING SẢN PHẨM-->
    <script type="text/javascript" src="template/js/rating/jquery.barrating.js"></script>
    <script type="text/javascript">
          $(function() {
              $('.rating').barrating({
                theme: 'fontawesome-stars',

              });
           });
    
    </script>
    <!--SLIDESHOW SẢN PHẨM TRANG INDEX-->
    <script type="text/javascript" src="template/js/latest-product/owl.carousel.min.js"></script>
    <script type="text/javascript" src="template/js/latest-product/jquery.sticky.js"></script>
    <script type="text/javascript" src="template/js/latest-product/main.js"></script>
    
    

    <!--HIDE,SHOW CHAT-->
    <script type="text/javascript" src="template/js/hideshowchat.js"></script>
    
    <!--HIỆU ỨNG DỊCH CHUYỂN ELEMEWNT-->
    <script type="text/javascript" src="template/js/wow/wow.min.js"/></script>
    <script>
              new WOW().init();
    </script>

    <!--HIỆU ỨNG THỐNG KÊ TRANG LIÊN HỆ-->
    <script type="text/javascript" src="template/js/counter/jquery.counterup.min.js"></script>
	<script src="template/js/counter/waypoints.js"></script>
	 <script>
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
   
    </script>
        
    <!--SLIDER BANNER TRANG INDEX-->
    
    <script src="template/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" >
        function createSlick(){  
            
                $(".slider").not('.slick-initialized').slick({
                autoplay: true,
                dots: true,
                arrows: true,
                responsive: [{ 
                    breakpoint: 500,
                    settings: {
                        dots: false,
                        arrows: false,
                        infinite: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    } 
                }]
            });	
            }
            createSlick();
            //Now it will not throw error, even if called multiple times.
            $(window).on( 'resize', createSlick );
    </script>

    <!-- ZOOM IMAGE DETAIL-->
    <script type="text/javascript" src="template/js/zoom product/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="template/js/zoom product/hover zoom.js"></script>
 
   
    <script>
            //Xoá mess lỗi khi click modal lần 2

        $('#modalSignUp').on('hidden.bs.modal', function() {
            var $alertas = $('#formDangKy');
            $alertas.validate().resetForm();
            $alertas.find('.form-group').removeClass("has-error");
            $('#btnDangKy').prop('disabled', 'disabled');
        });
    </script>
     <script>
            //Xoá mess lỗi khi click modal lần 2

        $('#modalLogIn').on('hidden.bs.modal', function() {
            var $alertas = $('#formDangNhap');
            $alertas.validate().resetForm();
            $alertas.find('.form-group').removeClass("has-error");
           
        });
    </script>
    <!--MESS THÔNG BÁO-->
    <script type="text/javascript" src="template/js/mess/toastr.min.js"></script>
   
    <!--HIDE, SHOW SEARCH BACK TO TOP ICON,-->
    <script type="text/javascript" src="template/js/script.js"></script>
    
   
     <!--SLIDESHOW DANH SACH THƯƠNG HIỆU TRANG INDEX-->
    <script type="text/javascript" src="template/js/slideshow/swiper.min.js"></script>
      <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        spaceBetween: 100,
        loop:true,
        centeredSlides: true,
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
        }
        });
    </script>
     
    
</body>

</html>