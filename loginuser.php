<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 23/06/2018
 * Time: 9:57 SA
 */

include ("model/userController.php");
include ("model/user.php");

$replace = null;
if (!isset($_SESSION["user"])) {
    $replace = 'Vui lòng nhập đúng tài khoản và mật khẩu *';
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST["txtuser"])) {
        $userid = $_REQUEST["txtuser"];
    };
    if (isset($_REQUEST["txtpwd"])) {
        $pass =sha1($_REQUEST["txtpwd"],false);
    };

    $login = new \exam\user();
    $login->setUser($userid);
    $login->setPwd($pass);
    $lo = new \exam\userController();
    $lo->login($login);
}

echo '
<div class="col-md-6">
<div style="border-bottom: #777777 1px solid "><a href="index.php?c=0">Trang chủ </a> &gt; Đăng Nhập</div>
        <form action="" method="post" class="alert alert-light frres">
                        <h1>Thông tin cá nhân</h1>
                            <h4>Tài Khoản : <span style="color: red">*</span></h4>
                                <input type="text" name="txtuser">
                            <h4>Mật Khẩu : <span style="color: red">*</span></h4>
                                <input type="password" name="txtpwd">
                        <div id="pwdwrong"></div>
                        <i style="color:red;"> ' . $replace . ' </i><br>
                        <input type="submit" value="Đăng nhập" style="width: 30%" class="btn btn-danger">
         </form> 
</div>
                    <div class="col-md-6 alert alert-light frres">
                    <h1>Bạn chưa có tài khoản</h1>
                    <br>
                    <h4>Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn ! Ngoài ra còn có rất nhiều
                        chính sách và ưu đãi cho các thành viên citybike</h4>
                    <button class="btn btn-success"><a href="resgistry.php" style="list-style-type: none;text-decoration: none; color:white">Đăng ký</a></button>
                </div>
            </div> ' ?>