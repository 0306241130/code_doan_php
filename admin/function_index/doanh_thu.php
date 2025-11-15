<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function doanThu(){
    global $con;
    $sql="SELECT chi_tiet_don_hang.ma_don_hang,YEAR(don_hang.ngay_dat_hang) AS nam, MONTH(don_hang.ngay_dat_hang) AS thang, COUNT(don_hang.ma_don_hang) AS soLuong, SUM(chi_tiet_don_hang.gia) AS gia FROM don_hang JOIN chi_tiet_don_hang ON don_hang.ma_don_hang = chi_tiet_don_hang.ma_don_hang WHERE chi_tiet_don_hang.trang_thai = 'đã giao' AND YEAR(don_hang.ngay_dat_hang) = YEAR(current_timestamp()) GROUP BY chi_tiet_don_hang.ma_don_hang,don_hang.ngay_dat_hang;";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
                <td>'.$row['thang'].'/'.$row['nam'].'</td>
                <td>'.$row['soLuong'].'</td>
                <td>'.number_format($row['gia'],0,"",".") .' đ</td>
              </tr>';
    }
}
?>