<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
session_start();
if(!isset($_SESSION['USER'])){
    header("Location: ". URL_LOGIN_USER);
    exit();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['size']))$size=$_POST['size'];
    if(isset($_POST['color']))$color=$_POST['color'];
    if(isset($_POST['soLuong']))$soLuong=$_POST['soLuong'];
    if(isset($_POST['masp']))$masp=$_POST['masp'];
    $con=connect();
    $result=mysqli_query($con,"SELECT ten_san_pham, gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);
    mysqli_query($con,"INSERT INTO gio_hang VALUES(".$_SESSION['MA_USER'].",".$soLuong.",'".$row['ten_san_pham']."',".$masp.",".$size.",'".$color."',".$row['gia_sau_khi_giam']*$soLuong." )");
}
?>