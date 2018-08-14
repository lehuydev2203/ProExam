<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 09/06/2018
 * Time: 8:23 CH
 */
$dirname=$_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/db_connect.php';
$connection= new \exam\connect();//gọi class connect của namesapce là exam
$conn=$connection->getConnection();
mysqli_set_charset($conn, 'UTF8');
$results = $conn->query("SELECT * FROM grouppro WHERE maloaicon = 0 ORDER BY maloai ASC");
if ($results->num_rows > 0) {

    echo '<ul >';
    while ( $obj = $results->fetch_object() ) {
        echo '<li  class="alert alert-success"  ><a href="index.php?c=101&id='.$obj->maloai.' ">' . $obj->loaisanpham. ' &bigtriangledown; </a>'; // Trả lại tất cả menu cha
        getSubmenu($obj->maloai); // Nếu có menu con thì sẽ được hiển thị
        echo '</li>';
    }
    echo '</ul>';
}

function getSubmenu($maloaicon) {
    global $conn; //global để khai báo biến toàn cục
    $submenu = $conn->query("SELECT * FROM grouppro WHERE maloaicon = ".$maloaicon);
    if ($submenu->num_rows > 0) {
        echo '<ul>';
        while ( $obj = $submenu->fetch_object() ) {
            echo '<li><a href="index.php?c=101&id='.$obj->maloai.'"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $obj->loaisanpham . '</a>';
            getSubmenu($obj->maloai); // nếu có menu con nữa thì sẽ được hiển thị
            echo '</li>';
        }
        echo '</ul>';
    }
}
?>