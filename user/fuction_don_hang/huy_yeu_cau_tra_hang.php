<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['madh'])&&isset($_REQUEST['mact'])){
    if(isset($_REQUEST['madh']))$madh=$_REQUEST['madh'];
    if(isset($_REQUEST['mact']))$mact=$_REQUEST['mact'];

    $con=connect();
    mysqli_query($con,"DELETE FROM hoan_tra WHERE ma_chi_tiet=".$mact."");
    mysqli_query($con,"DELETE FROM yeu_cau_khach_hang WHERE ma_chi_tiet=".$mact." AND yeu_cau='yêu cầu trả hàng'");
    mysqli_query($con,"UPDATE chi_tiet_don_hang SET trang_thai='đã giao' WHERE ma_chi_tiet=".$mact."");

    header("Location: " . URL . "donhang.php");
    exit();

}
?>