<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ma_san_pham'])) {
    $ma_san_pham = $_POST['ma_san_pham'];
    $con=connect();
    mysqli_query($con,"DELETE FROM san_pham WHERE ma_san_pham=".$ma_san_pham."");
    header("Location: ". URL_ADMIN . "san-pham.php");
    exit();
}
?>