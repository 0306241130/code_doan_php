<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function yeuCau(){
    global $con;
    $reslut=mysqli_query($con,"SELECT * FROM yeu_cau_khach_hang yc;");


   while($row=mysqli_fetch_assoc($reslut)){
   
    echo'<tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_yeu_cau'].'</td>
                <td>
                   '.$row['yeu_cau'].'
               </td>
               <td>'.$row['ly_do'].'</td>
               <td><a href="../function_yeu_cau/xac_nhan_yeu_cau_tra_hang.php?mayc='.$row['ma_yeu_cau'].'" class="btn btn-danger btn-sm">Xóa</a> <a href="../function_yeu_cau/xac_nhan_yeu_cau_tra_hang.php?madh='.$row['ma_don_hang'].'&mact='.$row['ma_chi_tiet'].'" class="btn btn-success btn-sm">xác nhận</a></td>
              </tr>';
   }
}
?>