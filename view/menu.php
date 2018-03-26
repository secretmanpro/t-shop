<?php 
  
    if(isset($product)){
        $product=$data["prouduct"];
    }
?>
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
                    <li>
                        <a href="index.php">Trang chủ</a>
                    </li>
                   
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
                            <li  class="item-dropdown col-md-4"><a href="#">Thương hiệu</a>
                                <ul>
                                <?php 
                                        
                                       
                                        foreach($product as $sp):?>
                                        <li><a name ="btnLinkMenuThuongHieu" href="thuong-hieu.php?mathuonghieu=<?php if(isset($_GET["mathuonghieu"]) && $_GET["mathuonghieu"]==$sp->ma_thuonghieu) echo $sp->ma_thuonghieu;?>"><?=$sp->ten;?></a></li>
                                <?php endforeach?>
                                    <!-- <li>
                                        <a href="">Samsung</a>
                                    </li>
                                    <li>
                                        <a href="">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="">LG</a>
                                    </li>
                                    <li>
                                        <a href="">Sony</a>
                                    </li>
                                    <li>
                                        <a href="">Nokia</a>
                                    </li>
                                    <li>
                                        <a href="">Asus</a>
                                    </li>
                                    <li>
                                        <a href="">HTC</a>
                                    </li>
                                    <li>
                                        <a href="">Dell</a>
                                    </li>          --> 
                                </ul>
                            </li>
                           
                            <li class="item-dropdown col-md-4"><a href="#">Loại sản phẩm</a>
                                <ul>
                                <?php 
                                       
                                        foreach($product as $sp):?>
                                        <li><a name ="btnLinkMenuLoaiSP" href="loai-san-pham.php?maloai=<?php  echo $sp->ma_loaisp;?>"><?=$sp->tenloai;?></a></li>
                                <?php endforeach?>
                                    <!-- <li><a href="">Smartphone</a></li>
                                    <li><a href="">Phụ kiện</a></li>
                                    <li><a href="">Máy tính bảng</a></li> -->
                                </ul>
                            </li>
                        
                            <li class="item-dropdown col-md-4">
                                <ul>
                                    <li>
                                    <img class="img-responsive" src="template/images/menu/menu1.jpg">
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="gioi-thieu.php">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lien-he.php">Liên hệ</a>
                    </li>
                    <li class="cart" style="border:0">
                        <a style="width:215px;padding-left: 0" href="gio-hang.php">
                            <span id="textCart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Giỏ hàng</span>
                            &nbsp;
                          
                             <span   class="soluong" alt="">100</span>
                        </a>
                    </li>
                    <button id="btnOpenSearch" type="button" class="btn btn-default">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </ul>
                 <div class="search col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form  id="formSearch" action="tim-kiem.php" method="GET" role="form">
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