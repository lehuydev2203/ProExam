<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 5/19/2018
 * Time: 8:00 PM`
 */
//include "model/db_connect.php";

$dirname = $_SERVER["DOCUMENT_ROOT"];

include_once $dirname . '/model/product.php';
include_once $dirname . '/model/adminControler.php';

$Adconn = new \exam\connect();
$AdPrconn = $Adconn->getConnection();

//câu lệnh sql lấy mã loại  và loại sản phẩm
$sSql = "select maloai , loaisanpham from grouppro order by maloaicon asc ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*lấy mã loại*/
    if (isset($_REQUEST["setLoaisanpham"])) {
        $loaisanpham = $_REQUEST["setLoaisanpham"];
        $sql = "select maloai, loaisanpham from grouppro where loaisanpham='$loaisanpham'";
        $kqua = $AdPrconn->query($sql);
        if ($kqua->num_rows > 0) {
            while ($kq = mysqli_fetch_array($kqua)) {
                $maloai = $kq["maloai"];
            }
        }
    }

    /*lấy tên sản phẩm*/
    if (isset($_REQUEST["setTensanpham"])) {
        $tensanpham = $_REQUEST["setTensanpham"];
    }
    /*lấy giá sản phẩm*/
    if (isset($_REQUEST["setGiasanpham"])) {
        $giasanpham = $_REQUEST["setGiasanpham"];
    }
    /*lấy xuất xứ*/
    if (isset($_REQUEST["setXuatxu"])) {
        $xuatxu = $_REQUEST["setXuatxu"];
    }
    /*lấy bảo hành*/
    if (isset($_REQUEST["setBaohanh"])) {
        $baohanh = $_REQUEST["setBaohanh"];
    }
    /*lấy mô tả*/
    if (isset($_REQUEST["setMota"])) {
        $mota = $_REQUEST["setMota"];
    }
    /*lấy hình ảnh*/
    if (isset($_FILES['setHinhanh'])) {
        $errors = array();
        $file_name = $_FILES['setHinhanh']['name'];
        $file_size = $_FILES['setHinhanh']['size'];
        $file_tmp = $_FILES['setHinhanh']['tmp_name'];
        $file_type = $_FILES['setHinhanh']['type'];
        $arrFileName = explode('.', $_FILES['setHinhanh']['name']);
        $file_ext = strtolower(end($arrFileName));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            //dùng hàm move_upload_file để chuyền file tạm vào thư mục upload
            move_uploaded_file($file_tmp, "upload/" . $file_name);
            $hinhanh = "upload/" . $file_name;
        } else {
            //nếu có lỗi thì xuất ra thông báo
            //và báo mã lỗi vào console
            echo "    
            <script>
                    alert('Upload thất bại');
                    console.log(" . print_r($errors) . ");
            </script>";

        }
    }

    /*lấy mã sản phẩm*/
    $masanpham = 'MH' . date('ymdhis');


    $addProduct = new exam\product();
    $addProduct->setMasanpham($masanpham);
    $addProduct->setMaloai($maloai);
    $addProduct->setTensanpham($tensanpham);
    $addProduct->setGiasanpham($giasanpham);
    $addProduct->setXuatxu($xuatxu);
    $addProduct->setBaohanh($baohanh);
    $addProduct->setMota($mota);
    $addProduct->setHinhanh($hinhanh);
    $addP = new \exam\adminControler();
    $addP->addProduct($addProduct);
}
?>

<form action="" method="post" style="border: none" enctype="multipart/form-data">
    <div class="row" id="product" style="margin-left: 0px;margin-right: 0px">
        <div class="col-md-12" style="margin: 10px 0px ; padding: 5px 0px;">

            <!--mã loại = loại sản phẩm setLoaisanpham-->
            <div class="row ">
                <div class="col-lg-2" align="right  ">
                    Loai sản Phẩm :
                </div>
                <div class="col-lg-10" align="left">
                    <select name="setLoaisanpham" id="" class="form-control" style="width: 20%">
                        <?php
                        $result = $AdPrconn->query($sSql);
                        if ($result->num_rows > 0) {
                            while ($sRow = $result->fetch_assoc()) {
                                echo " <option  value='" . $sRow['loaisanpham'] . "'>" . $sRow['loaisanpham'] . "</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>
            <!--/mã loại = loại sản phẩm-->

            <!--Tên Sản Phẩm setTensanpham-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Tên sản Phẩm :
                </div>
                <div class="col-lg-10" align="left">
                    <input type="text" name="setTensanpham" class="form-control" style="width: 20%">
                </div>
            </div>
            <!--/Tên Sản Phẩm-->

            <!--Giá Sản Phẩm setGiasanpham -->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Giá Sản Phẩm :
                </div>
                <div class="col-lg-10" align="left">
                    <input type="number" name="setGiasanpham" class="form-control" style="width: 20%">vnđ
                </div>
            </div>
            <!--/Giá Sản Phẩm -->

            <!--Xuất Xứ setXuatxu-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Xuất Xứ :
                </div>
                <div class="col-lg-10" align="left">
                    <select name="setXuatxu" id="" class="form-control" style="width: 20%">

                        <option value="Trung Quốc">Trung Quốc</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Ý">Ý</option>
                        <option value="Đài Loan">Đài Loan</option>
                    </select>
                </div>
            </div>
            <!--/Xuất Xứ-->

            <!--Bảo Hành setBaohanh-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Bảo Hành :
                </div>
                <div class="col-lg-10" align="left">
                    <select name="setBaohanh" id="" class="form-control" style="width: 20%">
                        <option value="Không">Không</option>
                        <option value="1 Tháng">1 Tháng</option>
                        <option value="3 Tháng">3 Tháng</option>
                        <option value="6 Tháng">6 Tháng</option>
                        <option value="12 Tháng">12 Tháng</option>
                    </select>
                </div>
            </div>
            <!--/Bảo Hành-->

            <!--Hình Ảnh setHinhanh-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Hình Ảnh :
                </div>
                <div class="col-lg-10" align="left">
                    <input type="file" name="setHinhanh" accept="image/gif, image/jpeg, image/png, image/jpg "
                           value="Chọn Hình Ảnh Sản Phẩm">
                </div>
            </div>
            <!--/Hình Ảnh -->

            <!-- Mô Tả setMota-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                    Mô Tả :
                </div>
                <div class="col-lg-10" align="left">
                    <textarea cols="75" rows="8" class="form-control" name="setMota"></textarea>
                </div>
            </div>
            <!--/ Mô Tả -->

            <!--Submit-->
            <div class="row ">
                <div class="col-lg-2" align="right">
                </div>
                <div class="col-lg-10" align="left">
                    <button type="submit">Thêm Sản Phẩm</button>
                </div>
            </div>
            <!--/Submit-->
        </div>
    </div>
</form>
