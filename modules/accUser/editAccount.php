<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 06/06/2018
 * Time: 5:49 CH
 */

$dirname=$_SERVER["DOCUMENT_ROOT"];
include $dirname . '/model/db_connect.php';
include $dirname . '/model/userController.php';
include $dirname . '/model/user.php';

$acCon=new \exam\connect();
$dbCon=$acCon->getConnection();
$id=null;
if(isset($_REQUEST["id"])){
    $id=$_REQUEST["id"];}
$acsql="Select * from user where user='$id'";
$result=$dbCon->query($acsql);
?>

<!--Main-->
<div class="main alert alert-danger" style="margin-bottom: 0px;">
    <?php
    // output data of each row
    while ($row=$result->fetch_assoc()) {
        ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div style="border-bottom: #777777 1px solid "><a href="index.php">Trang chủ </a> &gt; Thông tin cá nhân </div>
                <div>
                    <form action="" method="post" class="alert alert-light frres">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8">
                                <div  style="padding-bottom:20px;border: 1px solid gray; border-radius:5px">
                                    <h1 align="center" class="alert alert-success">Thông tin cá nhân</h1>
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3 padding-10-0"><h3>Tài Khoản : </h3></div>
                                        <div class="col-lg-5 padding-10-0"><h3><?= $row['user']?></h3></div>
                                        <div class="col-lg-4 padding-10-0"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 padding-15-0"><h3>Tên : </h3></div>
                                        <div class="col-lg-5 "><input type="text" value="  <?= $row['name']?>" style="width: 100%"></div>
                                        <div class="col-lg-4 padding-10-0"><a href="taikhoan.php?a=2&id=<?=$id?>" class="btn btn-outline-secondary  btn-secondary" style="width: 75%">Cập Nhập Tên</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 padding-10-0"><h3>Mật Khẩu : </h3></div>
                                        <div class="col-lg-5"><input type="password" value=" <?= substr($row['pwd'],0,10)?>" style="width: 100%"></div>
                                        <div class="col-lg-4 padding-10-0"><a href="taikhoan.php?a=3&id=<?=$id?>" class="btn btn-outline-secondary  btn-secondary" style="width: 75%">Cập Nhập Mật Khẩu</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 padding-10-0"><h3>Email : </h3></div>
                                        <div class="col-lg-5"><input type="text" value="  <?= $row['email']?>" style="width: 100%"></div>
                                        <div class="col-lg-4 padding-10-0"><a href="taikhoan.php?a=4&id=<?=$id?>" class="btn btn-outline-secondary  btn-secondary" style="width: 75%">Cập Nhập Email</a></div>
                                    </div><div class="row ">
                                        <div class="col-lg-3 padding-10-0"><h3>Địa chỉ : </h3></div>
                                        <div class="col-lg-5"><input type="text" value="  <?= $row['address']?>" style="width: 100%"></div>
                                        <div class="col-lg-4 padding-10-0"> <a href="taikhoan.php?a=5&id=<?=$id?>" class="btn btn-outline-secondary btn-secondary"style="width: 75%">Cập Nhập Địa Chỉ</a></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div align="right"> <a href="index.php" style="list-style-type: none;text-decoration: none;color:white;" class="btn btn-danger">Quay lại</a></div>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <?php
        $_SESSION["name"]=$row['name'];
    }?>
</div>
<!--/main-->
