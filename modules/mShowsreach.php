<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/20/2018
 * Time: 1:15 PM
 */
$dirname=$_SERVER["DOCUMENT_ROOT"];
include_once $dirname.'/model/db_connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $search=null;
    if(isset($_REQUEST["txtsearch"])){

        $search=$_REQUEST["txtsearch"];
    }
    //kiểm tra $search có rỗng hay không , nếu rỗng thì thông báo lỗi
    if(empty($search)){

        echo "
        <div class='alert alert-warning' style='color: red;'>Vui lòng nhập từ khóa bạn muốn tìm kiếm .</div>
        ";
    }
    else //ngược lại thì tìm trong CSDL
    {
    $con=new \exam\connect();
    $coon=$con->getConnection();
    $sql="Select * from chitietsanpham where tensanpham like '%$search%'";
    $kq=$coon->query("$sql");
    if($kq->num_rows>0){
        echo "<div>Trang chủ > Tìm Kiếm Sản Phẩm </div>   ";
        echo "<div class='row'>";
        while($row=mysqli_fetch_array($kq)){
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
    }
    }
    }
?>