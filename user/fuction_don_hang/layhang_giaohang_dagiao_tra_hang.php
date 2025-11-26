<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function choLayHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND dh.ma_trang_thai=2");
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
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND dh.ma_trang_thai=3");
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
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND dh.ma_trang_thai=4 ");
     while($row=mysqli_fetch_assoc($result)){
        $result1=mysqli_query($con,"SELECT * FROM yeu_cau_khach_hang WHERE ma_chi_tiet=".$row['ma_chi_tiet']."");
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
                     
                           if(mysqli_num_rows($result1)>0){
                               echo '<button class="btn btn-warning btn-sm px-3">Đang gửi yêu cầu trả hàng</button> 
                                     <a href="../fuction_don_hang/huy_yeu_cau_tra_hang.php?mact='.$row['ma_chi_tiet'].'&madh='.$row['ma_don_hang'].'" class="btn btn-secondary btn-sm px-3" >Hủy yêu cầu</a>';
                           }
                           else echo'<button value='.$row['ma_chi_tiet'].' id="tra_hang" class="btn btn-outline-primary btn-sm px-3">trả hàng</button>';
                            
                    
                        
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
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']." AND dh.ma_trang_thai=5");
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