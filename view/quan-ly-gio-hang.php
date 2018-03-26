<?php 
//ob_clean();
ob_start();
if(!isset($_SESSION))
session_start();
?>
<div class="banner-page">
        <img  class=" img-banner-page img-responsive" src="template/images/banner/banner.png" >
           <p data-wow-duration="2s" class="wow bounceIn text-banner">QUẢN LÝ GIỎ HÀNG </p>
</div>
    <div class="page-content">
        <div class="maincontent-area">
            <div class="container">
                <div class="quanlygiohang">
                    <div class="mess-cart">
                    <?php if($data->totalPrice==0)
                            echo "<h2>Giỏ hàng rỗng hoặc chưa có sản phẩm</h2>"
                        
                    ?>
                    </div>
                    <table class="table-list-order table table-responsive">
                        <thead style="background-color: #1c5fc0;color:white">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Biến data là bên file Controller.php truyền qua-->
                            <?php foreach($data->items as $idSP=>$sp):?>
                            <tr class="sanpham-<?=$idSP?>">
                                <td>
                                    <img class="img-cart" src="template/images/products/<?=$sp['item']->tenhinh;?>">
                                </td>
                                <td>
                                    <p><b><?= $sp['item']->tensp?></b></p>
                                </td>
                                <td>
                                    <select name="slsp"  dataId="<?=$idSP?>" id="slsp" class="slsp form-control" >
                                        <!-- <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option> -->
                                        <?php for($i=1; $i<11; $i++):?>
                                            <option  value="<?=$i?>" <?= $i==$sp['qty'] ? "selected" : ''?> ><?=$i?></option>
                                        <?php endfor?>
                                    </select>
                                </td>
                                
                                <td ><?=number_format($sp['price'],0,"",".")." VND"?></td>
                                <td class="gia-<?=$idSP?>"><?=number_format($sp['item']->giagiam,0,"",".")." VND"?></td>
                                <td><a dataId="<?=$idSP?>" class="removeItem" title="Xoá khỏi giỏ hàng" href="#"><i class="fa fa-trash-o fa-2x"></i></a></td>          
                            </tr>
                            <?php endforeach?>
                            <tr style="color: red; font-size: 18px;font-weight: bold">
                                <td colspan="3">Tổng tiền</td>
                                <td colspan="2" class="tongtien"><?=number_format($data->totalPrice,0,"",".")." VND";?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="section-title">ĐẶT HÀNG</h2>
                <div class="divided-block">
                    <div class="divided-block_line"></div>
                    <div class="divided-block_square"></div>
                    <div class="divided-block_line"></div>
                </div>
                <br>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input name="nameCustomer" type="text" placeholder="Họ và tên người nhận" class="form-control" required="required" oninvalid="this.setCustomValidity('Xin hãy nhập họ và tên')"
                                oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input name="emailCustomer" type="email" placeholder="Nhập Email xác nhận đơn hàng" class="form-control" required="required" oninvalid="this.setCustomValidity('Email có định dạng abc@gmail.com')"
                                oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                              <div class="fa fa-map-marker"></div>
                            </div>
                            <input name="addressCustomer" type="text" placeholder="Nhập địa chỉ người nhận" class="form-control" required="required" oninvalid="this.setCustomValidity('Xin hãy nhập địa chỉ của bạn')"
                                oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                                <div class="input-group-addon">
                                <div class="fa fa-phone"></div>
                                </div>
                                <input name="phoneCustomer" type="text" placeholder="Điện thoại" class="form-control" oninvalid="this.setCustomValidity('Xin hãy nhập số điện thoại của bạn')"
                                oninput="setCustomValidity('')">
                         </div>
                    </div>
                  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-inline">
                            <div class="radio-inline">
                                <label for="pay">
                                <input name="pay" type="radio" class="pay" id="pay" >
                                    Thanh toán bằng tiền mặt</label>
                                    
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="radio-inline">
                                <label for="pay1">
                                <input name="pay" type="radio" class="pay1" id="pay1">
                                    Thanh toán bằng tài khoản ngân hàng</label>
                                    
                            </div>
                        </div>
                     </div>
                    <div class="form-group">
                          <textarea style="resize: none" rows="8" name="messCustomer" placeholder="Nội dung" class="form-control" ></textarea >
                    </div>
                    
                 
                    <div class="order">
                        <button type="submit" class="btn btnOrder">Gửi đơn hàng</button>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>


<div class="modal fade" id="modalDeleteItemProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xoá sản phẩm</h4>
            </div>
            <div class="modal-body">
                <p>Bạn muốn xoá sản phẩm này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnForm btnDeleteItem">Đồng ý</button>
                <button type="button" class="btn btnForm" data-dismiss="modal">Huỷ</button>
              
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalSuccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Xoá sản phẩm thành công</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        //Xoá 1 sản phẩm
        $(".removeItem").click(function(){
            var id = $(this).attr("dataId");
            $("#modalDeleteItemProduct").modal("show");
            $(".btnDeleteItem").click(function(){
                if(id!=""){
                    $.ajax({
                        url:"gio-hang.php",
                        type:"POST",
                        dataType:"JSON",
                        data:{
                            "id":id,
                            action:"deleteItem"
                        },
                       
                        success:function(data){
                            if(data==0){
                                $(".mess-cart").html("<h2>Giỏ hàng rỗng hoặc chưa có sản phẩm nào</h2>")
                            }
                         
                            $("#modalDeleteItemProduct").modal("hide");
                            $(".sanpham-"+id).hide(500);
                            $(".sumCart").html(data.tongSanPham);
                            $(".tongtien").html(data.tongTien+ " VND");
                            id="";
                            
                            $("#modalSuccess").modal("show");
                              
                            
                        },
                        error:function(){
                            console.log("lỗi");
                        }
                    
                    })
                }
            });
        
        });

        //Cập nhật sản phẩm
        $(".slsp").change(function(){
            var quantity = $(this).val();
            var idProduct = $(this).attr("dataId");
            //console.log(idProduct);
            $.ajax({
                url:"gio-hang.php",
                type:"POST",
              
                data:{
                    "masanpham":idProduct,
                    "soluong":quantity,
                    action:"updateItem"
                },
                dataType:"JSON",
                success:function(data){
                  
                    $(".gia-"+idProduct).html(data.thanhTien+" VND");
                    $(".tongtien").html(data.tongTien+ " VND");
                    //$(".sumCart").html(data.tongSanPham);
                            
                },
                error:function(){
                    console.log("lỗi");
                }
            });
        });
    })
 
</script>