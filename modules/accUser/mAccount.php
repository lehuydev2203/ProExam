<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/22/2018
 * Time: 6:48 AM
 */

$dirname=$_SERVER["DOCUMENT_ROOT"];
include $dirname . '/model/db_connect.php';
include $dirname . '/model/userController.php';
include $dirname . '/model/user.php';

//include_once "model/userController.php";
$acCon=new \exam\connect();
$dbCon=$acCon->getConnection();
$id=$_REQUEST["id"];
$acsql="Select * from user where user='$id'";
$result=$dbCon->query($acsql);
?>

<div class="main alert alert-danger" style="margin-bottom: 0px;">
    <?php
    // output data of each row
    while ($row=$result->fetch_assoc()) {
        ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div style="border-bottom: #777777 1px solid "><a href="">Trang chủ </a> &gt; Thông tin cá nhân </div>
                <div>
                    <form action="" method="post" class="alert alert-light frres">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8">
                                <div align="center"  style="padding-bottom:20px;border: 1px solid gray; border-radius:5px">
                                    <h1 class="alert alert-success">Thông tin cá nhân</h1>
                                    <br>
                                    <h3>Tài Khoản : <?= $row['user']?></h3>
                                    <br>
                                    <h3>Tên :<br><input type="text" value=" <?= $row['name']?>" style="width: 50%"></h3>
                                    <br>
                                    <h3>Mật Khẩu :<br><input type="password" value=" <?= substr( $row['pwd'],0,10)?>" style="width: 50%"></h3>
                                    <br>
                                    <h3>Email :<br><input type="text" value="  <?= $row['email']?>" style="width: 50%"></h3>
                                    <br>
                                    <h3>Địa chỉ :<br><input type="text" value="  <?= $row['address']?>" style="width: 50%"></h3>
                                    <br>
                                    <a href="taikhoan.php?a=1&id=<?=$id?>" class="btn btn-warning"> Cập nhập thông tin tài khoản </a>
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
