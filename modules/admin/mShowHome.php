<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/11/2018
 * Time: 5:55 PM
 */


include_once '../model/db_connect.php';
$con=new \exam\connect();
$con=$con->getConnection();
$id=1;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

//mảng tạm

$sel = mysqli_query($con,"select maloai,loaisanpham from grouppro where maloaicon=$id");
$data = array();
echo "<select name='getCatePhu' class='form-control'  style='width: 252px' >
            <option value='0'>Chọn Danh mục của bạn</option>";
while ($row = mysqli_fetch_array($sel)) {
    echo "<option value='".$row["maloai"]."'>".$row['loaisanpham']."</option>";
}
echo"</select>";
