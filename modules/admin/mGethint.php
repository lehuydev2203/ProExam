<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/6/2018
 * Time: 12:25 PM
 */

include_once '../model/db_connect.php';
$conn=new \exam\connect();
$con=$conn->getConnection();
$id=1;
//lấy giá trị tham số truyền vào thông qua ajax
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$sql="select maloai,loaisanpham from grouppro where maloaicon=$id";
$sel =$con->query($sql);

echo "<select name='getCatePhu' class='form-control'  style='width: 252px' >
            <option value='0'>Chọn Danh mục của bạn</option>";
while ($row = mysqli_fetch_array($sel)) {
    echo "<option value='".$row["maloai"]."'>".$row['loaisanpham']."</option>";
}
echo"</select>";
