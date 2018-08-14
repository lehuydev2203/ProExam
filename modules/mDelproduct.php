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

//lấy mã sản phẩm theo phương thức GET
$msp=null;
if(isset($_GET["pr"])){
    $msp=$_GET["pr"];
}

//khai báo gái trị $Adconn
$Adconn = new \exam\connect();
$AdPrconn = $Adconn->getConnection();

//lấy giá trị từ bảng Chi tiết sản phẩm
$EditProduct = "SELECT masanpham ,l.loaisanpham, tensanpham ,giasanpham,xuatxu,baohanh,hinhanh,motasanpham,tinhtrang FROM chitietsanpham s , grouppro l where s.maloai=l.maloai and masanpham='$msp'";
$editProduct = $AdPrconn->query($EditProduct);

//show thông tin sản phẩm cần chỉnh sửa
while ($rowedit=mysqli_fetch_array($editProduct)){

//gán giá trị vào sản phẩm
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*lấy mã loại*/
            $loaisanpham = $rowedit["loaisanpham"];
            $sql="select maloai, loaisanpham from grouppro where loaisanpham='$loaisanpham'";
            $kqua=$AdPrconn->query($sql);
            if($kqua->num_rows>0){
                while ($kq=mysqli_fetch_array($kqua)){
                    $maloai=$kq["maloai"];
                }
            }


        $delRow = new exam\product();
        $delRow->setMasanpham($msp);//gán giá trị vào mã sản phẩm
        $delRow->setMaloai($maloai);//gán giá trị vào mã loại
        $del= new \exam\adminControler();
        $del->delRow($delRow);//gọi hàm delRow để xóa dòng
    }


    ?>

        <div class="row">
            <div class="col-md-4" style="margin: 10px 0px ; padding: 5px 10px;"></div>
            <div class="col-md-4" style="margin: 10px 0px ; padding: 5px 10px;">

                <!--show sản phẩm cần xác nhận để xóa-->
                <form action="" method="post"  enctype = "multipart/form-data">
                <div class="alert alert-success">
                    <h2>Bạn muốn xóa sản phẩm dưới đây</h2>
                </div>
                <div>
                    <img src="<?= $rowedit['hinhanh']?>" alt="" style="width: 200px;border:2px solid gray ;border-radius: 25%;">
                </div>
                <br>
                <div>
                    <h4>Tên sản phẩm : <?= $rowedit['tensanpham']?></h4>
                </div>
                <br>
                <div>
                    <h5>Giá sản phẩm : <?= $rowedit['giasanpham']?></h5>
                </div>
                <br>
                <div>
                    <h5>Xuất Xứ : <?= $rowedit['xuatxu']?></h5>
                </div>
                <br>
                <div>
                    <h5>Bảo Hành : <?= $rowedit['baohanh']?></h5>
                </div>
                <br>

                <!--Submit-->
                <button type="submit" class="btn btn-danger" style="margin-bottom: 20px">Xác nhận Xóa</button>
                <!--/Submit-->
                </form>

            </div>
        </div>

    <?php
}

?>