<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if (isset($_REQUEST['maspXoa'])) {
    $ma_san_pham = $_REQUEST['maspXoa'];
    $con=connect();
    mysqli_query($con,"DELETE FROM san_pham WHERE ma_san_pham=".$ma_san_pham."");
    header("Location: ". URL_ADMIN . "san-pham.php");
    exit();
}
?>