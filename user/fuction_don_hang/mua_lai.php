<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
function countChoXacNhan($con,$maDonHang){
    $result=mysqli_query($con,"SELECT COUNT(*) AS soLuong FROM chi_tiet_don_hang WHERE ma_don_hang=".$maDonHang." AND trang_thai='chờ xác nhận'");
    $row=mysqli_fetch_assoc($result);
    return $row['soLuong'];
}
$con=connect();
if(isset($_REQUEST['mact'])&&isset($_REQUEST['mdh'])){
    $mact=$_REQUEST['mact'];
    $madh=$_REQUEST['mdh'];
    mysqli_query($con,"UPDATE chi_tiet_don_hang SET trang_thai='chờ xác nhận' WHERE ma_chi_tiet='".$mact."'");
    if(countChoXacNhan($con,$madh)>0){
        mysqli_query($con,"UPDATE trang_thai_don_hang SET cho_xac_nhan='chờ xác nhận',da_huy=NULL WHERE ma_don_hang=".$madh."");
    }
    header("Location: ". URL ."donhang.php");
    exit();
}
?>