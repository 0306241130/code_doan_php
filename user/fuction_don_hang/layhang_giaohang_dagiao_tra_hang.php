<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function choLayHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND trang_thai='chờ lấy hàng'");
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
                        <span class="badge bg-success fs-6 px-3 py-2">1</span>
                        </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
    }
}
function choGiaoHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND trang_thai='chờ giao hàng'");
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
                        <span class="badge bg-success fs-6 px-3 py-2">1</span>
                        </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
    }
}
function GiaoHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND trang_thai='đã giao'");
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
                         <a href="#?mact='.$row['ma_chi_tiet'].'&mdh='.$row['ma_don_hang'].'" class="btn btn-outline-danger btn-sm px-3">trả hàng</a>
                        </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
    }
}
function TraHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND trang_thai='trả hàng'");
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
                        <span class="badge bg-success fs-6 px-3 py-2">1</span>
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