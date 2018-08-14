<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/14/2018
 * Time: 8:09 PM
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/product.php';
include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/cate.php';
//lấy mã loại
$cate=8;
if(isset($_GET["cate"])){
    $cate=$_GET["cate"];
}

$conn = new \exam\connect();
$con=$conn->getConnection();

$delSql="Select * from grouppro where maloai='$cate'";
$result=$con->query($delSql);
if($result->num_rows==1) {

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $maloaidel=$cate;
        $delCate=new \exam\cate();
        $delCate->setMaloai($maloaidel);
        $del=new \exam\adminControler();
        $del->delCate($delCate);
    }

    while ($row = mysqli_fetch_array($result)) {

    echo ' <div class="row">
        <div class="col-md-4" style="margin: 10px 0px ; padding: 5px 10px;"></div>
        <div class="col-md-4" style="margin: 10px 0px ; padding: 5px 10px;">

            <!--show danh mục cần xác nhận để xóa-->
            <form action="" method="post" enctype="multipart/form-data">
           
                <div class="alert alert-success">
                    <h2>Bạn muốn xóa danh mục dưới đây</h2>
                </div>
                <br>
                <div>
                    <h4>Tên Danh Mục : '.$row["loaisanpham"] .'</h4>
                </div>
                <br>
                <div>';
        $maloaicon = $row["maloaicon"];
        $maloai=$row["maloai"];
    $childSql = "select * from grouppro where maloai='$maloaicon'";
    $kq = $con->query($childSql);
    if ($kq->num_rows == 1){
    while ($parentrow = mysqli_fetch_array($kq)){
        echo '
            <h5>Danh Mục Cha : '. $parentrow["loaisanpham"].'</h5>
            </div>
            <br>';
                }
                }
             echo '
                <div>
                    <h5 style="color: red;"><i>* Bạn đang làm một việc rất nguy hiểm , suy nghĩ kỹ trước khi thực hiện
                            xóa danh mục này , nó có thể xóa các danh mục con nếu có , và những gì liên quan tới danh mục này .</i></h5>
                </div>
                <br>
                <!--Submit-->
                <button type="submit" class="btn btn-danger" style="margin-bottom: 20px">Xác nhận Xóa</button>
                <!--/Submit-->
            </form>
        </div>
    </div>';

}}
?>