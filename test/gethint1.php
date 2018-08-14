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
    echo $id;

