<?php 
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function TongTien($madonHang){
    global $con;
    $result=mysqli_query($con,"SELECT SUM(tt.so_tien_can_thanh_toan) AS tong 
FROM don_hang dh
JOIN chi_tiet_don_hang ct ON dh.ma_don_hang = ct.ma_don_hang
JOIN thanh_toan tt ON ct.ma_thanh_toan = tt.ma_thanh_toan
WHERE dh.ma_don_hang = ".$madonHang."
  AND ct.trang_thai NOT IN ('đã hủy', 'hoàn trả')");
    $row=mysqli_fetch_assoc($result);
    return $row['tong'];
}

function donhang(){
    global $con;
    $reslut=mysqli_query($con,"SELECT * FROM don_hang");
    $i=0;
    while($row=mysqli_fetch_assoc($reslut)){
        echo '<tr>
                <td>'.++$i.'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.number_format($row['phi_van_chuyen'],0,"",".") .'đ</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>'.number_format( TongTien($row['ma_don_hang']),0,"",".").'</td>
                <td><a href="don-hang.php?madh='.$row['ma_don_hang'].'" class="btn btn-primary btn-sm">Xem chi tiết</a></td>
              </tr>';
    }
}
function donhangChiTiet($madh){
    global $con;
    $reslut=mysqli_query($con,"SELECT * FROM don_hang dh JOIN chi_tiet_don_hang ct ON dh.ma_don_hang=ct.ma_don_hang WHERE ct.ma_don_hang=".$madh."");
    
    $i=0;
    while($row=mysqli_fetch_assoc($reslut)){
        echo '<tr>
                <td>'.++$i.'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.number_format($row['phi_van_chuyen'],0,"",".") .'đ</td>
                <td>'.$row['tensp'].'</td>
                 <td>'.$row['so_luong'].'</td>
                  <td>'.$row['mau_sac'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>'.number_format( $row['gia'],0,"",".").'</td>
                <td>'.$row['trang_thai'].'</td>
              </tr>';
    }
}
?>