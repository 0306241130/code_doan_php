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
   

    $reslut3=mysqli_query($con,"SELECT MAX(IFNULL(ma_yeu_cau,0)) AS ma_yeu_cau FROM yeu_cau_khach_hang");
    $row3=mysqli_fetch_assoc($reslut3);
    $ma_yeu_cau=$row3['ma_yeu_cau']+1;
    $yeu_cau="xác nhận đơn hàng";

    $result2=mysqli_query($con,"SELECT MAX(IFNULL(ma_chi_tiet,0)) AS ma_chi_tiet FROM chi_tiet_don_hang");
    $row2=mysqli_fetch_assoc($result2);
    $chi_tiet_don_hang=$row2['ma_chi_tiet']+1;

    mysqli_query($con, "INSERT INTO yeu_cau_khach_hang VALUES(" . $ma_yeu_cau . ", " .  $mact . ", " . $madh . ", CURRENT_TIMESTAMP(),'".$yeu_cau."')");
    
    header("Location: ". URL ."donhang.php");
    exit();
}
?>