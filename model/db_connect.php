<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 06/06/2018
 * Time: 5:35 CH
 */

namespace exam;


class connect
{

private $conn=null;
public function __construct()
{
    $this->conn=new \mysqli("localhost","root","","bai_thi");
    mysqli_set_charset($this->conn, 'UTF8');
    if ($this->conn->connect_error){
        die($this->conn->connect_error);
    }else{

    }
}
    public function getConnection(){
        return $this->conn;
    }

    public static function ChangeURL($url){
        echo "<script type='text/javascript'> location='$url'; </script>";
    }
}