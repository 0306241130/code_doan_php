<?php session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php"); ?>
<?php
function insertDonHang($con,$diachigiaohang){
    $resultDonHang=mysqli_query($con,"SELECT MAX(IFNULL(ma_don_hang,0)) AS ma_don_hang FROM don_hang");
    $newMaDonHang=mysqli_fetch_assoc($resultDonHang);
    $phiVanChuyen = 10000.0;
    $maDonHangMoi = $newMaDonHang['ma_don_hang']+1;
    mysqli_query($con,"INSERT INTO don_hang VALUES(".$maDonHangMoi.",".$_SESSION['MA_USER'].",CURRENT_TIMESTAMP(),".$phiVanChuyen.",'".$diachigiaohang."',1)");
 

    
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
   $reslutMaChiTiet=mysqli_query($con,"SELECT MAX(IFNULL(ma_chi_tiet,0)) AS ma_chi_tiet FROM chi_tiet_don_hang");
   $newMaChiTiet=mysqli_fetch_assoc($reslutMaChiTiet);
   $maChiTietMoi=$newMaChiTiet['ma_chi_tiet']+1;
  
   $sql="INSERT INTO chi_tiet_don_hang VALUES(".$maChiTietMoi.",".$maThanhToanMoi.",".$maDonHangMoi.",".$row['ma_san_pham'].",'".$row['ten_san_pham']."',".$row['kich_co'].",'".$row['mau_sac']."',".$row['so_luong'].",".$row['gia'].")";
   $kq=mysqli_query($con,$sql);
}
if($kq){
    mysqli_query($con,"DELETE FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
}
header("Location: " . URL . "donhang.php");
exit();
}
?>