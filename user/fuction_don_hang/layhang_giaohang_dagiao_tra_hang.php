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
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND ctdh.trang_thai='đã giao' OR ctdh.trang_thai='đang gửi yêu cầu trả hàng'");
     while($row=mysqli_fetch_assoc($result)){
        if($row['trang_thai']=="đang gửi yêu cầu trả hàng") {
            $trangthai="đang gửi yêu cầu trả hàng";
        } else {
            $trangthai="trả hàng";
        }
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
                        <input class="d-none ma" type="number" value="'.$row['ma_don_hang'].'">';
                        if($row['trang_thai']=="đang gửi yêu cầu trả hàng") {
                            $trangthai="đang gửi yêu cầu trả hàng";
                           
                            echo'<button class="btn btn-outline-warning btn-sm px-3">'.$trangthai.'</button>';
                            echo'<a href="../fuction_don_hang/huy_yeu_cau_tra_hang.php?madh='.$row['ma_don_hang'].'&mact='.$row['ma_chi_tiet'].'" class="btn btn-outline-primary btn-sm px-3">hủy yêu cầu</a>';
                            
                        } else {
                            $trangthai="trả hàng";
                            echo'
                         <button id="tra_hang"  value='.$row['ma_chi_tiet'].' class="btn btn-outline-danger btn-sm px-3">'.$trangthai.'</button>';
                        }
                        
                      echo'  </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
    }
}
function TraHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND ctdh.trang_thai='hoàn trả'");
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
?>