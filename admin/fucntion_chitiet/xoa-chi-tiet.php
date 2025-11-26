<?php 
require_once(__DIR__. "/../../difen_connect_php/connect.php");

if(isset($_REQUEST['machitiet'])){
    $con=connect();
    $mact=$_REQUEST['machitiet'];
    

    $sql="UPDATE so_luong_ton slt JOIN chi_tiet_don_hang ct ON slt.ma_san_pham=ct.ma_san_pham
          SET slt.soluong=slt.soluong+ct.so_luong WHERE slt.mau_sac=ct.mau_sac AND ct.kich_co=slt.size AND ct.ma_chi_tiet=$mact";
          mysqli_query($con,$sql);

    $sql="DELETE tt FROM thanh_toan tt JOIN chi_tiet_don_hang ct ON tt.ma_thanh_toan=ct.ma_thanh_toan WHERE ct.ma_don_hang=$mact";
    mysqli_query($con,$sql);

    mysqli_query($con,"DELETE FROM chi_tiet_don_hang WHERE ma_chi_tiet=".$mact."");
}
?>