<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function choXacNhan(){
    global $con;
    $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
    while($row=mysqli_fetch_assoc($reslut)){
        echo' <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>';
                if($row['cho_xac_nhan']=='chờ xác nhận'){
                    echo ' <button class="btn btn-warning btn-sm">'.$row['cho_xac_nhan'].'</button>';
                }else{
                  echo ' <button class="btn btn-success btn-sm">'.$row['cho_xac_nhan'].'</button>';
                }
                 
                echo '</td>
              </tr>';
    }
}
function choLayHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
  while($row=mysqli_fetch_assoc($reslut)){
    if(!empty($row['cho_lay_hang'])){
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>';
                if($row['cho_lay_hang']=='đã lấy hàng')echo '<button class="btn btn-success btn-sm">'.$row['cho_lay_hang'].'</button>';
                else echo  '<a href="../function_trang_thai/layhang.php?madh='.$row['ma_don_hang'].'" class="btn btn-danger btn-sm">'.$row['cho_lay_hang'].'</a>';
                
                echo'</td>
                </tr>';
    }
  }
}
function choGiaoHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
  while($row=mysqli_fetch_assoc($reslut)){
    if(!empty($row['cho_giao_hang'])){
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>';
                  if($row['cho_giao_hang']=='chờ giao hàng')echo  '<a href="../function_trang_thai/giaohang.php?madh='.$row['ma_don_hang'].'" class="btn btn-danger btn-sm">'.$row['cho_giao_hang'].'</a>';
                else echo'  <button class="btn btn-success btn-sm">'.$row['cho_giao_hang'].'</button>';
                echo'</td>
              </tr>';
    }
  }
}
function DaGiao(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
  while($row=mysqli_fetch_assoc($reslut)){
    if(!empty($row['da_giao'])){
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <a  class="btn btn-success btn-sm">'.$row['da_giao'].'</a>
                </td>
              </tr>';
    }
  }
}
function traHang(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
  while($row=mysqli_fetch_assoc($reslut)){
    if(!empty($row['tra_hang'])){
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <a class="btn btn-success btn-sm">'.$row['tra_hang'].'</a>
                </td>
              </tr>';
    }
  }
}
function daHuy(){
  global $con;
  $reslut=mysqli_query($con,"SELECT th.*,dh.ngay_dat_hang,dh.dia_chi_giao_hang FROM trang_thai_don_hang th JOIN don_hang dh ON th.ma_don_hang=dh.ma_don_hang ");
  while($row=mysqli_fetch_assoc($reslut)){
    if(!empty($row['da_huy'])){
    echo '  <tr>
                <td>'.$row['ma_don_hang'].'</td>
                <td>'.$row['ngay_dat_hang'].'</td>
                <td>'.$row['dia_chi_giao_hang'].'</td>
                <td>
                  <a href="?madh='.$row['ma_don_hang'].'" class="btn btn-success btn-sm">'.$row['da_huy'].'</a>
                </td>
              </tr>';
    }
  }
}
?>