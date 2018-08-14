<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/25/2018
 * Time: 2:41 PM
 */


/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/9/2018
 * Time: 5:47 PM
 */
$id = 0;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$dirname = $_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/db_connect.php';

$conn = new \exam\connect();
$connect = $conn->getConnection();

$sql = "select * from grouppro where maloaicon=0";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo ' <form action=""  enctype = "multipart/form-data" style="margin-bottom: 20px">
            <div class="row">
                <div class="col-lg-12 alert alert-success">
                    '. $row["loaisanpham"].'
                    <img src="images/if_flag_hot_92887.png" alt=""></div>

                <br>';
        $prosql = ' SELECT masanpham ,l.loaisanpham , tensanpham ,giasanpham , xuatxu , baohanh , giasanpham,motasanpham,hinhanh, tinhtrang FROM chitietsanpham s JOIN  grouppro l ON l.maloai=s.maloai where  l.maloaicon= ' . $row["maloai"] . ' order by soluotxem desc limit 4';
        $kq = $connect->query($prosql);
        if ($kq->num_rows > 0) {
            while ($prow = mysqli_fetch_array($kq)) {
                echo '<div class="col-lg-3"  >
                            <div style="border: 1px aliceblue solid;border-radius: 2% ; " class="padding-5">
                            <div align="center"><img src="'.$prow["hinhanh"].'" alt="" width="200px" ></div><!--hình Ảnh sản phẩm-->
                            <br>
                            <h1>' . $prow["tensanpham"] . '</h1>

                            <br>

                            <h4><i>Giá :
                                    <b style="color: red;">' . number_format($prow["giasanpham"]) . ' vnđ</b>
                                </i></h4><!--Giá sản phẩm-->

                            <h6>Mã Sản Phẩm : ' . $prow["masanpham"] . '</h6>

                            <h6>Xuất Xứ : ' . $prow["xuatxu"] . '</h6>

                            <h6>Bảo Hành : ' . $prow["baohanh"] . '</h6>

                            <h6>Mô Tả : ' . substr($prow['motasanpham'], 0, 50) . '...</h6>

                            <div align="center" class="margin-10"><a
                                        href="index.php?c=102&id=' . $prow["masanpham"] . '"
                                        class="btn btn-success">Chi tiết sản Phẩm</a>
                                <!--Chi tiết sản phẩm-->
                            </div></div>
                        </div>';

            }
        }
        echo ' </div>

        </form>';
    }
} else {
    echo "Sản phẩm đang được cập nhập ";
}
?>
