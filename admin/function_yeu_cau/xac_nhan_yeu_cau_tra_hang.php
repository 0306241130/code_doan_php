<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['madh'])){
    $con=connect();
    if(isset($_REQUEST['madh'])&&isset($_REQUEST['mact'])){
        $madh=$_REQUEST['madh'];
        $mact=$_REQUEST['mact'];

        mysqli_query($con,"INSERT INTO hoan_tra VALUES(NULL,$mact);");
        mysqli_query($con,"UPDATE thanh_toan tt JOIN chi_tiet_don_hang ct ON tt.ma_thanh_toan=ct.ma_thanh_toan SET trang_thai_thanh_toan='đã hoàn tiền' WHERE ct.ma_chi_tiet=".$mact."");
        $result1=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang WHERE ma_don_hang=".$madh."");
        $result2=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ct JOIN hoan_tra ht ON ct.ma_chi_tiet=ht.ma_chi_tiet WHERE ma_don_hang=$madh");
        if(mysqli_num_rows($result1)==mysqli_num_rows($result2)){
            mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=6");
        }
         mysqli_query($con,"UPDATE so_luong_ton slt JOIN chi_tiet_don_hang ct
                            ON slt.ma_san_pham=ct.ma_san_pham
                            AND slt.mau_sac=ct.mau_sac AND slt.size=ct.kich_co 
                            SET slt.soluong=slt.soluong+ct.so_luong WHERE ct.ma_chi_tiet=$mact ");

        mysqli_query($con,"DELETE FROM yeu_cau_khach_hang WHERE ma_chi_tiet=".$mact."");
        header("Location: ". URL_ADMIN ."yeu-cau.php");
        exit();
    }
}
if(isset($_REQUEST['mayc'])){
    $con=connect();
    $mayc=$_REQUEST['mayc'];
    mysqli_query($con,"DELETE FROM yeu_cau_khach_hang=$mayc");
    header("Location: ". URL_ADMIN ."yeu-cau.php");
    exit();
}
?>