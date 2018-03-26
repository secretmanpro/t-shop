<?php 
    $product = $data['product'];
    $productBrand = $data['productBrand'];
    $productType =$data['productType'];
    $pagination = $data['pagination'];
    $countFilterProduct= $data["countFilterProduct"];
    $countSearch = $data["countSearch"];
?>
    <div class="banner-page">
        <img   class=" img-banner-page img-responsive" src="template/images/banner/banner.png" >
        <p data-wow-duration="2s"  class="wow bounceIn text-banner">TÌM KIẾM </p>
    </div>
    
 
    <div class="page-content">
        <div class="maincontent-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="title-product" style="font-size: 20px"><span style="font-size: 20px" class="label label-success">TÌM KIẾM NÂNG CAO</span>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <form class="form-horizontal" id="formTimKiemNC" style="margin-top: 20px" action="tim-kiem.php" method="GET"  role="form">
                                        <div class="form-group">
                                            <label class="col-sm-2" for="keyword">Từ khoá</label>
                                            <div class="col-sm-10">
                                            
                                            <input value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'];?>" type="text"  class="keyword form-control col-sm-10" id="keyword" placeholder="Nhập từ khoá .... "  name="keyword"/ >
                                           
                                        </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" for="maloai">Loại sản phẩm</label>
                                            <div class="col-sm-10">
                                                <select  name="maloai" id="maloai" class="form-control maloai" >
                                                    <option  value="">----Chọn----</option>
                                                    <?php foreach($productType as $lsp):?>
                                                    <option  value="<?php  echo $lsp->ma_loaisp?>" 
                                                        <?php if(isset($_GET["maloai"])) if($lsp->ma_loaisp==$_GET["maloai"])
                                                        { echo 'selected="selected"';} ?> >
                                                        <?php echo $lsp->tenloai;?>

                                                    </option>
                                                 
                                                    <!-- <option value="2">Điện thoại thông minh - Smart Phone</option>
                                                    <option value="3">Phụ kiện</option>
                                                    <option value="4">Máy tính bảng</option> -->
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" for="mathuonghieu">Thương hiệu</label>
                                            <div class="col-sm-10">
                                                <select  name="mathuonghieu" class="form-control mathuonghieu">----Chọn----</option>
                                                    <option value="">----Chọn----</option>
                                                    <?php foreach($productBrand as $th):?>
                                                     
                                                    <option value="<?php echo $th->ma_thuonghieu?>"  <?php if(isset($_GET["mathuonghieu"])) if($th->ma_thuonghieu==$_GET["mathuonghieu"]) echo 'selected="selected"'; ?>>
                                                        <?=$th->ten?></option>
                                                    <!-- <option value="2">Samsung</option>
                                                    <option value="3">Oppo </option>
                                                    <option value="4">LG</option>
                                                    <option value="5">Sony</option>
                                                    <option value="6">Nokia</option>
                                                    <option value="7">Asus</option>
                                                    <option value="8">HTC</option>
                                                    <option value="9">Dell</option>
                                                    <option value="10">Khác</option> -->
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2" >Giá tiền</label>
                                            <div class="col-sm-5">
                                                
                                                <input value="<?php if(isset($_GET['minPrice'])) echo $_GET['minPrice'];?>" placeholder="Nhập giá : ví dụ 10000" type="number" class="form-control minPrice" id="minPrice" min='0' name="minPrice">
                                              
                                            </div>

                                            <div class="col-sm-5">
                                           
                                                <input  value="<?php if(isset($_GET['maxPrice'])) echo $_GET['maxPrice'] ;?>" placeholder="2000000 (Đơn vị tính VND )" type="number" class="form-control maxPrice" id="maxPrice" min='1' name="maxPrice" >
                                        
                                            </div>
                                            <p style="text-align:center"><small>Lưu ý: Bạn nhập giá: 1 = 1000 VND</small></p>
                                        </div>

                                        <div align="center" class="form-group">
                                            <div class="btn-group">
                                                <button type="submit" name="btnTimNC" id="btnTimNC"  class="btnTimNC btn btn-success">Tìm kiếm</button>
                                                <button type="button" name="btnXoaForm" id="btnXoaForm" class="btn btn-default">Xoá Form</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="maincontent-area">
            <div class="container">
                    <div style="margin-top:20px" class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="title-product">
                                <?php 
                                $none="<h2>"."Không tìm thấy sản phẩm nào phù hợp"."</h2>"; 
                                $rs1= "<p>"."TÌM THẤY"."&nbsp;"."<span style='font-size: 20px' class='label label-success'>".
                                count($countSearch)."&nbsp;"."SẢN PHẨM"."</span>"."&nbsp;"."&nbsp;". "TỪ KHOÁ"."&nbsp;"."&nbsp;"."<span style='font-size: 20px' class='label label-warning'>".$_GET["keyword"]."</span>"."</p>";
                                $rs2= "<p>"."TÌM THẤY"."&nbsp;"."<span style='font-size: 20px' class='label label-success'>".
                                count($countFilterProduct)."&nbsp;"."SẢN PHẨM"."</span>"."&nbsp;"."&nbsp;". "TỪ KHOÁ"."&nbsp;"."&nbsp;"."<span style='font-size: 20px' class='label label-warning'>".$_GET["keyword"]."</span>"."</p>";
                               
                                if(isset($_GET["btnSearch"])){
                                    if(count($countSearch)==0)
                                        echo $none;
                                    else{
                                        echo $rs1;
                                    } 
                                }
                                elseif(isset($_GET["btnTimNC"])){
                                    if(count($countFilterProduct)==0)
                                        echo $none;
                                    else{
                                        echo $rs2;
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
                                        <select class="rating">
                                            <?php for($i=1;$i<6;$i++):?>
                                            <option value="<?=$i?>" <?php if($i==$sp->danh_gia_tb) echo "selected" ;?>><?=$i;?></option>
                                            <!-- <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option> -->
                                            <?php endfor?>
                                        </select>
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