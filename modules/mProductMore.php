<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/11/2018
 * Time: 8:32 AM
 */
$dirname=$_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/product.php';

$id=0;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$conn=new \exam\connect();
$con=$conn->getConnection();
mysqli_set_charset($con,"UTF8");
$sql="SELECT masanpham,tensanpham,giasanpham,xuatxu,baohanh,hinhanh,motasanpham,tinhtrang,soluotxem FROM chitietsanpham where masanpham='$id'";
$kq=$con->query($sql);
if($kq->num_rows>0){

while($row=mysqli_fetch_array($kq)){


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <img src="<?= $row["hinhanh"]?>" alt="" width="90%">
            </div>
            <div class="col-lg-7">
                <h1>Tên sản phẩm : <?= $row["tensanpham"]?></h1>
                <br>
                <h2><i style="color: red;"><b> Giá : <?= number_format($row["giasanpham"]);?> vnđ</b></i></h2>
                <br>
                <h4>Mã sản phẩm : <?= $row["masanpham"]?></h4>
                <h4>Xuất Xứ : <?= $row["xuatxu"]?></h4>
                <h4>Bảo Hành : <?= $row["baohanh"]?></h4>
                <h4>Tình Trạng : <?= $row["tinhtrang"]?></h4>
            </div>
        </div>
    </div>

    <div class="col-lg-12 margin-10 padding-10" ></div>
    <div class="col-lg-12  "  style="border: 1px aliceblue solid;border-radius: 2% ; ">
    <h1 align="center" ><?= $row["tensanpham"]?></h1>
        <br>
        <h6><?= $row["motasanpham"]?></h6>
    </div>
</div>
</body>
</html>
<?php
    $SoLuotXem = $row["soluotxem"] + 1;
    $view = new \exam\product();
    $view->setMasanpham($id);
    $view->setLuotxem($SoLuotXem);
    $add = new \exam\adminControler();
    $add->UpdateView($view);
}}
?>