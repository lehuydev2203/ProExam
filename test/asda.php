<?
$dirname = $_SERVER["DOCUMENT_ROOT"];

include_once $dirname . '/model/product.php';

include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/cate.php';



?>

<select name='LoaiCha'>
    <option value="0">Chọn loại cha</option>
    <?php

    function Menu($parentid = 0, $space = "", $trees = array())
    {
        if(!$trees)
        {
            $trees = array();
        }
        $connection=  new \exam\connect();
        $connect=$connection->getConnection();
        mysqli_set_charset($connect, 'UTF8');
        $sql="select * from grouppro where maloaicon=$parentid";
        $query=$connect->query($sql);
        while($rs = mysqli_fetch_array($query))
        {
            $trees[] = array( 'maloai' => $rs['maloai'],
                'loaisanpham'=>$space.$rs['loaisanpham'],
            );
            $trees = Menu($rs['maloai'], $space.'&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;', $trees);
        }
        return $trees;
    }
    $menu = Menu(0);


    foreach($menu as $k => $row)
    {
        ?>

        <option value="<?php echo $row['maloai']; ?>"><?php echo $row['loaisanpham']; ?></option>

        <?php
    }
    ?>
</select>