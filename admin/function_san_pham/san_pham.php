<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function sanpham(){
    global $con;
    $mausac="";
    $size="";
    $result=mysqli_query($con,"SELECT * FROM san_pham JOIN thuong_hieu ON san_pham.ma_thuong_hieu=thuong_hieu.ma_thuong_hieu ORDER BY san_pham.ma_san_pham");
    while($row=mysqli_fetch_assoc($result)){
        $result1=mysqli_query($con,"SELECT mau_sac FROM mau_san_pham WHERE ma_san_pham=".$row['ma_san_pham']."");
        while ($row1=mysqli_fetch_assoc($result1)) {
            $mausac.=$row1['mau_sac']." ";
        }
        $result2=mysqli_query($con,"SELECT size FROM size_san_pham WHERE  ma_san_pham=".$row['ma_san_pham']."");
        while ($row2=mysqli_fetch_assoc($result2)) {
            $size.=$row2['size']." ";
        }
        if($row['trang_thai_san_pham']==1){$trangThai="Còn hàng";}else{ $trangThai="Hết hàng";}
        echo'<tr>
                  <td>'.$row['ma_san_pham'].'</td>
                  <td>'.$row['ten_san_pham'].'</td>
                  <td>'.$row['mo_ta'].'</td>
                  <td>'.$row['ma_thuong_hieu'].'</td>
                  <td>'.$row['ten_thuong_hieu'].'</td>
                  <td>'.number_format($row['gia_ban'],0,"",".").'đ</td>
                  <td>'.$row['giam_gia'].'%</td>
                  <td>'.$trangThai.'</td>
                  <td>'.$mausac.'</td>
                  <td>'.$size.'</td>
                </tr>';
    $mausac="";
    $size="";
    }
}
?>