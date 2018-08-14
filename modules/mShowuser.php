<?php
$dirname=$_SERVER["DOCUMENT_ROOT"];
include_once $dirname . '/model/db_connect.php';

$sconn = new \exam\connect();
$dbSconn = $sconn->getConnection();
//lấy thông tin ban user
$sqlshow = "Select * from user ";
$kq = $dbSconn->query($sqlshow);

$c=0;
if(isset($_GET["c"])){
    $c=$_GET["c"];
}
?>

<table style="margin: 30px 0px" id="customers">
<!--div class="row">
    <div class="col-md-12" style=" border-bottom:2px gray solid;margin: 10px 0px ; padding: 5px 10px;"-->
        <tr class="row">
            <th class="col-md-2" align="center">Account</th>
            <th class="col-md-2" align="center">Password</th>
            <th class="col-md-2" align="center">Name</th>
            <th class="col-md-2" align="center">Address</th>
            <th class="col-md-2 " align="center">Email</th>
            <th class="col-md-2 " align="center">Option</th>
        </tr>
    <!--/div>
</div-->

<?php
if ($kq->num_rows > 0) {
    while ($row = $kq->fetch_assoc()) {
                echo ' <tr class="row ">';
        echo '<td class="col-md-2">' . $row["user"] . '</td>';//lấy thông tin tài khoản
        echo '<td class="col-md-2"><input type="password" disabled="disabled" value="<?php .$row["pwd"]. ?></td>';
        echo '<td class="col-md-2">' . $row["name"] . '</td>';//lấy thông tin tên tài khoản
        echo '<td class="col-md-2">' . $row["address"] . '</td>';//lấy thông tin địa chỉ
        echo '<td class="col-md-2">' . $row["email"] . '</td>';//lấy thông tin email
        echo '<td class="col-md-2" align="center">' .
            '<a href="AdminManager.php?c=8&u='.$row["user"].'"  class="btn btn-danger"><i class="fa fa-pencil-alt" style="color:white;"></i></a>';
        echo '</td>';
        echo '</tr>';

    }
} else {
    echo "0 results";
}
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</table>

