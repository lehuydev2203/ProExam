<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/14/2018
 * Time: 5:34 PM
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];

//import các trang liên quan vào
include_once $dirname . '/model/product.php';
include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/cate.php';

$cate=null;
if(isset($_GET["cate"])){
    $cate=$_GET["cate"];
}

$conn = new \exam\connect();
$con=$conn->getConnection();

$sql="Select * from grouppro where maloai='$cate'";
$result=$con->query($sql);



if($result->num_rows==1){
    while($row=mysqli_fetch_array($result)){
        $maloai=$row["maloai"];
        $maloaicon=$row["maloaicon"];
        $childSql="select * from grouppro where maloai='$maloaicon'";
        $kq=$con->query($childSql);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_REQUEST["txtdanhmuc"])){
                $txtDanhmuc=$_REQUEST["txtdanhmuc"];
            }
            if(isset($_REQUEST["txtchild"])){
                $txtChild=$_REQUEST["txtchild"];
            }
            if(isset($_REQUEST["txtparent"])){
                $txtParent=$_REQUEST["txtparent"];
            }
            if($txtChild!=$txtParent){
                $txtCate=$txtParent;
            }else{
                $txtCate=$txtChild;
            }
            $editCate=new \exam\cate();
            $editCate->setLoaisanpham($txtDanhmuc);
            $editCate->setMaloaicon($txtCate);
            $editCate->setMaloai($maloai);
            $edit=new \exam\adminControler();
            $edit->editCate($editCate);
        }



        echo '
    <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4" >
        <form action="" style="border-radius: 2%" method="post">
        <div >
            <h2 class="alert alert-success">Chỉnh Sửa Danh Mục</h2>
        </div>
            <br>
        <div>
            Tên Danh Mục : <input type="text" name="txtdanhmuc" class="form-control" style="margin: 10px 0px" value="'.$row["loaisanpham"].'" >
           </div>
        <div>
        ';
    if($kq->num_rows==1){
    while($childRow=mysqli_fetch_array($kq)){
        echo '
            Tên Danh Mục Thuộc :
             <select name="txtchild" id="" class="form-control" style="margin: 10px 0px">
                <option value="'.$childRow["maloai"].'">'.$childRow["loaisanpham"].'</option>
            </select>
        </div>
        <div> Thay đổi qua danh mục :
            <select name="txtparent" id="" class="form-control" style="margin: 10px 0px">
            <option value="'.$childRow["maloai"].'">'.$childRow["loaisanpham"].'</option>
               ';

        $parentSql="select * from grouppro";
        $parentkq=$con->query($parentSql);
        if($parentkq->num_rows>0){
        while ($rowParent=mysqli_fetch_array($parentkq)){
        echo ' <option value="'.$rowParent["maloai"].'">'.$rowParent["loaisanpham"].'</option>';
        }}
        echo'
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-success" style="margin: 10px 0px">Cập Nhập Danh Mục</button>
        </div>
        </form>
    </div>
    <div class="col-lg-4"></div>
</div>
            ';


            }
        }
    }
}
?>




