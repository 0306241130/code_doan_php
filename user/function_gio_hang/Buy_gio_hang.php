<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function tableBuyGioHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
    echo '<table class="table">
                    <thead>
                      <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                      </tr>
                    </thead>
                    <tbody>';
    while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
                        <td>
                          <img
                            src="../img/'.$row['ten_san_pham'].'.jpg"
                            class="img-cart"
                            style="width: 400px; height: 200px"
                          />
                        </td>
                        <td>
                          <strong>'.$row['ten_san_pham'].'</strong>
                        </td>
                        <td style="position: relative">
                          '.number_format( $row['gia'],0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                </tr>
                      ';
    }
    $result1=mysqli_query($con,"SELECT SUM(gia) AS gia FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row1=mysqli_fetch_assoc($result1);
    echo'<tr>
                        <td colspan="2" class="text-right">Phí vận chuyển</td>
                        <td style="position: relative">
                          10.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
    
        <tr>
                        <td colspan="2" class="text-right">
                          <strong>Tổng thành Tiền</strong>
                        </td>
                        <td style="position: relative">
                          '.number_format( $row1['gia']+10000,0,"",".").'<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      </tbody>
                  </table>';
}


?>