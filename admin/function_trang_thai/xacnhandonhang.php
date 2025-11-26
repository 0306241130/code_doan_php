<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if(isset($_REQUEST['madhxacnhan'])){
    $madhxacnhan=$_REQUEST['madhxacnhan'];
    mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=2 WHERE ma_don_hang=$madhxacnhan");
}
if(isset($_REQUEST['madhChoLayHang'])){
    $madhxacnhan=$_REQUEST['madhChoLayHang'];
    mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=3 WHERE ma_don_hang=$madhxacnhan");
}
if(isset($_REQUEST['madhChoGiaoHang'])){
    $madhChoGiaoHang=$_REQUEST['madhChoGiaoHang'];
    mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=4 WHERE ma_don_hang=$madhChoGiaoHang");
}
if(isset($_REQUEST['madhHuyHang'])){
    $madhHuyHang=$_REQUEST['madhHuyHang'];
    mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=6 WHERE ma_don_hang=$madhHuyHang");

    $sql="INSERT INTO huy_hang(ma_huy, ma_chi_tiet) 
    SELECT NULL,ma_chi_tiet 
    FROM chi_tiet_don_hang 
    WHERE ma_don_hang=$madhHuyHang";

    mysqli_query($con,$sql);
}
?>