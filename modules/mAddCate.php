<?php
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 7/5/2018
 * Time: 1:56 AM
 */
/**
 * Created by PhpStorm.
 * User: nhoxk
 * Date: 09/06/2018
 * Time: 8:23 CH
 */
$dirname = $_SERVER["DOCUMENT_ROOT"];

//import các trang liên quan vào
include_once $dirname . '/model/product.php';
include_once $dirname . '/model/db_connect.php';
include_once $dirname . '/model/adminControler.php';
include_once $dirname . '/model/cate.php';


$connection = new \exam\connect();
$connect = $connection->getConnection();
mysqli_set_charset($connect, 'UTF8');
$sql = "select * from grouppro where maloaicon=0";
$result = $connect->query($sql);


if ($result->num_rows > 0){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //lấy thông tin danh mục phụ nếu có
    if (isset($_REQUEST["getCatePhu"])) {
        $getCatephu = $_REQUEST["getCatePhu"];
    }
    //lấy thông tin danh mục chính
    if (isset($_REQUEST["GetCateMaster"])) {
        $getCatechinh = $_REQUEST["GetCateMaster"];
    }

    //so sánh giá trị danh mục phụ và danh mục chính cái nào lớn hơn thì lấy để gán vào mã loại con
    if ($getCatephu > $getCatechinh) {
        $getCate = $getCatephu;
    } else {
        $getCate = $getCatechinh;
    }

    //thêm tên danh mục
    if (isset($_REQUEST["themDanhMuc"])) {
        $themDanhMuc = $_REQUEST["themDanhMuc"];
    }


    $addCate = new \exam\cate();
    $addCate->setMaloaicon($getCate);//set maloaicon
    $addCate->setLoaisanpham($themDanhMuc);// set danh mục
    $add = new \exam\adminControler();
    $add->addCategory($addCate);
}

?>

<div class="row">
    <div class="offset-lg-3"></div>
    <div class="col-lg-6">
        <form method="post" style="border-radius: 2%">
            <div class="alert alert-success">
                <h2>Thêm danh mục mới</h2>
            </div>
            <div>
                <table id="cate">
                    <!--danh mục chính-->
                    <tr>
                        <th>Danh Mục Chính : </th>
                        <td>
                            <!--lấy giá trị trong option truyền vào hàm showhint -->
                            <select name="GetCateMaster" id="" onchange="showHint(this.value)" class="form-control"
                                    style="width: 252px">
                                <option value="0">Chọn Danh Mục Chính</option>
                                <?php
                                //hiện tên danh mục và value trong thẻ option sẽ dồng thời là mã loại
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='" . $row["maloai"] . "'>" . $row["loaisanpham"] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <!--danh mục phụ-->
                    <tr>
                        <th>Danh Mục Phụ :</th>
                        <td>
                            <!--nếu có giá trị từ việc truy suất select danh mục chính thì sẽ truyền tham số vào thẻ txtHint-->
                            <span id="txtHint"></span>
                        </td>
                    </tr>

                    <!--thêm danh mục -->
                    <tr>
                        <th>Thêm Danh Mục:</th>
                        <td><input type="text" name="themDanhMuc" class="form-control" style="width: 252px"></td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="offset-lg-3"></div>
</div>

<script>
    //dùng ajax để truyền tham số
    //str là giá trị đã lấy từ value trong thẻ option
    function showHint(str) {
        if (str.length == 0) {
            //nếu độ dài str = 0 thì trả về id txtHint
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        else
        //ngược lại thì thực hiện ajax để gọi giá trị
        {
            //khai báo giá trị ajax xmlhttp
            var xmlhttp = new XMLHttpRequest();
            //hàm onreadystatechange là mộtvent Handler lắng nghe và xử lý một sự kiện khi có thay đổi về trạng thái nào diễn ra.
            xmlhttp.onreadystatechange = function () {
                //readyState định nghĩa trạng thái hiện tai của đối tượng XMLHttpRequest
                // 4 tương dồng với việc kết thúc request
                // status là trả về trang thái hiện tại bằng số , ở đây status = 200 là OK
                if (this.readyState == 4 && this.status == 200) {
                    //trả giá trị về txtHint
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            //truền tham số qua phương thức get , vào trang mGetHint
            xmlhttp.open("GET", "modules/mGethint.php?id=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<?php

}

?>
