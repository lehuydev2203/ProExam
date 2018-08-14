<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 06/06/2018
 * Time: 6:28 CH
 */

namespace exam;

include_once "db_connect.php";

class userController
{
    public function addNewUser($adNeUser)
    {
        try {
            $aconn = new connect();
            $adconn = $aconn->getConnection();
            $strsql = "insert into user(user,pwd,name,email,address) value ('{$adNeUser->getUser()}','{$adNeUser->getPwd()}','{$adNeUser->getName()}','{$adNeUser->getEmail()}','{$adNeUser->getAddress()}')";
            if ($adconn->query($strsql) === true) {
                connect::ChangeURL("location:dangkythanhcong.php");
            }
        } catch (Error $e) {
        }
    }

    public function login($login)
    {
        try {
            $lcon = new connect();
            $locon = $lcon->getConnection();
            mysqli_set_charset($locon, 'UTF8');
            $losql = "select user ,pwd ,level from user where user='{$login->getUser()}'&& pwd='{$login->getPwd()}' && level='administrator'";
            $user = $login->getUser();
            $kq = $locon->query($losql);
            if ($kq->num_rows == 1) {
                $_SESSION["user"] = $login->getUser();
                $_SESSION["level"] ='administrator';
                $_SESSION["name="]="Bạn là nhân viên quản trị";
                connect::ChangeURL("AdminManager.php?id=0");
            } else {
                $kquser = "select user ,pwd from user where user='{$login->getUser()}'&& pwd='{$login->getPwd()}'&& level='member'";
                $kqacc = $locon->query($kquser);
                if ($kqacc->num_rows == 1) {
                    $_SESSION["user"] = $login->getUser();
                    $_SESSION["level"] = 'member';
                    connect::ChangeURL ("taikhoan.php?id=".$login->getUser());
                } else {
                    $kqoff = "select user ,pwd from user where user='{$login->getUser()}'&& pwd='{$login->getPwd()}'&& level='off'";
                    $off = $locon->query($kqoff);

                    if ($off->num_rows == 1) {
                        echo '     <div>          
                        <script >
                            alert("Tài khoản đã bị khóa , vui lòng nhập tài khoản khác hợp lệ ");
                        </script>
                        </div>       ';

                    }else{
                        echo '     <div>          
                        <script >
                            alert("Bạn đã nhập sai tài khoản hoặc mật khẩu , vui lòng nhập lại");
                        </script>
                        </div>       ';

                    }
                }
            }
        } catch (Error $e) {

        }
    }

    public function updateUser($upUser)
    {
        try {
            $econn = new connect();
            $dbEconn = $econn->getConnection();

            $sqle = "UPDATE user SET pwd='{$upUser->getPwd()}', name='{$upUser->getName()}', address='{$upUser->getAddress()}',email='{$upUser->getEmail()}', level='{$upUser->getLevel()}' WHERE user='{$upUser->getUser()}' ";
            if ($dbEconn->query($sqle) === TRUE) {

                echo '<div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="color: red">
                        <script >
                        alert("Update Complete , click back to form user ");
</script>
                       </div>
                        <div class="col-md-1"></div>
                      </div>';
                connect::ChangeURL("AdminManager.php?c=1");
                
            } else {
                echo "insert fail" . $dbEconn->error;
            }
        } catch (Error $e) {
            die($e->getMessage());
        }
    }


}