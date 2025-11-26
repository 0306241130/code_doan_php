<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
session_start();
$con=connect();
function chiTiet(){
    global $con;
    $reslut=mysqli_query($con,"SELECT dh.ma_nguoi_dung, dh.ma_don_hang,tensp,kich_co,so_luong,mau_sac,trang_thai,tt.phuong_thuc_thanh_toan,tt.trang_thai_thanh_toan,tt.so_tien_can_thanh_toan FROM chi_tiet_don_hang ct JOIN thanh_toan tt on ct.ma_thanh_toan=tt.ma_thanh_toan JOIN don_hang dh ON dh.ma_don_hang=ct.ma_don_hang  ;  ");
    while($row=mysqli_fetch_assoc($reslut)){
        echo'<tr>       
                        <td>'.$row['ma_nguoi_dung'].'</td>
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
function donhangChiTiet($madh){
    global $con;
    $reslut=mysqli_query($con,"SELECT * FROM don_hang dh JOIN chi_tiet_don_hang ct ON dh.ma_don_hang=ct.ma_don_hang JOIN thanh_toan tt on ct.ma_thanh_toan=tt.ma_thanh_toan WHERE ct.ma_don_hang=".$madh." ");
    
    $i=0;
    while($row=mysqli_fetch_assoc($reslut)){
        echo '<tr>
                <td>'.++$i.'</td>
                <td>'.$row['ma_nguoi_dung'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.number_format($row['phi_van_chuyen'],0,"",".") .'đ</td>
                 <td>'.$row['so_luong'].'</td>
                <td>'.$row['tensp'].'</td>
                <td>'.$row['phuong_thuc_thanh_toan'].'</td>
                <td>'.$row['kich_co'].'</td>
                  <td>'.$row['mau_sac'].'</td>
                  <td>'.$row['trang_thai_thanh_toan'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>'.number_format( $row['gia'],0,"",".").'</td>
                  <td class="d-flex"><a href="suadonhang.php?mact='.$row['ma_chi_tiet'].'" class="btn btn-primary btn-sm">Sửa</a>
                <a href="chi-tiet-don-hang.php?machitiet='.$row['ma_chi_tiet'].'" class="btn btn-danger btn-sm ms-2">xóa</a></td>
              </tr>';
    }
}
?>