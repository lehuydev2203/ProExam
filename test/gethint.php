<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/6/2018
 * Time: 12:25 PM
 */

include '../model/db_connect.php';
 $con=new \exam\connect();
 $con=$con->getConnection();
$id=1;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$sel = mysqli_query($con,"select loaisanpham from grouppro where maloaicon=$id");
$data=array();
while ($row = $sel->fetch_object() ){
    array_push($data,$row);
}
$json=json_encode($data);

$dejson=json_decode($json,true);

echo "<select>";
foreach ($dejson as $k=> $v) {
    foreach ( $v as $k1=> $v1) {
echo "<option value='".$v1."'>".$v1."</option>";
}
}