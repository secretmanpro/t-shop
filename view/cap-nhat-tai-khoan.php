

<div class="banner-page">
    <img class=" img-banner-page img-responsive" src="template/images/banner/banner.png">
    <p data-wow-duration="2s" class="wow bounceIn text-banner">CẬP NHẬT TÀI KHOẢN NGƯỜI DÙNG </p>
</div>
<div class="page-content">
    <div class="maincontent-area">
        <div class="container">

            <ul class="nav nav-pills">
                <li>
                    <a href="tai-khoan-nguoi-dung.php">THÔNG TIN TÀI KHOẢN</a>
                </li>
                <li class="active">
                    <a  href="cap-nhat-tai-khoan.php">CẬP NHẬT TÀI KHOẢN</a>
                </li>
                <li>
                    <a href="lich-su-mua-hang.php">LỊCH SỬ MUA HÀNG</a>
                </li>
                <li>
                    <a href="danh-gia-san-pham.php">SẢN PHẨM ĐÁNH GIÁ</a>
                </li>
            </ul>




            <div class="myaccount ">
                <form action="" method="POST" id="formUpdateAccount" class="form-horizontal" role="form">
                    <div class="text-center form-group">
                        <h2 style="font-size:20px;color:red;font-weight:bold;">CẬP NHẬT TÀI KHOẢN</h2>
                    </div>
        
                    <div class="form-group ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label " for="">Mật khẩu cũ</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <input type="password" class="form-control input-inline" name="passOldUpdate" placeholder="Nhập mật khẩu cũ ">
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label " for="">Mật khẩu mới</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <input type="password" class="form-control input-inline" name="passUpdate" placeholder="Nhập mật mới ">
                        </div>

                    </div>

                    <div class="form-group ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label" for="">Email</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <input type="email" class="form-control input-inline" name="emailUpdate" placeholder="Nhập Email mới">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label" for="">Họ tên</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <input type="text" class="form-control input-inline" name="nameUpdate" placeholder="Nhập họ tên ">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label" for="">Điện thoại</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <input type="text" class="form-control input-inline" name="phoneUpdate" placeholder="Nhập số điện thoại ">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label" for="">Giới tính</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                            <label class="radio-inline">
                                <input type="radio" value="nam" name="sexUpdate">Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="nữ" name="sexUpdate">Nữ
                            </label>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-sm-10 ">
                            <button type="submit" name="btnUpdateAccount" class="btn btn-primary btnUpdateAccount">CẬP NHẬT TÀI KHOẢN</button>
                            <button type="submit" name="btnDelFormAcc" class="btn btn-default btnDelFormAcc">Huỷ</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>