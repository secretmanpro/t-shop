<?php
    $userInfo =  $data["userInfo"];
    //session_start();
?>

<div class="banner-page">
    <img class=" img-banner-page img-responsive" src="template/images/banner/banner.png">
    <p data-wow-duration="2s" class="wow bounceIn text-banner">TÀI KHOẢN NGƯỜI DÙNG </p>
</div>
<div class="page-content">

    <div class="maincontent-area">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active">
                    <a  href="tai-khoan-nguoi-dung.php">THÔNG TIN TÀI KHOẢN</a>
                </li>
                <li>
                    <a href="cap-nhat-tai-khoan.php">CẬP NHẬT TÀI KHOẢN</a>
                </li>
                <li>
                    <a href="lich-su-mua-hang.php">LỊCH SỬ MUA HÀNG</a>
                </li>
                <li>
                    <a href="danh-gia-san-pham.php">SẢN PHẨM ĐÁNH GIÁ</a>
                </li>
            </ul>
            <div class="myaccount">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="color:red;font-size:20px;" colspan="2">THÔNG TIN TÀI KHOẢN</th>
                            </tr>
                        </thead>
                        <?php if(isset($_SESSION["tendn"]) || isset($_COOKIE["tendn"])){
                            echo "<tbody>
                            <tr>
                                <td>TÊN ĐĂNG NHẬP</td>
                                <td>".$userInfo->tendn."</td>
                            </tr>
                            <tr>
                                <td>EMAIL</td>
                                <td>".$userInfo->email."</td>
                            </tr>
                            <tr>
                                <td>MẬT KHẨU</td>
                                <td>".(str_repeat('*',strlen($userInfo->matkhau)))."</td>
                            </tr>
                            <tr>
                                <td>HỌ VÀ TÊN</td>
                                <td>".$userInfo->hoten."</td>
                            </tr>
                            <tr>
                                <td>GIỚI TÍNH</td>
                                <td>".$userInfo->gioitinh."</td>
                            </tr>
                            <tr>
                                <td>ĐIỆN THOẠI</td>
                                <td>".$userInfo->dienthoai."</td>
                            </tr>

                        </tbody>";
                        }?>
                        
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="2">
                                   <a href="cap-nhat-tai-khoan.php"> <button type="button" class=" btn btn-primary btnEditAccout">CHỈNH SỬA TÀI KHOẢN</button></a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>