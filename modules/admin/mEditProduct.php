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

//lấy giá trị mã sản phẩm
$msp=null;
if(isset($_GET["pr"])){
    $msp=$_GET["pr"];
}

$Adconn = new \exam\connect();
$AdPrconn = $Adconn->getConnection();

//lấy giá trị từ bảng grouppro (Nhóm Sản Phẩm)
$sSql="select maloai , loaisanpham from grouppro order by maloai desc ";

//lấy giá trị từ bảng Chi tiết sản phẩm
$EditProduct = "SELECT masanpham ,l.loaisanpham, tensanpham ,giasanpham,xuatxu,baohanh,hinhanh,motasanpham,tinhtrang FROM chitietsanpham s , grouppro l where s.maloai=l.maloai and masanpham='$msp'";
$editProduct = $AdPrconn->query($EditProduct);

//show thông tin sản phẩm cần chỉnh sửa
while ($rowedit=mysqli_fetch_array($editProduct)){

//gán giá trị vào sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*lấy mã loại*/
    if (isset($_REQUEST["setLoaisanpham"])) {
        $loaisanpham = $_REQUEST["setLoaisanpham"];
        $sql="select maloai, loaisanpham from grouppro where loaisanpham='$loaisanpham'";
        $kqua=$AdPrconn->query($sql);
        if($kqua->num_rows>0){
            while ($kq=mysqli_fetch_array($kqua)){
                $maloai=$kq["maloai"];
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
    if(isset($_FILES['setHinhanh'])){
        $errors= array();
        $file_name = $_FILES['setHinhanh']['name'];
        $file_size = $_FILES['setHinhanh']['size'];
        $file_tmp = $_FILES['setHinhanh']['tmp_name'];
        $file_type = $_FILES['setHinhanh']['type'];
        $arrFileName = explode('.',$_FILES['setHinhanh']['name']);
        $file_ext=strtolower(end($arrFileName));

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"upload/".$file_name);
            $hinhanh="upload/".$file_name;
        }else{
            if(isset($rowedit['hinhanh'])){
                $hinhanh=$rowedit['hinhanh'];
            }else{
            print_r($errors);
        }}
    }

    /*Lấy mã sản phẩm*/
    $masanpham=$rowedit["masanpham"];

  

    /*Lấy tình trạng*/
    if(isset($_REQUEST["setTinhtrang"])){
        $tinhtrang=$_REQUEST["setTinhtrang"];
    }

    $updateProduct = new exam\product();
    $updateProduct->setMasanpham($masanpham);//lấy mã sản phẩm
    $updateProduct->setMaloai($maloai);//lấy mã loại
    $updateProduct->setTensanpham($tensanpham);//lấy tên sản phẩm
    $updateProduct->setGiasanpham($giasanpham);//lấy giá sản phẩm
    $updateProduct->setXuatxu($xuatxu);// lấy xuất xứ
    $updateProduct->setBaohanh($baohanh);//lấy bảo hành
    $updateProduct->setMota($mota);//lấy mô tả
    $updateProduct->setHinhanh($hinhanh);//lấy giá trị hình ảnh
    $updateProduct->setTinhtrang($tinhtrang);//lấy tình trạng

    $add= new \exam\adminControler();
    $add->updateProduct($updateProduct);//gọi hàm updateProduct
}


?>

<form action="" method="post" style="border: none"  enctype = "multipart/form-data">
    <div class="row" id="product">
        <div class="col-md-12" style="margin: 10px 0px ; padding: 5px 10px;">

            <!--mã loại = loại sản phẩm setLoaisanpham-->
            <div class="row ">
                <div class="col-md-2" align="right  " >
                    Loai sản Phẩm :
                </div>
                <div class="col-md-10" align="left" >
                    <select name="setLoaisanpham" id="" class="form-control" style="width: 20%">
                        <?php
                        //lấy giá trị loại sản phẩm đã có
                        echo " <option  value='".$rowedit['loaisanpham']."'>".$rowedit['loaisanpham']."</option>";

                        //lấy giá trị loại sản phẩm
                        $result =$AdPrconn->query($sSql);
                        if ($result->num_rows > 0) {
                            while ($sRow = $result->fetch_assoc()) {
                                echo " <option  value='".$sRow['loaisanpham']."'>".$sRow['loaisanpham']."</option>";
                            }}?>
                    </select>
                </div>
            </div>
            <!--/mã loại = loại sản phẩm-->

            <!--Tên Sản Phẩm setTensanpham-->
            <div class="row ">
                <div class="col-md-2" align="right" >
                    Tên sản Phẩm :
                </div>
                <div class="col-md-10" align="left">
                    <input type="text" name="setTensanpham" style="width: 20%"  class="form-control"  value="<?= $rowedit['tensanpham']?>">
                </div>
            </div>
            <!--/Tên Sản Phẩm-->

            <!--Giá Sản Phẩm setGiasanpham -->
            <div class="row ">
                <div class="col-md-2" align="right" >
                    Giá Sản Phẩm :
                </div>
                <div class="col-md-10" align="left" >
                    <input type="number" name="setGiasanpham" style="width: 20%"  class="form-control" value="<?= $rowedit['giasanpham']?>"> vnđ
                </div>
            </div>
            <!--/Giá Sản Phẩm -->

            <!--Xuất Xứ setXuatxu-->
            <div class="row ">
                <div class="col-md-2" align="right" >
                    Xuất Xứ :
                </div>
                <div class="col-md-10" align="left" >
                    <select name="setXuatxu" id=""  class="form-control" style="width: 20%">

                        <option value="<?= $rowedit['xuatxu']?>"><?= $rowedit['xuatxu']?></option>
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
                <div class="col-md-2" align="right" >
                    Bảo Hành :
                </div>
                <div class="col-md-10" align="left" >
                    <select name="setBaohanh" id=""  class="form-control" style="width: 20%">
                        <option value="<?= $rowedit['baohanh']?>"><?= $rowedit['baohanh']?></option>
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
                <div class="col-md-2" align="right" >
                    Hình Ảnh :
                </div>
                <div class="col-md-10" align="left" >
                    <img src="<?= $rowedit['hinhanh']?>" alt="" style="width: 200px;">
                    <input type="file" name="setHinhanh" accept="image/gif, image/jpeg, image/png, image/jpg " placeholder="Hình Ảnh" value="Chọn Hình Ảnh Sản Phẩm muốn chỉnh sửa">
                </div>
            </div>
            <!--/Hình Ảnh -->

            <!-- Mô Tả setMota-->
            <div class="row ">
                <div class="col-md-2" align="right" >
                    Mô Tả :
                </div>
                <div class="col-md-10" align="left" >
                    <textarea cols="75" rows="8"  class="form-control" name="setMota" ><?= $rowedit['motasanpham']?></textarea>
                </div>
            </div>
            <!--/ Mô Tả -->

            <!--Tình Trạng setTinhTrang-->
            <div class="row ">
                <div class="col-md-2" align="right" >
                    Tình Trạng :
                </div>
                <div class="col-md-10" align="left" >
                    <select name="setTinhtrang" id=""  class="form-control" style="width: 20%">
                        <option value="<?= $rowedit['tinhtrang']?>"><?= $rowedit['tinhtrang']?></option>
                        <option value="Hết Hàng">Hết Hàng</option>
                        <option value="Còn Hàng">Còn Hàng</option>
                        <option value="Off">Off</option>
                    </select>
                </div>
            </div>
            <!--/Tình Trạng-->

            <!--Submit-->
            <div class="row ">
                <div class="col-md-2" align="right" >
                </div>
                <div class="col-md-10" align="left" >
                    <button type="submit">Cập Nhập</button>
                </div>
            </div>
            <!--/Submit-->
        </div>
    </div>
</form>
<?php
    }

?>