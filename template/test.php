<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname='bai_thi';
$conn= mysqli_connect($host, $user, $pass,$dbname);

if(isset($_POST['get_option']))
{

$state = $_POST['get_option'];
$find=$conn->query("select * from grouppro where state='$state'");
while($row=mysqli_fetch_array($find))
{
echo "<option>".$row['loaisanpham']."</option>";
}
exit;
}?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="select_style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        function fetch_select(val)
        {
            $.ajax({
                type: 'post',

                data: {
                    get_option:val
                },
                success: function (response) {
                    document.getElementById("new_select").innerHTML=response;
                }
            });
        }

    </script>

</head>
<body>
<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>

    <div id="select_box">
        <select onchange="fetch_select(this.value);">
            <option>Select state</option>
            <?php
            $select=$conn->query("select * from grouppro where maloaicon=0 ");
            while($row=mysqli_fetch_array($select))
            {
                echo "<option value='".$row['maloai']."'>".$row['loaisanpham']."</option>";
            }
            ?>
        </select>

        <select id="new_select">
        </select>

    </div>

</body>
</html>