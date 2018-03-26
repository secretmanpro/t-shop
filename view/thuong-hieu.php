<?php 
    $product = $data['product'];
    $nameBanner = $data['nameBanner'];
    $countAllProductBrandById = $data['countAllProductBrandById'];
    $pagination = $data['pagination'];
?>
    <div class="banner-page">
        <img   class=" img-banner-page img-responsive" src="template/images/banner/banner.png" >
        <?php foreach($nameBanner as $sp):?>
              
          <p data-wow-duration="2s"  class="wow bounceIn text-banner">THƯƠNG HIỆU 
            <?php  if(isset($_GET["mathuonghieu"])) echo mb_strtoupper($sp->ten,"UTF-8");?> </p>
        <?php endforeach?>
    </div>
     
    <div class="page-content">
        
        <div class="maincontent-area">
            <div class="container">
                    <div style="margin-top:20px" class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="title-product">
                            <?php 
                                $none="<h2>"."Sản phẩm của thương hiệu này chưa được cập nhật"."</h2>"; 
                                $rs1= "<p>"."TÌM THẤY"."&nbsp;"."<span style='font-size: 20px' class='label label-success'>".
                                count($countAllProductBrandById)."&nbsp;"."SẢN PHẨM"."</span>";
                                if(isset($_GET["mathuonghieu"])){
                                    if(count($countAllProductBrandById)==0)
                                        echo $none;
                                    else{
                                        echo $rs1;
                                    } 
                                }
                            ?>
                              
                               
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <p>SẮP XẾP THEO</p>
                                            <div class="div-btn-view">
                                                <a class=" btn btn-default btn-view" href=""><i class="fa fa-th"></i></a>
                                                <a class="btn btn-default btn-view" href=""><i class="fa fa-list"></i></a>
                                            </div>
                                            <select name="sort" id="inputSort" class="form-control" required="required">
                                                <option selected="" value="">----Chọn----</option>    
                                             
                                                <option value="1">Giá từ thấp đến cao</option>
                                                <option value="2">Giá từ cao đến thấp</option>
                                                <option value="3">Bán chạy nhất nhất</option>
                                                <option value="4">Sản phẩm mới nhất</option>
                                                <option value="5">Rating cao</option>
                                                <option value="6">Sản phẩm được giảm giá nhiều nhất</option>
                                          
                                            </select>
                                
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="maincontent-area">
            <div class="container">
                <div class="row">
                    <?php foreach($product as $sp):?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="list-product">
                                <div class="sale"><?php if($sp->giagiam!=$sp->gia) echo "<label class='label label-warning percent-price'>"."Giảm giá "."&nbsp;".number_format($sp->phantramgiam,0,'','')."&nbsp;"."%"."</label>";?></div>
                        
                                <div class="img-product"> 
                                    <a title="Xem chi tiết" href="chi-tiet-san-pham.php?url=<?= $sp->url;?>" class="seeDetails">
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
    </div>
</div>
<script>
  $(function(){
    var page = "<?= 
      isset($_GET['page'])? $_GET['page']:-1 ;

      ?>"
    
      if(page != -1){
          $('html , body').animate(
            {
              scrollTop: '2000px'
        });
      } 
  });
    
</script>