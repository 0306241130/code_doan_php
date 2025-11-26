<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function doanThu(){
    global $con;
    $sql="SELECT 
    YEAR(dh.ngay_dat_hang) AS nam,
    MONTH(dh.ngay_dat_hang) AS thang,
    COUNT(DISTINCT dh.ma_don_hang) AS soLuongDon,
    SUM(ct.gia) AS tongTien,tt.*
FROM don_hang dh
JOIN chi_tiet_don_hang ct 
    ON dh.ma_don_hang = ct.ma_don_hang
    JOIN thanh_toan tt ON ct.ma_thanh_toan=tt.ma_thanh_toan
WHERE 
    dh.ma_trang_thai = 4 OR tt.trang_thai_thanh_toan='đã thanh toán'
    -- AND YEAR(dh.ngay_dat_hang) = YEAR(CURRENT_TIMESTAMP())
GROUP BY 
    YEAR(dh.ngay_dat_hang),
    MONTH(dh.ngay_dat_hang)
ORDER BY 
    thang ASC;";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
                <td>'.$row['thang'].'/'.$row['nam'].'</td>
                <td>'.$row['soLuongDon'].'</td>
                <td>'.number_format($row['tongTien'],0,"",".") .' đ</td>
              </tr>';
    }
}
?>