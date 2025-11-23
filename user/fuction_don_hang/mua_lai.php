<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");

$con=connect();
if(isset($_REQUEST['mact'])&&isset($_REQUEST['mdh'])){
    $mact=$_REQUEST['mact'];
    $madh=$_REQUEST['mdh'];
    
 
   

    // $reslut3=mysqli_query($con,"SELECT MAX(IFNULL(ma_yeu_cau,0)) AS ma_yeu_cau FROM yeu_cau_khach_hang");
    // $row3=mysqli_fetch_assoc($reslut3);
    // $ma_yeu_cau=$row3['ma_yeu_cau']+1;
    // $yeu_cau="xác nhận đơn hàng";

    // $result2=mysqli_query($con,"SELECT MAX(IFNULL(ma_chi_tiet,0)) AS ma_chi_tiet FROM chi_tiet_don_hang");
    // $row2=mysqli_fetch_assoc($result2);
    // $chi_tiet_don_hang=$row2['ma_chi_tiet']+1;

    // mysqli_query($con, "INSERT INTO yeu_cau_khach_hang VALUES(" . $ma_yeu_cau . ", " .  $mact . ", " . $madh . ", CURRENT_TIMESTAMP(),'".$yeu_cau."')");
    
    header("Location: ". URL ."donhang.php");
    exit();
}
?>