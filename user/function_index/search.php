<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if (isset($_POST['tensp'])) {
    $tensp = $_POST['tensp'];
    $con = connect();
    $sql = "SELECT ten_san_pham,ma_san_pham FROM san_pham WHERE ten_san_pham LIKE '%".$tensp."%'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '  <li class="list-group-item">
            <a href="buy.php?masp='.$row['ma_san_pham'].'" class="text-decoration-none">'.$row['ten_san_pham'].'</a>
          </li>';
        }
    }
    mysqli_close($con);
}

?>