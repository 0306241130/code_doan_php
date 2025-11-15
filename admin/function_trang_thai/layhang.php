<?php 
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['madh'])){
    $madh=$_REQUEST['madh'];
    mysqli_query($con,"UPDATE trang_thai_don_hang SET cho_lay_hang='đã lấy hàng',cho_giao_hang='chờ giao hàng' WHERE ma_don_hang=".$madh."");
    mysqli_query($con,"UPDATE chi_tiet_don_hang SET trang_thai='chờ giao hàng' WHERE ma_don_hang=".$madh."");
    header("Location: ". URL_ADMIN ."cholayhang.php" );
    exit();
}
?>