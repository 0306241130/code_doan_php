<?php 
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['madh'])){
    $madh=$_REQUEST['madh'];


    mysqli_query($con,"
UPDATE chi_tiet_don_hang 
SET trang_thai='đã giao' 
WHERE ma_don_hang=".$madh."
");

mysqli_query($con,"UPDATE trang_thai_don_hang
SET cho_giao_hang='giao thành công',da_giao='đã giao' 
WHERE ma_don_hang=".$madh."");

    mysqli_query($con,"
    UPDATE thanh_toan tt
    JOIN chi_tiet_don_hang ct 
        ON ct.ma_thanh_toan = tt.ma_thanh_toan
    SET tt.trang_thai_thanh_toan = 'đã thanh toán'
    WHERE ct.ma_don_hang = ".$madh."
");




    header("Location: ". URL_ADMIN ."chogiaohang.php" );
    exit();
}
?>