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
                <div style="border-bottom: #777777 1px solid "><a href="">Trang chủ </a> &gt; Thông tin cá nhân &gt; Cập Nhập Địa Chỉ</div>
                <div>
                    <form action="" method="post" class="alert alert-light frres">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8">
                                <div align="center"  style="border: 1px solid gray; border-radius:5px">
                                    <form action="">
                                        <h1 class="alert alert-success">Đổi Mật Khẩu</h1>
                                        <div class="row">
                                            <div class="col-lg-5" align="right" style="margin: 15px 0px;">Mật Khẩu Cũ :</div>
                                            <div class="col-lg-7" align="left">
                                                <input type="text" placeholder="<?=$row['address']?>" style="width: 50%">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="offset-lg-3 col-lg-6">
                                                <button type="submit" class="btn btn-info btn-outline-info">Cập Nhập</button>
                                            </div>
                                        </div>

                                    </form>
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
    }?>
</div>
<!--/main-->
