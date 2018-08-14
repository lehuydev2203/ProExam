<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/24/2018
 * Time: 8:58 PM
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];

include_once $dirname . '/model/product.php';
include_once $dirname . '/model/adminControler.php';

$connect=new \exam\connect();
$conn=$connect->getConnection();
$Usersql="select count(user) from user"; //đếm số user
$idSql="select count(maloai) from grouppro"; // đếm số loại sản phẩm
$spSql="select count(masanpham) from chitietsanpham"; //đếm số sản phẩm

$kq=$conn->query($Usersql);
$row=mysqli_fetch_array($kq);

$kq=$conn->query($idSql);
$idRow=mysqli_fetch_array($kq);

$kq=$conn->query($spSql);
$spRow=mysqli_fetch_array($kq);
?>

<div style="margin-top:20px;">

    <!--Số Thành viên-->
    <span class="btn btn-outline-info" style="width: 30%">
    <div><span class="info"><?= $row["count(user)"]; ?></span></div>
        <div>Tổng số lượng thành viên của website chúng ta </div>
    <a href="AdminManager.php?c=1" class="btn btn-danger">Click để xem chi tiết</a>
    </span>

    <!--số sản phẩm-->
    <span class="btn btn-outline-secondary" style="width: 30%">
<div><span class="info"><?= $spRow["count(masanpham)"]; ?></span></div>
        <div>Tổng số Sản Phẩm của website chúng ta </div>
        <a href="AdminManager.php?c=2" class="btn btn-danger">Click để xem chi tiết</a>
    </span>

    <!--số danh mục-->
    <span class="btn btn-outline-success" style="width: 30%">
<div><span class="info"><?=  $idRow["count(maloai)"]; ?></span></div>
        <div>Tổng số Danh Mục Sản Phẩm của website chúng ta </div>
        <a href="AdminManager.php?c=3" class="btn btn-danger">Click để xem chi tiết</a>
    </span>

</div>
