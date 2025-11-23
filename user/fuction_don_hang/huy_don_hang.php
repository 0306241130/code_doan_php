<?php
 require_once(__DIR__. "/../../difen_connect_php/connect.php");
 $con=connect();
 function countChoXacNhan($con,$maDonHang,$maChiTiet){
        $result=mysqli_query($con,"SELECT COUNT(*) AS soLuong FROM chi_tiet_don_hang ct WHERE ma_don_hang=".$maDonHang."");
        $result1=mysqli_query($con,"SELECT COUNT(*) AS soLuongHuy FROM  huy_hang hh JOIN  chi_tiet_don_hang ct ON ct.ma_chi_tiet=hh.ma_chi_tiet WHERE ct.ma_don_hang=".$maDonHang." ");
        $row=mysqli_fetch_assoc($result);
        $row1=mysqli_fetch_assoc($result1);
        if((int)$row['soLuong'] === (int)$row1['soLuongHuy'])return TRUE;
        else return FALSE;
 }
 if(isset($_REQUEST['mact'])&&isset($_REQUEST['mdh'])){
    $maChiTiet=$_REQUEST['mact'];
    $maDonHang=$_REQUEST['mdh'];
    mysqli_query($con,"INSERT INTO huy_hang VALUES(NULL,".$maChiTiet.")");
    if(countChoXacNhan($con,$maDonHang,$maChiTiet)===TRUE){
       mysqli_query($con,"UPDATE don_hang SET ma_trang_thai=6 WHERE ma_don_hang=".$maDonHang."");
    }
    header("Location: ". URL ."donhang.php");
    exit();
 }
 function hangHuy(){
    global $con;
     $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang JOIN huy_hang hh ON hh.ma_chi_tiet=ctdh.ma_chi_tiet WHERE dh.ma_nguoi_dung=".$_SESSION['MA_USER']." ");
     while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
                    <td class="text-center">
                        <img
                        src="../img/'.$row['tensp'].'.jpg"
                        class="img-fluid rounded shadow-sm"
                        style="max-width: 140px; height: 80px; object-fit:cover;"
                        alt="'.$row['tensp'].'"
                        />
                    </td>
                    <td>
                        <div class="fw-semibold mb-1">'.$row['tensp'].'</div>
                        <div class="text-muted small">Size: '.$row['kich_co'].'</div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex flex-column align-items-center gap-2">
                        <span class="badge bg-success fs-6 px-3 py-2">'.$row['so_luong'].'</span>
                        <a href="../fuction_don_hang/mua_lai.php?mact='.$row['ma_chi_tiet'].'&mdh='.$row['ma_don_hang'].'" class="btn btn-outline-danger btn-sm px-3">Mua lại</a>
                        </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
     }
 }
?>