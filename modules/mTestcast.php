<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/5/2018
 * Time: 1:56 AM
 */
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 09/06/2018
 * Time: 8:23 CH
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];

include_once $dirname . '/model/product.php';

include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/cate.php';


$connection=  new \exam\connect();
$connect=$connection->getConnection();
mysqli_set_charset($connect, 'UTF8');
$sql="select * from grouppro where maloai=0 limit 4";
$result=$connect->query($sql);


if($result->num_rows>0){

    if($_SERVER["REQUEST_METHOD"]=="POST"){


        if(isset( $_REQUEST["getCatePhu"])){
            $getCatephu= $_REQUEST["getCatePhu"];
        }
        if(isset($_REQUEST["GetCateMaster"])){
                $getCatechinh=$_REQUEST["GetCateMaster"];
            }

        if($getCatephu>$getCatechinh) {
            $getCate = $getCatephu;
        }else {
            $getCate = $getCatechinh;
        }


        if(isset($_REQUEST["themDanhMuc"])){
            $themDanhMuc=$_REQUEST["themDanhMuc"];
        }

        $addCate= new \exam\cate();
        $addCate->setMaloaicon($getCate);
        $addCate->setLoaisanpham($themDanhMuc);
        $add=new \exam\adminControler();
        $add->setCategory($addCate);
    }


    ?>
    <form method="post">
        <table id="cate">
            <tr>
                <th>Danh Mục Chính : </th>
                <td>
                    <select name="GetCateMaster" id="" onchange="showHint(this.value)" class="form-control" style="width: 252px">
                        <option value="0" >Chọn Danh Mục Chính</option>
                        <?php

                        while($row=mysqli_fetch_array($result)){
                            var_dump($row);
                            echo "<option value='".$row["maloai"]."' >".$row["loaisanpham"]."</option>";
                        }
                        ?>
                    </select>
                </td>
            <tr>
                <th>Danh Mục Phụ : </th>
                <td >
                    <span  id="txtHint"></span>
                </td>
            </tr>
            <tr>
                <th>Thêm Danh Mục:</th>
                <td><input type="text" name="themDanhMuc" class="form-control" style="width: 252px"></td>
            </tr>
            <tr><th></th><td><button type="submit" class="btn btn-primary">Thêm</button></td></tr>
        </table>
    </form>



    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return ;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "modules/mGethint.php?id="+str, true);
                xmlhttp.send();
            }
        }
    </script>

    <?php

}
?>