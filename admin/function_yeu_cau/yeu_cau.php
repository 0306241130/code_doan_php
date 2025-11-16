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
                <td>';
                if($row['yeu_cau']=='yêu cầu trả hàng'){
                 $reslut1= mysqli_query($con,"SELECT * FROM yeu_cau_khach_hang yc JOIN hoan_tra ht ON yc.ma_chi_tiet=ht.ma_chi_tiet WHERE yeu_cau='yêu cầu trả hàng'");
                 $row1=mysqli_fetch_assoc($reslut1);
                  echo ' <a href="../function_yeu_cau/xac_nhan_yeu_cau_tra_hang.php?madh='.$row['ma_don_hang'].'" class="btn btn-success btn-sm">'.$row['yeu_cau'].'</a><br><span>'.$row1['ly_do'].'</span>';
                }else{
                  echo ' <a href="../function_yeu_cau/xac_nhan.php?madh='.$row['ma_don_hang'].'" class="btn btn-primary btn-sm">'.$row['yeu_cau'].'</a>';
                }
                echo'</td>
              </tr>';
   }
}
?>