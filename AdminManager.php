<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 06/06/2018
 * Time: 7:26 CH
 */
session_start();

//câu lệnh if được dùng để kiểm tra session nếu rỗng thì trả về trang đăng nhập , không cho truy cập vào trang admin
if (!isset($_SESSION["user"])) {
    header("location:login.php");
} else {
    //câu lệnh if dùng để , kiểm tra xem level của account là gì , nếu không phải là admin thì trả về tragn chủ , không cho vào trang quản lý của admin
    if($_SESSION["level"]!="administrator"){
        header("location:index.php");
    }
    else {
        //gán giá trị cho session name
        $_SESSION["name"]="Bạn là nhân viên quản trị";
    }
};

//lấy giá trị theo phương thức get
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
    <link rel="icon" href="images/logoMstudio.png">
    <title><?php switch ($c) {
            //dùng switch case để check giá trị và hiện tên trang theo tương ứng
            case 0:
                echo "Trang chủ";
                break;
            case 1:
                echo "Danh Sách Thành Viên";
                break;
            case 2:
                echo "Danh Sách Sản Phẩm";
                break;
            case 3:
                echo "Danh Sách Danh Mục ";
                break;
            case 5:
                echo "Thêm Sản Phẩm";
                break;
            case 6:
                echo "Chỉnh Sửa Sản Phẩm";
                break;
            case 7:
                echo "Thêm Danh Mục Sản Phẩm";
                break;
            case 8:
                echo "Chỉnh Sửa Tài Khoản";
                break;
            case 9:
                echo "Xóa Sản Phẩm";
                break;
            case 10:
                echo "Chỉnh Sửa Danh Mục";
                break;
            case 11:
                echo "Xóa Danh Mục";
                break;
            default;
                echo "Stop ! The God is looking at you";
        }
        ?></title>

    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <script src="js/angular.js"></script>
    <link rel="stylesheet" href="css/jquery.css">
    <script src="js/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body style="margin: 0px">
<!--header-->
<div>
    <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-10" id="header">
            <div style="background-color:#f1f1f1;border-bottom: 1px solid gray">
                <h1 style="text-align: center">Administrator</h1>
            </div>
        </div>
    </div>
</div>
<!--/header-->

<!--/Nav-->
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row" style="margin-top: 20px">
            <div class="col-2"></div>
            <div class="col-8" align="center">
                <form action="" style="border: none" method="post">
                    <a href="AdminManager.php?c=0" class="btn btn-primary menu">Quản Lý Website</a>
                    <a href="AdminManager.php?c=1" class="btn btn-primary menu">Quản Lý Thành Viên</a>
                    <a href="AdminManager.php?c=2" class="btn btn-primary menu">Quản lý Sản Phẩm</a>
                    <a href="AdminManager.php?c=3" class="btn btn-primary menu">Quản Lý Danh Mục</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!--/Nav-->

<!--main-->
<div >
<div class="row">
    <div class="col-12">
        <div class="row" style="margin: 10px 0px">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <a href="index.php?c=0" class="btn btn-danger main fr" style="margin-left: 10px">Trở Về Trang Chủ</a>
                <?php
                switch($c){
                    case 2 : //dùng switch case để gọi nút thêm sản phẩm
                        echo ' 
                    <div>
                        <a href="AdminManager.php?c=5"  class="btn btn-warning fr">Thêm sản Phẩm</a>
                    </div>';
                        break;
                    case 3://dùng switch case để gọi nút thêm dnh mục
                        echo '<div>
        <a href="AdminManager.php?c=7"  class="btn btn-warning fr">Thêm danh mục</a>
    </div>';
                }
                ?>

            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
    <div class="offset-md-1"></div>
    <div class="col-10">
        <div class="row">

            <div class="col-12" align="center"  >
                <?php switch ($c) {
                    case 0:
                        include "modules/mAdmanager.php";//gọi trang chủ trang admin
                        break;
                    case 1:
                        include "modules/mShowuser.php";//gọi dnah sách user
                        break;
                    case 2:
                        include "modules/mShowProduct.php";//gọi danh sách sản phẩm
                        break;
                    case 3:
                        include "modules/mCatemanager.php";//gọi danh mục
                        break;
                    case 5:
                        include "modules/mAddProduct.php";//gọi trang thêm sản phẩm
                        break;
                    case 6:
                        include "modules/mEditProduct.php";//gọi trang chỉnh sửa sản phẩm
                        break;
                    case 7:
                        include "modules/mAddCate.php";//gọi trang thêm danh mục
                        break;
                    case 8:
                        include "modules/mEdituser.php";//gọi trang chỉnh sữa tk user
                        break;
                    case 9:
                        include "modules/mDelproduct.php";//gọi trang xác nhận xóa sản phẩm
                        break;
                    case 10:
                        include "modules/mEditCate.php";//gọi trang Chỉnh Cửa Danh Mục
                        break;
                    case 11:
                        include "modules/mDelCate.php";//gọi trang xóa Danh Mục
                        break;
                    default;
                        include "modules/mError.php";//gọi trang thông bao lỗi nếu truyển sai tham số
                }
                ?>
             </div>
        </div>
    </div>
    <!--div class="offset-md-1"></div-->
</div>
</div>
<br>


<!--/main-->

<!--footer-->

<div class="row ">
    <div class="col-md-1"></div>
    <div class="col-md-10" id="header">
        <div style="background-color:#f1f1f1">
            <h4 style="text-align: center;padding: 10px">Design by <a href="https://facebook.com/lehuy.roxyproduction"
                                                                      style='list-style-type: none;color: black ;text-decoration: none'>Lê Huy - Aptech - C1709L</a></h4>
        </div>
    </div>
</div>
<!--/footer-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

</body>
</html>
