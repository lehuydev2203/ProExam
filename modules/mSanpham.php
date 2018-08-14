<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/9/2018
 * Time: 5:47 PM
 */
$id=0;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$dirname=$_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/db_connect.php';

$conn=new \exam\connect();
$connect=$conn->getConnection();
$sql=' SELECT masanpham ,l.loaisanpham , tensanpham ,giasanpham , xuatxu , baohanh , giasanpham,motasanpham,hinhanh, tinhtrang FROM chitietsanpham s JOIN  grouppro l ON l.maloai=s.maloai where  l.maloaicon= '.$id .' or s.maloai= '.$id;
$result=$connect->query($sql);
if($result->num_rows>0){
    echo "<div>Trang chủ > Sản Phẩm </div>   ";
    echo "<div class='row'>";
    while($row=mysqli_fetch_array($result)){
       echo ' <div class="col-lg-4 " >
        <div class="row"   style="border: 1px aliceblue solid;border-radius: 2%;margin:5px " class="padding-5" >
            <div class="col-lg-12 padding-10" align="center" style=""><img src="'.$row["hinhanh"].'" alt="" height="200px" ><!--hình Ảnh sản phẩm--></div><!--hinh anh-->
            <div class="col-lg-12 padding-10" ></div>
            <div class="col-lg-12 padding-10" >
                <h1>'.$row["tensanpham"].'</h1>
                <br>
                <i>Giá : <b style="color: red;">'. number_format($row["giasanpham"]).' vnđ</b><!--Giá sản phẩm--></i>
                <h4>Mã Sản Phẩm : '. $row["masanpham"].'</h4>
                <h4>Xuất Xứ : '.$row["xuatxu"]. '</h4>
                <h4>Bảo Hành : '. $row["baohanh"] .'</h4>
                <h4>Mô Tả : '.substr($row['motasanpham'], 0, 50) . '...</h4>
                <div align="center" class="margin-10"><a href="index.php?c=102&id='.$row["masanpham"].'" class="btn btn-success">Chi tiết sản Phẩm</a><!--Chi tiết sản phẩm-->
            </div></div>
            
        </div>
    </div> ';

        }
    echo "</div>";
}else{
    echo "Sản phẩm đang được cập nhập";
}
?>