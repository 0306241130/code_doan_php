<?php 
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['masp'])){
    $masp=$_REQUEST['masp'];
    $con=connect();
    mysqli_query($con,"DELETE FROM gio_hang WHERE ma_san_pham=".$masp." AND ma_nguoi_dung=".$_SESSION['MA_USER']."");
    header("Location: ". URL ."giohang.php");
    exit();
}
?>