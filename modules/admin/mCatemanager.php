<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 09/06/2018
 * Time: 8:23 CH
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/product.php';
include_once $dirname . '/model/adminControler.php';

$connection=  new \exam\connect();
$connect=$connection->getConnection();
mysqli_set_charset($connect, 'UTF8');
$results = $connect->query("SELECT * FROM grouppro WHERE maloaicon = 0 ORDER BY maloai ASC"); // lấy danh mục có maloaicon = 0
if ($results->num_rows > 0) {

    // Hiển thị dữ liệu từ database theo table
    echo'<table id="customers" style="margin-top: 20px">
    <tr>
        <th>Mã Danh mục</th>
        <th>Tên Danh Mục</th>
        <th>Tùy Chọn</th>
    </tr>  

';
    while ( $obj = $results->fetch_object() ) {
        echo'
            <tr>
                <td>' .$obj->maloai.'</td>
                <td>' .$obj->loaisanpham.'</td>
                <td align="center"><a href="AdminManager.php?c=10&cate='.$obj->maloai.'" class="btn btn-danger"><i class="fa fa-pencil-alt" style="color:white;"></i></a>&nbsp;<a href="AdminManager.php?c=11&cate='.$obj->maloai.'" class="btn btn-warning"><i class="fa fa-trash-alt" style="color:white;"></i></a></td>
            </tr>'; // Trả lại tất cả menu cha
        getSubmenu($obj->maloai); // Nếu có danh mục con thì sẽ được hiển thị

    }
}

function getSubmenu($maloaicon)//$maloaicon tương úng với giá trị $obj->maloai được truyền từ danh muc cha
    {
    global $connect; //global để khai báo biến toàn cục
    $submenu = $connect->query("SELECT * FROM grouppro WHERE maloaicon = ".$maloaicon);
    if ($submenu->num_rows > 0) {

        while ( $obj = $submenu->fetch_object() ) {

            echo'<tr>';
            echo '<td>'.$obj->maloai.'</td>';
            echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$obj->loaisanpham.'</td>';
            echo '<td align="center"><a href="AdminManager.php?c=10&cate='.$obj->maloai.'" class="btn btn-danger"><i class="fa fa-pencil-alt" style="color:white;"></i></a>&nbsp;<a href="AdminManager.php?c=11&cate='.$obj->maloai.'" class="btn btn-warning"><i class="fa fa-trash-alt" style="color:white;"></i></a></td>';
            echo '</tr>';
            getSubmenu($obj->maloai);// nếu có danh mục con nữa thì sẽ được hiển thị
        }

    }
}
echo'</table>';?>