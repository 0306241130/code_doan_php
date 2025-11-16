<?php
require_once(__DIR__ . "/../../difen_connect_php/connect.php");
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['traHang'])){
    $lydo="";
    if(isset($_POST['lydo'])){
        foreach($_POST['lydo'] as $value){
            $lydo .= $value . ", ";
        }
    }
    if(isset($_POST['ma-don-hang']))$madh=$_POST['ma-don-hang'];
    if(isset($_POST['ma-chi-tiet']))$mact=$_POST['ma-chi-tiet'];
    
   

    $con=connect();
    mysqli_query($con,"UPDATE chi_tiet_don_hang SET trang_thai='đang gửi yêu cầu trả hàng' WHERE ma_chi_tiet=".$mact."");
   
    mysqli_query($con,"INSERT INTO yeu_cau_khach_hang (ma_chi_tiet,ma_don_hang,ngay_yeu_cau,yeu_cau) VALUES(".$mact.",".$madh.",current_timestamp(),'yêu cầu trả hàng') ");

    mysqli_query($con, "INSERT INTO hoan_tra (ma_chi_tiet, ly_do) VALUES (" . $mact . ", '" . $lydo . "')");


    header("Location: " . URL . "donhang.php");
    exit();

}
?>