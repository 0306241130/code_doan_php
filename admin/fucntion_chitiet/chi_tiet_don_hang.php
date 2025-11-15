<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function chiTiet(){
    global $con;
    $reslut=mysqli_query($con,"SELECT ma_don_hang,tensp,kich_co,so_luong,mau_sac,trang_thai,tt.phuong_thuc_thanh_toan,tt.trang_thai_thanh_toan,tt.so_tien_can_thanh_toan FROM chi_tiet_don_hang ct JOIN thanh_toan tt on ct.ma_thanh_toan=tt.ma_thanh_toan;  ");
    while($row=mysqli_fetch_assoc($reslut)){
        echo'<tr>       
                        <td>'.$row['ma_don_hang'].'</td>
                        <td>'.$row['tensp'].'</td>
                        <td>'.$row['kich_co'].'</td>
                        <td>'.$row['mau_sac'].'</td>
                        <td>'.$row['so_luong'].'</td>
                        <td>'.$row['trang_thai'].'</td>
                        <td>'.$row['phuong_thuc_thanh_toan'].'</td>
                        <td>'.$row['trang_thai_thanh_toan'].'</td>
                        <td>'.number_format( $row['so_tien_can_thanh_toan'],0,"",".").'đ</td>
                    </tr>';
    }
}
?>