<?php
$host="127.0.0.1";
$user="root";
$pas="";
$dbname="bai_thi";

$conn=mysqli_connect($host,$user,$pas,$dbname);
mysqli_set_charset($conn,"UTF8");
$sql="select * from grouppro where maloaicon=0";
$result=$conn->query($sql);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_REQUEST["setDanhmucchinh"])){
        $danhmucchinh=$_REQUEST["setDanhmucchinh"];
    }
    if(isset($_REQUEST["setDanhMucPhu"])){
        $danhmucphu=$_REQUEST["setDanhMucPhu"];
    }
}

if($result->num_rows>0){
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form method="post">
    <table id="cate">
        <tr>
            <th>Danh Mục Chính : </th>
            <td>
                <select name="setDanhmucchinh" onchange="showHint(this.value)" class="form-control" style="width: 202px">
                    <option value="--">Chọn Danh Mục Chính</option>
                     <?php while ($row=mysqli_fetch_array($result)){
                           echo  "<option value=". $row['maloai'].">".$row['loaisanpham']."</option> ";
                     }
                     ?>
                </select>
            </td>
        <tr>
            <th>Thêm danh mục chính :</th>
            <td><input type="text" name="setDanhMucChinh" class="form-control" style="width: 202px"></td>
        </tr>
        <tr>
            <th>Danh mục phụ : </th>
            <td>
                <span id="txtHint"></span>
            </td>
        </tr>
    <tr><th></th><td><button type="submit">Thêm</button></td></tr>
    </table>
</form>



<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return ;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "gethint.php?id="+str, true);
            xmlhttp.send();
        }
    }
</script>
</body>
</html>
        <?php

}
?>