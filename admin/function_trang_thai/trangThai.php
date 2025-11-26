<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function choXacNhan(){
    global $con;
    $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=1");
    while($row=mysqli_fetch_assoc($reslut)){
       
        echo' <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>';
                
                    echo ' <a href="choxacnhan.php?madhxacnhan='.$row['ma_don_hang'].'" class="btn btn-secondary btn-sm">'.$row['trang_thai'].'</a>';
                
                 
                echo '</td>
              </tr>';
        }
    
}
function choLayHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=2 ");
  while($row=mysqli_fetch_assoc($reslut)){
  
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td><a href="cholayhang.php?madhChoLayHang='.$row['ma_don_hang'].'" class="btn btn-info btn-sm">'.$row['trang_thai'].'</a>
                </td>
                <td><a href="cholayhang.php?madhHuyHang='.$row['ma_don_hang'].'" class="btn btn-danger btn-sm">Hủy đơn hàng</a></td>
                </tr>';
    }
  
}
function choGiaoHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=3");
  while($row=mysqli_fetch_assoc($reslut)){
   
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td><a href="chogiaohang.php?madhChoGiaoHang='.$row['ma_don_hang'].'" class="btn btn-info btn-sm">'.$row['trang_thai'].'</a>
                </td>
                <td><a href="chogiaohang.php?madhHuyHang='.$row['ma_don_hang'].'" class="btn btn-danger btn-sm">Hủy đơn hàng</a></td>
              </tr>';
    }
  
}
function DaGiao(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=4 ");
  while($row=mysqli_fetch_assoc($reslut)){
   
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <a  class="btn btn-success btn-sm">'.$row['trang_thai'].'</a>
                </td>
              </tr>';
    }
  
}
function traHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=5 ");
  while($row=mysqli_fetch_assoc($reslut)){
    
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <button class="btn btn-success btn-sm">'.$row['trang_thai'].'</button>
                </td>
              </tr>';
    }
  
}
function daHuy(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai WHERE dh.ma_trang_thai=6");
  while($row=mysqli_fetch_assoc($reslut)){
   
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <button  class="btn btn-danger btn-sm">'.$row['trang_thai'].'</button>
                </td>
              </tr>';
    }
  
}
function allTrangThai(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang,dh.ma_don_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_trang_thai=dh.ma_trang_thai");
  while($row=mysqli_fetch_assoc($reslut)){
   
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>';
              switch($row['ma_trang_thai']){
                case 1: // Chờ xác nhận
                  echo ' <a href="trang-thai-don-hang.php?madhxacnhan='.$row['ma_don_hang'].'" class="btn btn-secondary btn-sm">'.$row['trang_thai'].'</a>';
                  break;
                case 2: // Chờ lấy hàng
                  echo ' <a href="trang-thai-don-hang.php?madhChoLayHang='.$row['ma_don_hang'].'" class="btn btn-warning btn-sm">'.$row['trang_thai'].'</a>';
                  break;
                case 3: // Chờ giao hàng
                  echo ' <a href="trang-thai-don-hang.php?madhChoGiaoHang='.$row['ma_don_hang'].'" class="btn btn-info btn-sm">'.$row['trang_thai'].'</a>';
                  break;
                case 4: // Đã giao
                  echo ' <button class="btn btn-success btn-sm">'.$row['trang_thai'].'</button>';
                  break;
                case 5: // Trả hàng
                  echo ' <button class="btn btn-primary btn-sm">'.$row['trang_thai'].'</button>';
                  break;
                case 6: // Đã hủy
                  echo ' <button class="btn btn-danger btn-sm">'.$row['trang_thai'].'</button>';
                  break;
              }
               
               echo ' </td>
              </tr>';
    }
}
?>