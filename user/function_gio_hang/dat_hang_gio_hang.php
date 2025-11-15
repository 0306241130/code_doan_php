<?php session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php"); ?>
<?php
function insertDonHang($con,$diachigiaohang){
    $resultDonHang=mysqli_query($con,"SELECT MAX(IFNULL(ma_don_hang,0)) AS ma_don_hang FROM don_hang");
    $newMaDonHang=mysqli_fetch_assoc($resultDonHang);
    $phiVanChuyen = 10000.0;
    $maDonHangMoi = $newMaDonHang['ma_don_hang']+1;
    mysqli_query($con,"INSERT INTO don_hang VALUES(".$maDonHangMoi.",".$_SESSION['MA_USER'].",CURRENT_TIMESTAMP(),".$phiVanChuyen.",'".$diachigiaohang."')");
 

    
    return $maDonHangMoi;
}
function insertThanToan($con,$phuongThucThanhToan,$soTienCanThanhToan){
    $trangThai="chưa thanh toán";
    $resultThanhToan=mysqli_query($con,"SELECT MAX(IFNULL(ma_thanh_toan,0)) AS ma_thanh_toan FROM thanh_toan");
    $newMaThanhToan=mysqli_fetch_assoc($resultThanhToan);
    $maThanhToanMoi=$newMaThanhToan['ma_thanh_toan']+1;
    mysqli_query($con,"INSERT INTO thanh_toan VALUES(".$maThanhToanMoi.",'".$phuongThucThanhToan."','".$trangThai."',".$soTienCanThanhToan.")");
    return $maThanhToanMoi;
}
function insertYeuCauKhachHang($con,$ma_chi_tiet,$ma_don_hang){
    $con=connect();
    $reslut3=mysqli_query($con,"SELECT MAX(IFNULL(ma_yeu_cau,0)) AS ma_yeu_cau FROM yeu_cau_khach_hang");
    $row3=mysqli_fetch_assoc($reslut3);
    $ma_yeu_cau=$row3['ma_yeu_cau']+1;
    $yeu_cau="xác nhận đơn hàng";
    mysqli_query($con,"INSERT INTO yeu_cau_khach_hang VALUES(".$ma_yeu_cau.",".$ma_chi_tiet.",".$ma_don_hang.", CURRENT_TIMESTAMP(),'".$yeu_cau."')");
}
function insertInsertTrangThaiDonHang($con,$ma_don_hang){
    $reslut4=mysqli_query($con,"SELECT MAX(IFNULL(ma_trang_thai,0)) AS ma_trang_thai FROM trang_thai_don_hang");
    $row4=mysqli_fetch_assoc($reslut4);
    $ma_trang_thai=$row4['ma_trang_thai']+1;
    $trangThai="xác nhận";
    mysqli_query($con,"INSERT INTO trang_thai_don_hang (ma_don_hang,cho_xac_nhan,ma_trang_thai) VALUES(".$ma_don_hang.",'".$trangThai."',".$ma_trang_thai.")");
}
?>
<?php
$con=connect();
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['BuyGioHang'])){
if(isset($_POST['username']))$tenNguoiNhan=$_POST['username'];
if(isset($_POST['numberPhone']))$soDienThoa=$_POST['numberPhone'];
if(isset($_POST['adress']))$diachi=$_POST['adress'];
if(isset($_POST['payment-method']))$phuongThucThanhToan=$_POST['payment-method'];

$relsultGioHang=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
$maDonHangMoi=insertDonHang($con,$diachi);

while($row=mysqli_fetch_assoc($relsultGioHang)){
   $maThanhToanMoi=insertThanToan($con,$phuongThucThanhToan,$row['gia']);
   $trangSanPham="chờ xác nhận";
   $reslutMaChiTiet=mysqli_query($con,"SELECT MAX(IFNULL(ma_chi_tiet,0)) AS ma_chi_tiet FROM chi_tiet_don_hang");
   $newMaChiTiet=mysqli_fetch_assoc($reslutMaChiTiet);
   $maChiTietMoi=$newMaChiTiet['ma_chi_tiet']+1;
  
   $sql="INSERT INTO chi_tiet_don_hang VALUES(".$maChiTietMoi.",".$maThanhToanMoi.",".$maDonHangMoi.",".$row['ma_san_pham'].",'".$row['ten_san_pham']."',".$row['kich_co'].",'".$row['mau_sac']."',".$row['so_luong'].",".$row['gia'].",'".$trangSanPham."')";
   $kq=mysqli_query($con,$sql);
   insertYeuCauKhachHang($con,$maChiTietMoi,$maDonHangMoi);
}
insertInsertTrangThaiDonHang($con,$maDonHangMoi);
if($kq){
    mysqli_query($con,"DELETE FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
}
header("Location: " . URL . "donhang.php");
exit();
}
?>