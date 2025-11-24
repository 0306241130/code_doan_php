<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
session_start();
if(!isset($_SESSION['USER'])){
    header("Location: ". URL_LOGIN_USER);
    exit();
}
function kiemTraSanPham($con,$masp,$size,$color){
    $con=connect();
    if($con){
        $result = mysqli_query($con, "SELECT * FROM gio_hang WHERE ma_san_pham='" . $masp . "' AND kich_co=" . $size . " AND mau_sac='" . $color . "' AND ma_nguoi_dung=" . $_SESSION['MA_USER']);
        if ($result && mysqli_num_rows($result) > 0) {
            return TRUE;
        }
    }
    return FALSE;
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['size']))$size=$_POST['size'];
    if(isset($_POST['color']))$color=$_POST['color'];
    if(isset($_POST['soLuong']))$soLuong=$_POST['soLuong'];
    if(isset($_POST['masp']))$masp=$_POST['masp'];
    $con=connect();
    $result1 =mysqli_query($con,"SELECT * FROM so_luong_ton WHERE ma_san_pham=".$masp." AND mau_sac='".$color."' AND size=".$size."");
    $row1=mysqli_fetch_assoc($result1);
    if($row1['soluong']<$soLuong){
        echo "Số lượng sản phẩm không đủ trong kho.";
    }else{
    
    $result=mysqli_query($con,"SELECT ten_san_pham, gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);
    if(kiemTraSanPham($con,$masp,$size,$color)){
        mysqli_query($con, "UPDATE gio_hang SET so_luong = so_luong + $soLuong, gia = " . ($row['gia_sau_khi_giam'] * $soLuong ) . "+ gia WHERE ma_san_pham='" . $masp . "' AND kich_co=" . $size . " AND mau_sac='" . $color . "' AND ma_nguoi_dung=" . $_SESSION['MA_USER']);
    }else{
    mysqli_query($con,"INSERT INTO gio_hang VALUES(".$_SESSION['MA_USER'].",".$soLuong.",'".$row['ten_san_pham']."',".$masp.",".$size.",'".$color."',".$row['gia_sau_khi_giam']*$soLuong." )");
    }
}
}
?>