<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function yeuCau(){
    global $con;
    $reslut=mysqli_query($con,"SELECT yc.ma_don_hang,
       yc.ngay_yeu_cau,
       yc.yeu_cau
FROM yeu_cau_khach_hang yc
JOIN don_hang dh ON yc.ma_don_hang = dh.ma_don_hang
GROUP BY yc.ma_don_hang, yc.ngay_yeu_cau, yc.yeu_cau;");
   while($row=mysqli_fetch_assoc($reslut)){
    echo'<tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_yeu_cau'].'</td>
                <td>
                  <a href="../function_yeu_cau/xac_nhan.php?madh='.$row['ma_don_hang'].'" class="btn btn-primary btn-sm">'.$row['yeu_cau'].'</a>
                </td>
              </tr>';
   }
}
?>