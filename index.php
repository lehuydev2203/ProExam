<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 06/06/2018
 * Time: 7:26 CH
 */

session_start();
$c = 0;
if (isset($_GET["c"])) {
    $c = $_GET["c"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php switch ($c) {
            //dùng switch case để gọi tên trang theo yêu cầu
            case 0:
                echo "Trang Chủ";
                break;
            case 1:
                echo "Giới Thiệu";
                break;
            case 2:
                echo "Sản Phẩm";
                break;
            case 3:
                echo "Video";
                break;
            case 4:
                echo " Tin Tức - Sự Kiện";
                break;
            case 5:
                echo "Hướng Dẫn";
                break;
            case 6:
                echo "Liên Hệ";
                break;
            case 7:
                echo "Hình thức thanh Toán";
                break;
            case 8:
                echo "Các hình thức vận chuyển ";
                break;
            case 101:
                echo "Sản Phẩm ";
                break;
            case 102:
                echo "Chi Tiết Sản Phẩm ";
                break;
            case 103:
                echo "Tìm Kiếm Sản Phẩm ";
                break;
            default;
                echo " Bạn đang xâm nhập bất hợp pháp ";
        } ?></title>
    <link rel="icon" href="images/logoMstudio.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<!--header-->
<div class="header1 alert alert-success" style="margin-bottom: 0px;">
    <div class="row">
        <div class="offset-1"></div>
        <div class="col-lg-8">

            <div class="row">
                <div class="col-lg-5 col-md-12  col-sm-12" align="center">
                    <ul style="margin-bottom: 0px">
                        <?php //dùng if để kiểm tra session đã có tồn tại giá trị hay chưa
                        if (!isset($_SESSION["user"])) {

                            echo "<li><a href='resgistry.php'>ĐĂNG KÝ</a></li><li><a href='login.php'>ĐĂNG NHẬP</a></li>";
                        } else {
                            echo "<li><a href='" . "taikhoan.php?id=" . $_SESSION["user"] . "' >" . $_SESSION["name"] . "</a><li><a href='unlogin.php'>ĐĂNG XUẤT</a></li>";
                        };
                        ?>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12" align="right">
                    <a href="https://www.facebook.com/lehuy.roxyproduction"><img src="images/facebook-f.svg" alt=""
                                                                                 width="12" class="fil"></a>
                    <a href="https://www.facebook.com/lehuy.roxyproduction"><img src="images/google-plus-g.svg" alt=""
                                                                                 width="30" class="fil"></a>
                    <a href="https://www.youtube.com/channel/UCgIXmXAWlHf6WcmFGErNbCg"><img src="images/youtube.svg"
                                                                                            alt="" width="25"
                                                                                            class="fil"></a>
                    <img src="images/phone.svg" alt="" width="25" class="fil"></i> 01881234123 - 01632788979
                </div>
            </div>
        </div>
        <div class="offset-1"></div>
    </div>

</div>
<div class="header2 alert alert-danger" style="margin-bottom: 0px;">
    <div class="row">
        <div class="offset-1"></div>
        <div class="col-10">
            <div class="row">

                <div class="col-lg-2  col-md-12 col-sm-12"  align="center"><img src="images/logo.png" alt="" class="fl" height="100px"></div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row"><!--chức năng đang còn cập nhập nên chúng ta sẽ disable và sử dụng tooltip để thông báo -->
                        <div class="col-lg-2  "></div>
                        <div class="col-lg-8  col-md-12 col-sm-12" align="center">
                            <form action="index.php?c=103" method="post" class="form-inline centered"  >

                                <div style="margin-left: 40px ;" >
                                    <input type="text" name="txtsearch" class="form-control mx-md-2 mb-2"
                                           style="width:400px;margin:8px;" placeholder="Tìm kiếm sản phẩm..." >
                                </div>

                                <span>
                                    <button  type="submit" class="btn btn-primary"  style="cursor:pointer; margin:30px 0;"><img src="images/search.svg.png" alt="" height="20"></button>
                                </span>

                            </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>

                <div class="col-lg-2  col-md-12 col-sm-12" align="center">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Coming soon!!!">
                        <button  type="submit" class="btn btn-primary" name="txtgiohang" style="pointer-events: none; margin:30px 0;" disabled="disabled"><i class="fa fa-shopping-cart"> Giỏ hàng </i></button>
                    </span>
                </div>

            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<div class="header3 alert alert-success" style="margin-bottom: 0;">
    <div class="row">
        <div class="offset-1"></div>
        <div class="col-lg-10 col-md-12 col-sm-12 ">
            <ul style="margin-bottom:0px">
                <li><a href="index.php?c=0">TRANG CHỦ</a></li>
                <li><a href="index.php?c=1">GIỚI THIỆU</a></li>
                <li><a href='index.php?c=2'>SẢN PHẨM</a></li>
                <li><a href="index.php?c=3">VIDEO</a></li>
                <li><a href="index.php?c=4">TIN TỨC - SỰ KIỆN</a></li>
                <li><a href="index.php?c=5">HƯỚNG DẪN</a></li>
                <li><a href="index.php?c=6">LIÊN HỆ</a></li>
                <li><a href="index.php?c=7">HÌNH THỨC THANH TOÁN</a></li>
                <li><a href="index.php?c=8">CÁC HÌNH THỨC VẬN CHUYỂN</a></li>
            </ul>
        </div>
        <div class="offset-md-1"></div>
    </div>

</div>
<!--/header-->


<!--main-->
<div class="header2 main alert alert-danger" style="margin-bottom: 0px;">
    <div class="row">
        <div class="offset-lg-1"></div>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-2" align="center">
                    <?php include "modules/mMenu.php" //gọi mMenu?>
                </div>
                <div class="col-lg-10">
                    <?php switch ($c) {
                        //dùng switch case để gọi trang theo yêu cầu
                        case 0:
                            include "modules/mHome.php";//gọi giao diện trang chủ
                            break;
                        case 1:
                            include "modules/mPromotion.php";//gọi giao diện giới thiệu
                            break;
                        case 2:
                            include "modules/mProduct.php";//gọi giao dine65 trang sản phẩm
                            break;
                        case 3:
                            include "modules/mVideos.php";//gọi giao diện trang video
                            break;
                        case 4:
                            include "modules/mNews.php";//gọi giao diện trang tin tức
                            break;
                        case 5:
                            include "modules/mHowto.php";//gọi giao diện trang hướng dẫn
                            break;
                        case 6:
                            include "modules/mContact.php";//gọi giao diện trang liên hệ
                            break;
                        case 7:
                            include "modules/mWaypay.php";//gọi giao diện trang hình thức thanh toán
                            break;
                        case 8:
                            include "modules/mDelivery.php";// gọi giao diện trang cac hình thức vận chuyển
                            break;
                        case 101:
                            include "modules/mSanpham.php";//gọi giao diện ttrang sản phẩm theo danh mục
                            break;
                        case 102:
                            include "modules/mProductMore.php";//gọi trang chi tiết sản phẩm
                            break;
                        case 103:
                            include "modules/mShowsreach.php";
                            break;
                        default;
                            include "modules/mError.php";//gọi trang thông báo lỗi nếu truy cập ngoài switch case đã được định sẵn
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<span class="padding-10"></span>
<!--main-->

<!--footer-->
<div class="footer alert alert-light">
    <div class="row">

        <div class="offset-lg-1"></div>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-3">
                    <h1>Về Chúng tôi</h1>
                    <h6>Dụng cụ nghề Hoàng Long là nơi cho bãn thỏa sức mua sắm dụng cụ làm bánh mà không lo về
                        giá.</h6>
                    <h6><img src="images/map-marker.svg" alt="" width="10px"> 46 - Võ Thị Sáu - P. Quyết Thắng - TP Biên
                        Hòa - Đồng Nai</h6>
                    <h6><img src="images/phone.svg" alt="" width="10px"> 0917 701 001 - 0888 021 011 - dụng cụ bếp bánh
                    </h6>
                    <h6><img src="images/envelope-open.svg" alt="" width="10px"> dungcubepbanh@gmail.com</h6>
                    <br>
                    <h1>Thông tin tài khoản</h1>
                    <h6>1) Ngân hàng Vietcombank chi nhánh Trái Đất</h6>
                    <h6>Chủ Tài Khoản : Lê Đỗ Thanh Huy </h6>
                    <h6>Số Tài Khoản : 0123456789</h6>
                    <br>
                    <h6>2) Ngân hàng Techcombank chi nhánh Sao Hỏa</h6>
                    <h6>Chủ Tài Khoản : Lê Đỗ Thanh Huy </h6>
                    <h6>Số Tài Khoản : 0123456789</h6>
                    <img src="images/dathongbao.png" alt="" width="300">
                </div>
                <div class="col-lg-3">
                    <h1>Thông Tin</h1>
                    <ul>
                        <li><a href="">Trang Chủ</a><br></li>
                        <li><a href="">Sản Phẩm</a><br></li>
                        <li><a href="">Tin Tức</a><br></li>
                        <li><a href="">Liên Hệ - Địa Chỉ</a><br></li>
                    </ul>
                    <div id="fb-root"> <!--gọi giao diện page facebook-->
                        <div class="fb-page" data-href="https://www.facebook.com/aptechvietnam.com.vn/"
                             data-tabs="timeline" data-width="300" data-height="200" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/aptechvietnam.com.vn/"
                                        class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/aptechvietnam.com.vn/">Hệ thống Đào tạo Lập trình
                                    viên Quốc tế Aptech</a></blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 footer">
                    <h1>Quy Định Chung</h1>
                    <ul>
                        <li><a href="">Hướng dẩn mua hàng</a></li>
                        <li><a href="">Chính sách - qui định</a></li>
                        <li><a href="">Điều khoản dịch vụ</a></li>
                        <li><a href="">So Sánh Sản Phẩm</a></li>
                        <li><a href="">Tích lũy điểm thưởng</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 footer">
                    <h1>Mạng Xã Hội</h1>
                    <ul>
                        <li><a href="">Mua Trên Facebook</a></li>
                        <li><a href="">Mua Trên Sendo</a></li>
                        <li><a href="">Mua Trên Shopee</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="offset-lg-1"></div>
    </div>

    <div class="row">

        <div class="col align-self-center alert alert-primary" align="center">
            <h6>Phát Triển Bởi :
                <li style="display: inline-block;"><a href="https://www.facebook.com/lehuy.roxyproduction">Lê Huy</a>
                </li>
            </h6>
            <h6>Người đại diện : Lê Huy GCNĐKKD số 47A8050296 do Sở KHTC TPHCM cấp ngày 06/05/2017.</h6>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script>
    //connect page fb
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //câu lệnh cho hàm tooltips
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
