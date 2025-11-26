<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['madh'])&&isset($_REQUEST['mact'])){
    if(isset($_REQUEST['madh']))$madh=$_REQUEST['madh'];
    if(isset($_REQUEST['mact']))$mact=$_REQUEST['mact'];

    $con=connect();
    mysqli_query($con,"DELETE FROM yeu_cau_khach_hang WHERE ma_chi_tiet=".$mact." AND ma_don_hang=".$madh."");
    header("Location: " . URL . "donhang.php");
    exit();

}
?>