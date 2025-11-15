<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['madh'])){
    
    if($_REQUEST['madh'])$madh=$_REQUEST['madh'];

    mysqli_query($con,"UPDATE chi_tiet_don_hang SET trang_thai='chờ lấy hàng' WHERE ma_don_hang='".$madh."'");
    mysqli_query($con,"UPDATE trang_thai_don_hang SET cho_xac_nhan='đã xác nhận',cho_lay_hang='chờ lấy hàng' WHERE ma_don_hang='".$madh."'");
    mysqli_query($con,"DELETE FROM yeu_cau_khach_hang WHERE ma_don_hang='".$madh."'");
    header("Location: ". URL_ADMIN ."yeu-cau.php");
}
?>