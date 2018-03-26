<?php
    include_once("function/function.php");
    $thuongHieu = $data["thuongHieu"];
    $spMoi = $data["spMoi"];
    $loaiLapTop = $data["loaiLapTop"];
    $loaiSmartPhone = $data["loaiSmartPhone"];
    $loaiAccessory = $data["loaiAccessory"];
    $loaiTablet = $data["loaiTablet"];
    
?>
   
<!--BANNER-->

<section class="slider">
    <img  src="template/images/banner/banner2.png">
    <img  src="template/images/banner/banner3.png">
     <img  src="template/images/banner/banner4.png">
</section>

    <div class="page-content">
         
         
         
         <!--DANH SÁCH SẢN PHẨM MỚI-->
        <div  class=" maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">SẢN PHẨM MỚI CẬP NHẬT</h2>
                            <div class="divided-block">
                                <div class="divided-block_line"></div>
                                <div class="divided-block_square"></div>
                                <div class="divided-block_line"></div>
                            </div>
                            <div class="product-carousel wow ">
                                <?php foreach($spMoi as $sp) :?>
                                <div class="single-product">
                                    <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                                    <div class="product-f-image">
                                        <span class="block-circle text-circle">NEW</span>
                                        <img  src="template/images/products/<?= $sp->tenhinh ?>" alt=""/>
                                        <div class="product-hover">
                                            <a href="javascript:void(0)" name="add-to-cart-link" dataId="<?=$sp->ma_sanpham;?>" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="latest-name-product"><a href="chi-tiet-san-pham.php?url=<?=$sp->url?> " class="seeDetails" >
                                    <?= $sp->tensp ?></a></div>
                                
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <!-- <select class="rating"> -->
                                            <?php 
                                            echo '<span class="star-color">';
                                            echo star_rating($sp->dgtb);
                                            echo '</span>';?>
                                            <!-- <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option> -->
                                          
                                        <!-- </select> -->
                                        </p>
                                        
                                        <p class="price-product">
                                        
                                            <ins><?php if($sp->giagiam!=$sp->gia){
                                                 echo number_format($sp->giagiam,0,',','.')." VND"; 
                                            }
                                            else{
                                                echo number_format($sp->gia,0,',','.')." VND"; 
                                            }
                                            
                                            ?>
                                            </ins>
                                            <del>
                                            <?php if($sp->giagiam==$sp->gia){
                                                 echo '';
                                            }
                                            else{
                                                echo number_format($sp->gia,0,',','.')." VND";
                                                
                                            }
                                            ?>
                                            </del>
                                        </p>
                                    </div>
                                  
                                </div>
                                <?php endforeach ?>
                                <!-- <div class="single-product">
                                    <div class="product-f-image">
                                           <span class="block-circle text-circle" alt="">NEW</span>
                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                                
                                      <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                           <span class="block-circle text-circle" alt="">NEW</span>
                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                               
                                      <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                           <span class="block-circle text-circle" alt="">NEW</span>
                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                               
                                    
                                      <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                           <span class="block-circle text-circle" alt="">NEW</span>
                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                               
                                    
                                      <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--DANH SÁCH SẢN PHẨM BÁN CHẠY-->
        <!-- <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">SẢN PHẨM BÁN CHẠY</h2>
                            <div class="divided-block">
                                <div class="divided-block_line"></div>
                                <div class="divided-block_square"></div>
                                <div class="divided-block_line"></div>
                            </div>
                            <div class="product-carousel">
                                <div class="single-product">
                                    <span class="block-circle text-circle" alt="">HOT</span>

                                    <div class="product-f-image">

                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                              
                                    
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <span class="block-circle text-circle" alt="">HOT</span>
                                    <div class="product-f-image">

                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                             
                                    
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                 </div>
                                <div class="single-product">
                                    <span class="block-circle text-circle" alt="">HOT</span>

                                    <div class="product-f-image">

                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                              
                                    
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <span class="block-circle text-circle" alt="">HOT</span>

                                    <div class="product-f-image">

                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                                 
                                    
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <span class="block-circle text-circle" alt="">HOT</span>

                                    <div class="product-f-image">

                                        <img src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</a>
                                            <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="view-details-link">
                                                <i class="fa fa-link"></i> CHI TIẾT</a>
                                        </div>
                                    </div>

                                    <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                    Iphone X 64GB</a></div>
                                
                                    
                                    <div class="product-carousel-price">
                                        <p class="rating-product">
                                        <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>
                                        </p>

                                        <ins>16.000.000 VND</ins>
                                        <del>15.000.000 VND</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--DANH SÁCH LOẠI SẢN PHẨM-->
        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
                <h2 class="section-title">LOẠI SẢN PHẨM </h2>
                <div class="divided-block">
                    <div class="divided-block_line"></div>
                    <div class="divided-block_square"></div>
                    <div class="divided-block_line"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-product">LAPTOP
                        <?php foreach($loaiLapTop as $sp):?>    
                        <a href="loai-san-pham.php?maloai=<?=$sp->ma_loaisp?>"><button type="submit" class="btn btnSeeAll" name="btnSeeAll">Xem tất cả</button></a>
                        <?php endforeach?>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                <?php foreach($loaiLapTop as $sp):?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" src="template/images/products/<?= $sp->tenhinh?>">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                               
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                <?=$sp->tensp?></a></div>
                              
                                
                                <p class="rating-product">
                                <!-- <select class="rating"> -->
                                    <?php 
                                    echo '<span class="star-color">';
                                    echo star_rating($sp->dgtb);
                                    echo '</span>';?>
                                    <!-- <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option> -->
                                  
                                <!-- </select> -->
                                </p>
                                <p class="price-product">
                                
                                    <ins><?php if($sp->giagiam!=$sp->gia){
                                         echo number_format($sp->giagiam,0,',','.')." VND"; 
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND"; 
                                    }
                                    
                                    ?>
                                    </ins>
                                    <del>
                                    <?php if($sp->giagiam==$sp->gia){
                                         echo '';
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND";
                                        
                                    }
                                    ?>
                                    </del>
                                </p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                        
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                         
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
               
              
              
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" title="iphoneX" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                            
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                           
                                
                                <p class="rating-product">
                                    <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins>
                                </p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                            <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                             
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                             
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <?php endforeach ?>
                </div>
               
            </div>
        </div>

        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-product">SMARTPHONE
                        <?php foreach($loaiSmartPhone as $sp):?>
                        <a href="loai-san-pham.php?maloai=<?=$sp->ma_loaisp?>"><button type="submit" class="btn btnSeeAll" name="btnSeeAll">Xem tất cả</button></a>
                        <?endforeach?>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                <?php foreach($loaiSmartPhone as $sp):?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" src="template/images/products/<?= $sp->tenhinh?>">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                               
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                <?=$sp->tensp?></a></div>
                           
                                
                                <p class="rating-product">
                                <!-- <select class="rating"> -->
                                    <?php 
                                    echo '<span class="star-color">';
                                    echo star_rating($sp->dgtb);
                                    echo '</span>';?>
                                    <!-- <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option> -->
                                  
                                <!-- </select> -->
                                </p>
                                <p class="price-product">
                                
                                    <ins><?php if($sp->giagiam!=$sp->gia){
                                         echo number_format($sp->giagiam,0,',','.')." VND"; 
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND"; 
                                    }
                                    
                                    ?>
                                    </ins>
                                    <del>
                                    <?php if($sp->giagiam==$sp->gia){
                                         echo '';
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND";
                                        
                                    }
                                    ?>
                                    </del>
                                </p>
                             
                                <p class="btnProduct">
                                    <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                    <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                        
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                           
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
               
              
              
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" title="iphoneX" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                            
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                           
                                
                                <p class="rating-product">
                                    <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins>
                                </p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                            <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                            
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                             
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <?php endforeach ?>
                </div>
               
            </div>
        </div>

        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
          
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-product">MÁY TÍNH BẢNG
                        <?php foreach($loaiTablet as $sp):?>
                        <a href="loai-san-pham.php?maloai=<?=$sp->ma_loaisp?>"><button type="submit" class="btn btnSeeAll" name="btnSeeAll">Xem tất cả</button></a>
                        <?endforeach?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                <?php foreach($loaiTablet as $sp):?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" src="template/images/products/<?= $sp->tenhinh?>">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                               
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                <?=$sp->tensp?></a></div>
                          
                                
                                <p class="rating-product">
                                <!-- <select class="rating"> -->
                                    <?php 
                                    echo '<span class="star-color">';
                                    echo star_rating($sp->dgtb);
                                    echo '</span>';?>
                                    <!-- <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option> -->
                                  
                                <!-- </select> -->
                                </p>
                                <p class="price-product">
                                
                                    <ins><?php if($sp->giagiam!=$sp->gia){
                                         echo number_format($sp->giagiam,0,',','.')." VND"; 
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND"; 
                                    }
                                    
                                    ?>
                                    </ins>
                                    <del>
                                    <?php if($sp->giagiam==$sp->gia){
                                         echo '';
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND";
                                        
                                    }
                                    ?>
                                    </del>
                                </p>
                                <p class="btnProduct">
                                    <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                    <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                           
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                            
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
               
              
              
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" title="iphoneX" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                            
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                         
                                
                                <p class="rating-product">
                                    <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins>
                                </p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                            <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                             
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                           
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <?php endforeach ?>
                </div>
               
            </div>
        </div>


        
        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-product">PHỤ KIỆN
                        <?php foreach($loaiAccessory as $sp):?>
                        <a href="loai-san-pham.php?maloai=<?=$sp->ma_loaisp?>"><button type="submit" class="btn btnSeeAll" name="btnSeeAll">Xem tất cả</button></a>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                <?php foreach($loaiAccessory as $sp):?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" src="template/images/products/<?= $sp->tenhinh?>">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                               
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                <?=$sp->tensp?></a></div>
                            
                                <p class="rating-product">
                                <!-- <select class="rating"> -->
                                    <?php 
                                    echo '<span class="star-color">';
                                    echo star_rating($sp->dgtb);
                                    echo '</span>';?>
                                    <!-- <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option> -->
                                  
                                <!-- </select> -->
                                </p>
                                <p class="price-product">
                                
                                    <ins><?php if($sp->giagiam!=$sp->gia){
                                         echo number_format($sp->giagiam,0,',','.')." VND"; 
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND"; 
                                    }
                                    
                                    ?>
                                    </ins>
                                    <del>
                                    <?php if($sp->giagiam==$sp->gia){
                                         echo '';
                                    }
                                    else{
                                        echo number_format($sp->gia,0,',','.')." VND";
                                        
                                    }
                                    ?>
                                    </del>
                                </p>
                              
                                <p class="btnProduct">
                                    <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                    <a href="chi-tiet-san-pham.php?url=<?=$sp->url?>"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                          
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                   <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                               
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
               
              
              
                    <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                    <img class="hinh-sp" title="iphoneX" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                    <span class="overlay"></span>
                                </a>
                            
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                        
                                
                                <p class="rating-product">
                                    <select class="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins>
                                </p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                            <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                            
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-product">
                            <div class="img-product"> 
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetails">
                                <img title="iphoneX" class="hinh-sp img-responsive" src="template/images/products/dienthoai/20161117-050926+0100-0.jpg" alt="Iphone-X">
                                    <img class="eyes" title="Xem chi tiết" src="template/images/eyes.png">
                                </a>
                            </div>
                            <div class="detail-product">
                                <div class="name-product"><a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail">
                                Iphone X 64GB</a></div>
                        
                                
                                <p class="rating-product">
                                        <select class="rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </p>
                                <p class="price-product"><del>18.000.000 VND</del><ins>16.000.000 VND</ins></p>
                                <p class="btnProduct">
                                <a href="javascript:void(0)" dataId="<?=$sp->ma_sanpham;?>" class="btn-add-to-cart"><img class="addToCart" title="Thêm vào giỏ hàng" src="template/images/addcart.png"></a>
                                <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?=$sp->url?>" class="seeDetail"><img title="Xem chi tiết" class="seeDetail" src="template/images/seedetail.png"></a>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <?php endforeach ?>
                </div>
               
            </div>
        </div>


        <!--VIDEO-->
        <div class="maincontent-area">
            <div data-wow-durian="1s" class="section-vid wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div data-wow-durian="1s"  class="wow slideInLeft col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <iframe class="embed-responsive-item" width="100%" height="400" src="https://www.youtube.com/embed/lQdAEyriQgk" frameborder="0" allow=" encrypted-media" allowfullscreen></iframe>
  
                        </div>
                        
                        <div data-wow-durian="1s"  class="wow slideInRight col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <p class="follow-us">THEO DÕI CHÚNG TÔI</p>
                            
                            <input type="text" name="input-follow-us"  class="input-follow-us form-control" value="" placeholder="Nhập Email của bạn" onblur="this.placeholder = 'Nhập Email của bạn'"
                                onfocus="this.placeholder = ''" thisrequired="required" pattern="Nhập Email của bạn" title="">
                                <button type="submit" id="btnSub" class="btn btnForm">Theo dõi</button>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
       <!--THƯƠNG HIỆU HỢP TÁC-->
        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
                <h2 class="section-title">CÁC THƯƠNG HIỆU HỢP TÁC</h2>
                <div class="divided-block">
                    <div class="divided-block_line"></div>
                    <div class="divided-block_square"></div>
                    <div class="divided-block_line"></div>
                </div>
                
                 <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                       
                        <?php foreach($thuongHieu as $th):?>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/<?=$th->hinh;?>" />
                        </div>
                        <?php endforeach ?>
                        <!-- <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/htc.png" />
                        </div>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/lg.png" />
                        </div>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/nokia.png" />
                        </div>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/oppo.png" />
                        </div>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/samsung.png" />
                        </div>
                        <div class="swiper-slide">
                            <img  src="template/images/thuonghieu/sony.png" />
                        </div> -->
                        
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
             </div>
        </div>
            
    </div>
       
</div>
