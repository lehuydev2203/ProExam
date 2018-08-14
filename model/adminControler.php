<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 23/06/2018
 * Time: 11:25 CH
 */

namespace exam;

include_once "db_connect.php";

class adminControler
{

    function addProduct($addProduct)
    {
        $prCon = new connect();
        $prConn = $prCon->getConnection();
        $prSql = "INSERT INTO chitietsanpham (masanpham, maloai, tensanpham, giasanpham, xuatxu, baohanh, hinhanh, motasanpham) VALUES ( '{$addProduct->getMasanpham()}','{$addProduct->getMaloai()}','{$addProduct->getTensanpham()}','{$addProduct->getGiasanpham()}','{$addProduct->getXuatxu()}','{$addProduct->getBaohanh()}','{$addProduct->getHinhanh()}','{$addProduct->getMota()}')";

        if ($prConn->query($prSql) === true) {
            echo "<script >
                            alert('Bạn đã thêm sản phẩm thành công');
                        </script>";
            connect::ChangeURL("AdminManager.php?c=2");
        }
    }

    function updateProduct($updateProduct)
    {
        $prCon = new connect();
        $prConn = $prCon->getConnection();
        $editSql = "UPDATE chitietsanpham  SET maloai='{$updateProduct->getMaloai()}',tensanpham='{$updateProduct->getTensanpham()}',giasanpham='{$updateProduct->getGiasanpham()}', xuatxu='{$updateProduct->getXuatxu()}',baohanh='{$updateProduct->getBaohanh()}', hinhanh='{$updateProduct->getHinhanh()}', motasanpham='{$updateProduct->getMota()}',tinhtrang='{$updateProduct->getTinhtrang()}' WHERE masanpham='{$updateProduct->getMasanpham()}' ";

        if ($prConn->query($editSql) === true) {
            echo "<script >
                      alert('Bạn đã cập nhập sản phẩm thành công');
                  </script>";
            connect::ChangeURL("AdminManager.php?c=2");
        }
    }

    function addCategory($addCate){
        $cateConn=new connect();
        $cateConnect=$cateConn->getConnection();
        $cateSql="INSERT INTO grouppro(loaisanpham,maloaicon) VALUES ('{$addCate->getLoaisanpham()}', '{$addCate->getMaloaicon()}')";

        if($cateConnect->query($cateSql)){
        echo  "<div>
        <script>                      
                    alert('Bạn đã cập nhập danh mục thành công');
        </script></div>";
            connect::ChangeURL("AdminManager.php?c=3");
        }
    }

    function UpdateView($view){
        $cateConn=new connect();
        $viewConnect=$cateConn->getConnection();
        $viewSql="UPDATE chitietsanpham  SET soluotxem='{$view->getluotxem()}' WHERE masanpham='{$view->getMasanpham()}'";
        $viewConnect->query($viewSql);

    }

    function delRow($delRow){
        $cateConn=new connect();
        $viewConnect=$cateConn->getConnection();
        $viewSql="delete from chitietsanpham  where maloai='{$delRow->getMaloai()}' && masanpham='{$delRow->getMasanpham()}'";
        if($viewConnect->query($viewSql)){
        echo  "<div>
        <script>                      
                    alert('Bạn đã xóa sản phẩm thành công');
        </script></div>";
        connect::ChangeURL("AdminManager.php?c=2");}

    }

    function editCate($editCate){
        $EditConn=new connect();
        $EditConnect=$EditConn->getConnection();
        $EditSql="UPDATE grouppro  SET maloai='{$editCate->getMaloai()}' , loaisanpham='{$editCate->getLoaisanpham()}' , maloaicon='{$editCate->getMaloaicon()}' WHERE maloai='{$editCate->getMaloai()}'";
        if($EditConnect->query($EditSql)){
            echo  "<div>
        <script>                      
                    alert('Bạn đã cập nhập danh mục thành công');
        </script></div>";
            connect::ChangeURL("AdminManager.php?c=3");
        }
    }

    function delCate($delCate){
        $DelConn=new connect();
        $DelCon=$DelConn->getConnection();
        $delSql="delete from grouppro  where maloai='{$delCate->getMaloai()}' ";
        if($DelCon->query($delSql)){
            echo  "<div>
        <script>                      
                    alert('Bạn đã Xóa danh mục thành công');
        </script></div>";
            connect::ChangeURL("AdminManager.php?c=3");
        }
    }
}