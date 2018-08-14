<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 5/19/2018
 * Time: 8:00 PM`
 */
//include "model/db_connect.php";

$dirname=$_SERVER["DOCUMENT_ROOT"];

include_once  $dirname . '/model/user.php';

include_once  $dirname . '/model/userController.php';

$econn = new \exam\connect();
$dbEconn = $econn->getConnection();
$u= $_REQUEST["u"];
$sqle = "Select * from user where user='$u'";
$res = $dbEconn->query($sqle);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_REQUEST["upUser"])){
        $user =$_REQUEST["upUser"];
    }
    //vì pwd có sử dụng mã hóa nên lấy pwd có sẵn đối chiếu với pwd đã REQUEST nếu giống nhau thì lấy lại giá trị cũ và khác nhau thì lấy giá trị mới và tiếp tục mã hóa lại và gán vô pwd
    if(isset($_REQUEST["upPwd"])){
        $kq=$dbEconn->query($sqle);
        $pwd=mysqli_fetch_array($kq);
        $pass=$pwd["pwd"];
        if($_REQUEST["upPwd"]!=$pass){
        $Pwd =sha1($_REQUEST["upPwd"],false);
        }else{
            $Pwd=$pass;
        }
    }
    //lấy name
    if (isset($_REQUEST["upName"])) {
        $name = $_REQUEST["upName"];
    }
    //lấy địa chỉ
    if (isset($_REQUEST["upAddress"])) {
        $address = $_REQUEST["upAddress"];
    }
    //lấy email
    if (isset($_REQUEST["upEmail"])) {
        $email = $_REQUEST["upEmail"];
    }
    //lấy level
    if (isset($_REQUEST["setLevel"])) {
        $level = $_REQUEST["setLevel"];
    }
    $upUser = new \exam\user();
    $upUser->setUser($u);
    $upUser->setPwd($Pwd);
    $upUser->setName($name);
    $upUser->setAddress($address);
    $upUser->setEmail($email);
    $upUser->setLevel($level);
    $up = new  \exam\userController();
    $up->updateUser($upUser);//gọi hàm updateUser
}

 while ($row = $res->fetch_assoc()) {
    ?>
    <div class="row ">
        <div class="col-md-12 pad-left-0">
            <form action="" method="post" style="border: none;" align="left">
                <!--Tài khoản-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Tài khoản :</div>
                            <div class="col-md-6">

                                <input type="text" name="upUser" class='form-control width-80'
                                       value="<?= $row["user"]; ?>"  disabled="disabled">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Tài khoản-->

                <!--Mật Khẩu-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Mật Khẩu :</div>
                            <div class="col-md-6"><input type="password" name="upPwd"  class='form-control width-50'
                                                         value="<?= $row["pwd"] ?>"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Mật Khẩu-->

                <!--Tên-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Tên :</div>
                            <div class="col-md-6"><input type="text" name="upName" class=' form-control width-50'
                                                         value="<?= $row["name"] ?>"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Tên-->

                <!--Địa chỉ-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Địa chỉ :</div>
                            <div class="col-md-6"><input type="text" name="upAddress" class='form-control width-50'
                                                         value="<?= $row["address"] ?>"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Địa chỉ-->

                <!--Email-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Email :</div>
                            <div class="col-md-6"><input type="text" name="upEmail" class='form-control width-50'
                                                         value="<?= $row["email"] ?>"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Email-->

                <!--Phân Quyền-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">Cấp quyền : </div>
                            <div class="col-md-6">
                                <select name="setLevel" id="" class="form-control" >
                                    <option  value="<?= $row["level"] ?>"><?= $row["level"] ?></option>
                                    <option  value="administrator">Admin</option>
                                    <option  value="member">Member</option>
                                    <option  value="off">Off</option>
                                </select>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <!--/Phân Quyền-->

                <!--Nút Cập Nhập-->
                <div class="row padding-10px">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6" style="float: right">
                                <input type="submit" class="btn btn-primary"
                                       style="float: right" value="Cập Nhập">
                                <a  href="../AdminManager.php?id=0" class="btn btn-primary" style="float: right; margin:0 10px">Quay Lại</a>&nbsp;
                            </div>
                            <div class="col-md-2 pad-left-0 ">
                            </div>
                            <div class="col-md-1"></div>

                        </div>
                    </div>
                </div>
                <!--/Nút Cập Nhập-->

            </form>
        </div>
    </div>

<?php } ?>
                <!--/Main-->

