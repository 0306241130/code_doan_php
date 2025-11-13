<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['edit_card'])){
    if(isset($_POST['edit_card']))$masp=$_POST['edit_card'];
    if(isset($_POST['quantity']))$soLuong=$_POST['quantity'];
    if(isset($_POST['Size']))$Size=$_POST['Size'];
    if(isset($_POST['Color']))$Color=$_POST['Color'];
    $con=connect();
    $result=mysqli_query($con,"SELECT gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_giam FROM san_pham WHERE ma_san_pham='".$masp."'");
    $row=mysqli_fetch_assoc($result);

    mysqli_query($con,"UPDATE gio_hang SET so_luong='".$soLuong."',kich_co='".$Size."',mau_sac='".$Color."',gia=".$row['gia_giam']*$soLuong." WHERE ma_san_pham='".$masp."' AND ma_nguoi_dung='".$_SESSION['MA_USER']."'");
    header("Location: " . URL ."giohang.php");
    exit();
}
?>