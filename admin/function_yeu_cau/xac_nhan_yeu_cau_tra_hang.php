<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(isset($_REQUEST['madh'])){
    $con=connect();
    if(isset($_REQUEST['madh'])){
        $madh=$_REQUEST['madh'];
        mysqli_query($con,
        "UPDATE chi_tiet_don_hang ct 
         JOIN don_hang dh ON ct.ma_don_hang = dh.ma_don_hang
         SET ct.trang_thai = 'hoàn trả'
         WHERE ct.trang_thai = 'đang gửi yêu cầu trả hàng'
           AND ct.ma_don_hang = ".$madh."
        ");
    
        mysqli_query($con,"DELETE FROM yeu_cau_khach_hang  WHERE ma_don_hang=".$madh." AND yeu_cau='yêu cầu trả hàng' ");
        
        mysqli_query($con,
        "UPDATE thanh_toan tt
         JOIN chi_tiet_don_hang ct ON tt.ma_thanh_toan = ct.ma_thanh_toan
         JOIN don_hang dh ON dh.ma_don_hang = ct.ma_don_hang
         SET tt.trang_thai_thanh_toan = 'đã hoàn trả'
         WHERE ct.trang_thai = 'hoàn trả'
           AND ct.ma_don_hang = ".$madh
        );
    

        $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang WHERE ma_don_hang=".$madh." AND trang_thai='đã giao'");
        if(mysqli_num_rows($result)==0){
            mysqli_query($con,"UPDATE trang_thai_don_hang SET da_giao='giao không thành công',tra_hang='đã trả hàng' WHERE ma_don_hang=".$madh."");
        }

        header("Location: ". URL_ADMIN ."yeu-cau.php");
        exit();
    }
}
?>