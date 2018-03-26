<?php 
    include_once("controller/NguoiDungDanhGiaSanPhamController.php");
    include_once("function/function.php");
    $c = new NguoiDungDanhGiaSanPhamController;
    $action = isset($_POST["action"])?$_POST["action"]:null;
    if(isset($_POST["btn-User-Rating"])){
        return $c->NguoiDungDanhGiaSanPham();
    }
    elseif($action=="deleteCmt"){
        return $c->NguoiDungXoaDanhGiaSanPham();
    }
    $productDetail=$data['productDetail'];
    $imageThumnail=$data['imageThumbail'];
    $allComment = $data['allComment'];
    $sameProduct=$data["sameProduct"];
    $pagination = $data["pagination"];


?>
<div class="banner-page">
        <img   class=" img-banner-page img-responsive" src="template/images/banner/banner.png" >
        <p data-wow-duration="2s"  class="wow bounceIn text-banner">CHI TIẾT SẢN PHẨM </p>
</div>
    <div class="page-content">
        <div class="maincontent-area">
            <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!--HÌNH LỚN SẢN PHẨM-->
                    <div class="img-frame">
                        <img  id="zoomdemo" src="template/images/products/<?php 
                                if(isset($_GET['url']) && $productDetail->stt=$productDetail->tenhinh) echo $productDetail->tenhinh;?>" data-zoom-image="template/images/products/<?php if(isset($_GET['url'])) 
                                    echo $productDetail->tenhinh; ?>" />
                      
                    </div>
                    <!---->
                </div>
               
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                    <div style="padding-top:35px">
                        <!--TÊN SẢN PHẨM-->
                        <h2 class="name-product-detail" ><?=$productDetail->tensp?></h2>             
                        <!---->

                        <!--GIÁ SẢN PHẨM-->
                        <div class="price-product-detail">     
                            <ins>
                                <?php if($productDetail->giagiam!=$productDetail->gia){
                                        echo number_format($productDetail->giagiam,0,',','.')." VND"; 
                                    }
                                    else{
                                        echo number_format($productDetail->gia,0,',','.')." VND"; 
                                    }
                                    
                                ?>
                            </ins>
                            <del>
                                <?php if($productDetail->giagiam==$productDetail->gia){
                                        echo '';
                                }
                                else{
                                    echo number_format($productDetail->gia,0,',','.')." VND";
                                    
                                }
                                ?>
                            </del>
                        </div>
                        <!---->

                        <!--GIẢM GIÁ-->
                        <div class="sale-product-detail"><?php if($productDetail->giagiam!=$productDetail->gia) echo "Giảm giá "."&nbsp;"."<label class='label label-warning percent-product-price'>".number_format($productDetail->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        <!---->
                        
                        <!--THƯƠNG HIỆU SẢN PHẨM-->
                        <div class="brand-name-detail">Thương hiệu: <span class="brand-name"><?=$productDetail->ten?></span></div>
                        <!---->

                        <!--ĐÁNH GIÁ TB SẢN PHẨM-->
                        <div class="tongdanhgia">
                            <div class="rating-detail-product">
                                <!-- <select class="rating"> -->
                                <?php 
                                echo '<span class="star-color">';
                                echo star_rating($productDetail->dgtb);
                                echo '</span>';?>
                                <!-- <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option> -->
                                <!-- </select> -->         
                            </div>&nbsp;
                            <span><?=number_format($productDetail->dgtb,2,",","");?> &nbsp;/&nbsp;<?=count($allComment);?> người đánh giá</span>
                        </div>
                        <!---->

                        <!--TÌNH TRẠNG SẢN PHẨM-->
                        <div class="tinh-trang">Tình trạng : <span><?php if($productDetail->soluongton<=0) echo "<b style='color:red'>Hết hàng</b>"; else echo "<b style='color:green'>Còn hàng</b>"; ?></span></div> </div>
                        <input type="hidden"  name="maSanPham" value="<?=$productDetail->ma_sanpham?>" class="idProduct" >
                        <!---->

                        <!--SỐ LƯỢNG SẢN PHẨM-->
                        <div class="formSoLuong">
                            <form class="form-inline" action="" >	     
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        
                                        <input style="width:140px" class="soLuongSP" type="text" value="1" minlength="1"  maxlength="100"  />
                                    </div>
                                    
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <div class="btn-plus-minus">
                                            <button class="btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                           <button class="btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                    <a  href="javascript:void(0)" dataId="" ><button  type="button" class="btn btnAddToCart">Thêm vào giỏ hàng</button></a>
                                
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <!---->

                        <!--HÌNH THUMBNAIL-->
                        <div id="gallery_01">
                            <?php foreach($imageThumnail as $img):?>
                            <a  href="#" data-image="template/images/products/<?php
                                if($img->stt=$img->tenhinh  ) 
                                    echo $img->tenhinh; ?>" data-zoom-image="template/images/products/<?php
                                if($img->stt=$img->tenhinh  ) 
                                    echo $img->tenhinh; ?>">
                            <img  class="hinhnho " alt="<?=$productDetail->tensp?>"  src="template/images/products/<?php 
                                if($img->stt=$img->tenhinh ) 
                                    echo $img->tenhinh;?>" />
                            </a>
                            <?php endforeach?>
                        </div>
                        <!---->

                        <!--MẠNG XÃ HỘI-->
                        <div class="mxh">
                            <div class="fb-like" data-href="http://localhost:8080/website ban dien thoai/chi-tiet-san-pham.php" data-layout="standard"
                                data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            </div>
                        </div>  
                        <!---->

                    </div>  
                </div>
            </div>
        </div>

        <!--THÔNG TIN CHI TIẾT-->
        <div class="maincontent-area">
            <div class="container">
            
                <div role="tabpanel" class="thong-tin-sp">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#mo-ta-sp"  aria-controls="mo-ta-sp" role="tab" data-toggle="tab">Mô tả chi tiết sản phẩm</a>
                        </li>
                        <li role="presentation">
                            <a href="#danh-gia-sp" aria-controls="danh-gia-sp" role="tab" data-toggle="tab">Tất cả bình luận sản phẩm (<?=count($allComment)?>)</a>
                        </li>
                        <li role="presentation">
                            <a href="#nguoi-dung-danh-gia-sp" aria-controls="nguoi-dung-danh-gia-sp" role="tab" data-toggle="tab">Đánh giá của bạn cho sản phẩm</a>
                        </li>
                    </ul>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="mo-ta-sp">
                            <div class="mo-ta-chi-tiet">
                                <?=$productDetail->mota?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="danh-gia-sp">
                            <div class="noi-dung-binh-luan">
                                <div class="tat-ca-binh-luan container">
                                    <?php if(count($allComment)==0)
                                            echo "<h2>Chưa có bình luận </h2>";
                                        else{
                                    ?>
                                    <?php foreach($allComment as $cmt):?>
                                    <div class="mot-binh-luan<?=$cmt->ma_ngdung;?> row">
                                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1" style="text-align:center">
                                             <i class="fa fa-user fa_user " aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-11 col-lg-11 col-sm-11 col-xs-11">
                                            <p class="ten-tk"><?=$cmt->tendn;?>
                                                <span class="chinh-sua-binh-luan">
                                                    <i title="Chỉnh sửa bình luận" class="btn-open-update-cmt fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    <a href="#" class="btn-open-del-cmt"  name="btn-open-del-cmt" dataId1="<?= $cmt->ma_sanpham;?>" dataId="<?= $cmt->ma_ngdung; ?>" ><i title="Xoá bình luận này" class=" fa fa-remove"></i></a>
                                                </span>
                                            </p>
                                        
                                            <p class="tk-rating-product">
                                  
                                                <?php 
                                                echo '<span class="star-color">';
                                                echo star_rating($cmt->rating);
                                                echo '</span>';?>
                                                <!-- <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option> -->
                                                
                                                <!-- </select> -->
                                            </p>
                                            <p><?=$cmt->noidung;?></p>
                                            <p class="ngay-binh-luan"><?php $cmt->ngaydanhgia = date_create(); echo date_format($cmt->ngaydanhgia,"d-m-Y H:i");?></p>  
                                        </div>
                                    </div>
                                    <? endforeach?>
                                    <?php }?>
                                    <!-- <div class="mot-binh-luan row">

                                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1" style="text-align:center">
                                             <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-11 col-lg-11 col-sm-11 col-xs-11">
                                            <p class="ten-tk">tam123
                                                <span class="chinh-sua-binh-luan">
                                                <i title="Chỉnh sửa bình luận" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                <i title="Xoá bình luận này" class="fa fa-remove"></i></span>
                                            </p>
                                        
                                    
                                            <p>Sản phẩm đẹp</p>
                                            <p class="ngay-binh-luan">16/03/2018</p>  
                                        </div>
                                    </div> -->
                                </div>
                               
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="nguoi-dung-danh-gia-sp">
                            <div class="row">
                                <form id="formNguoiDungDanhGia" action="" method="POST" role="form">
                                    <div class="margin-form">
                                        <div class="form-group">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <div class="label-form-danh-gia"><label for="">Đánh giá của bạn</label></div>
                                            </div>
                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                <select  name="rating" class="rating">
                                                    <?php for($i=1;$i<6;$i++):?>
                                                    <option value=""></option>
                                                    <option value="<?=$i?>" <?php  echo "selected"?> ><?=$i;?></option>
                                                    <!-- <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> -->
                                                    <?php endfor?>
                                                </select>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margin-form">
                                        <div class="form-group">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <div class="label-form-danh-gia"><label for="">Nhận xét của bạn</label></div>
                                            </div>
                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                <textarea name="inputCmt" required oninvalid="this.setCustomValidity('Bạn chưa nhập nhận xét')"
                                                 oninput="setCustomValidity('')" id="inputCmt" name="cmt"  class="form-control inputCmt" rows="3" placeholder="Nhập bình luận . . ."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margin-form">
                                        <div class="form-group">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                <button type="submit" name="btn-User-Rating" class="btn btnForm">Gửi đánh giá</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---->

        <!--SẢN PHẨM CÙNG LOẠI-->
        <div class="maincontent-area">
            <div data-wow-durian="2s" class="container wow fadeInUp">
                <h2 class="section-title">SẢN PHẨM CÙNG LOẠI </h2>
                <div class="divided-block">
                    <div class="divided-block_line"></div>
                    <div class="divided-block_square"></div>
                    <div class="divided-block_line"></div>
                </div>
                
                <div class="row">
                <?php if(count($sameProduct)==0)
                                echo "<h2>Sản phẩm chưa được cập nhật</h2>";
                                else{
                ?>
                    <?php foreach($sameProduct as $sp):?>
                     
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
                        <?php }?>
                     <!--<ul class="pagination pagination-lg">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>-->
                </div>
                <?= $pagination ?>
            </div>
        </div>
        <!---->
    </div>
  
<div class="modal fade" id="modalUpdateCmt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cập nnật bình luận</h4>
            </div>
            <div class="modal-body">
                    <form id="formCapNhatNguoiDungDanhGia" action="" method="POST" role="form">
                        <div class="nd-form-cap-nhat-danh-gia">
                            <div class="margin-form">
                                <div class="form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <div class="label-form-danh-gia"><label for="">Đánh giá của bạn</label></div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <select  name="rating" class="rating">
                                            <?php for($i=1;$i<6;$i++):?>
                                            <option value=""></option>
                                            <option value="<?=$i?>" <?php  echo "selected"?> ><?=$i;?></option>
                                            <!-- <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option> -->
                                            <?php endfor?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="margin-form">
                                <div class="form-group">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <div class="label-form-danh-gia"><label for="">Nhận xét của bạn</label></div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <textarea name="inputUpdateCmt" required oninvalid="this.setCustomValidity('Bạn chưa nhập nhận xét')"
                                            oninput="setCustomValidity('')" name="cmt" id="inputUpdateCmt" class="form-control inputUpdateCmt" rows="3" placeholder="Nhập bình luận . . ."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" >
                            <div class="form-group">  
                                <button type="button" class="btn btnForm btnUpdateCmt">Cập nhật</button>
                                <button type="button" class="btn btnForm" data-dismiss="modal">Huỷ</button>
                            
                            </div>
                        </div>
                             
                    </form>
              
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelCmt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xoá bình luận</h4>
            </div>
            <div class="modal-body">
                <p>Bạn muốn xoá bình luận này?</p>
            </div>
            <div class="modal-footer">
                <button name="btnDeleteCmt" type="button" class="btn btnForm btnDeleteCmt">Đồng ý</button>
                <button type="button" class="btn btnForm" data-dismiss="modal">Huỷ</button>
              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCapNhatCmtThanhCong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Cập nhật thành công</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalXoaCmtThanhCong">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Xoá bình luận thành công</p>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" >
     $(document).ready(function(){
        $('.soLuongSP').keyup(function(){
        var q = $(this).val();
        //console.log(q);
            if(isNaN(q)){
                alert('Vui lòng nhập số');
            }
        });
       
      
        
        $(".btn-plus").click(function(){
            var sl=$(".soLuongSP").val();
            sl=parseInt(sl);
          
            sl=$(".soLuongSP").val(sl+1);
            if($(".soLuongSP").val()>=100){

                $(".btn-plus").attr("disabled","true");
            }
           
          
        });

        $(".btn-minus").click(function(){
            var sl=$(".soLuongSP").val();
            sl=parseInt(sl);
         
            
            if($(".soLuongSP").val()<1){
                $(".btn-minus").attr("disabled","true");
            }
            else if($(".soLuongSP").val()>1){
                sl=$(".soLuongSP").val(sl-1);
                $(".btn-minus").prop("disabled");
            }
        })

        $(".btnAddToCart").click(function(){
            var quantity = parseInt($(".soLuongSP").val());
            var idProduct = $(".idProduct").val();

            // $.ajax({
            //     url:"gio-hang.php",
            //     type:"POST",
            //     data:{
            //         "soluong":quantity, 
            //         "masanpham" :idProduct
                    
            //     },
            //     //Gọi phương thức ajaxAddToCart bên layout.php vì
            //     // giỏ hàng là sử dụng chung cho all page
               
            // });
            ajaxAddToCart(quantity,idProduct);//Truyền 2 tham sô bên phải của mảng data 
        });

        $(".btn-open-update-cmt").click(function(){
            $("#modalUpdateCmt").modal("show");
           
        });
        $(".btn-open-del-cmt").click(function(){
            var idCmt = $(this).attr("dataId");
            var idSP =$(this).attr("dataId1");
          
            $("#modalDelCmt").modal("show");
            if(idCmt!=""){
                $(".btnDeleteCmt").click(function(){
                    $.ajax({
                        url: window.location.href,
                        type:"POST",
                       
                        data:{
                        "manguoidung":idCmt,
                        "masanpham":idSP,
                        action:"deleteCmt"
                        },
                        success:function(){
                            $("#modalDelCmt").modal("hide");
                            idCmt="";
                        
                            //Custom lại vị trí thông báo
                            toastr.options = {
                                "positionClass": "toast-top-center",
                            }
                            toastr.success('', 'Xoá thành công', {timeOut: 2000});
                         
                        },
                        error:function(){
                            console.log("lỗi");
                        }
                    });
                });
            }
            
        });
    });
</script>