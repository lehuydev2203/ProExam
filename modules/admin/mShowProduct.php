<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/28/2018
 * Time: 7:06 PM
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/db_connect.php';

$pconn = new \exam\connect();
$dbPconn = $pconn->getConnection();
$proshow = "Select * from chitietsanpham order by stt desc"; //lấy danh sách sản phẩm theo thứ tự mới nhất
$kqp = $dbPconn->query($proshow);
if ($kqp->num_rows > 0) {
    echo '    
   
<table id="customers"style="margin-top: 20px;">
    
        <tr >
            <th>Hình ảnh</th>
            <th>Thông tin</th>
            <th>Tùy Chọn</th>
        </tr>
    ';


while ($rowp = mysqli_fetch_array($kqp)) {
    // xuất thông tin sản phẩm
  echo '

    <tr >
        <td align="center"><img src="'.$rowp["hinhanh"].'" alt="" width="200px" ></td>
        <td align="left" >
            <h2 >Tên Sản Phẩm : '.$rowp["tensanpham"].' <i style="color:red ; font-family: Arial;">( '.$rowp["tinhtrang"] . ' )</i></h2><br>
           
            <h4 >Giá : '. number_format($rowp["giasanpham"]).' vnđ .</h4>
            <h6 >Mã Sản Phẩm : '. $rowp["masanpham"].'</h6>
            <h6 >Xuất Xứ : '.$rowp["xuatxu"]. '</h6>
            <h6 >Bảo Hành : '. $rowp["baohanh"] .'</h6>
            <h6 >Mô tả : '.substr($rowp['motasanpham'], 0, 50) . '... <a href="AdminManager.php?c=6&pr='.$rowp["masanpham"].'" style="text-decoration: none;list-style-type: none;">Xem Thêm </h6>
        </td>
        <td align="center">
            <a href="AdminManager.php?c=6&pr='.$rowp["masanpham"].'" class="btn btn-danger">
                <i class="fa fa-pencil-alt" style="color:white;"></i></a>&nbsp;<a href="AdminManager.php?c=9&pr='.$rowp["masanpham"].'" class="btn btn-warning">
                <i class="fa fa-trash-alt" style="color:white;"></i></a>&nbsp;
                        
        </td>
    </tr> 
        
  

';


    }
   echo ' </table> '; }