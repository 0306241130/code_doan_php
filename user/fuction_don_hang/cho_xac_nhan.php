<?php
    require_once(__DIR__. "/../../difen_connect_php/connect.php");
    $con=connect();
    function choXacNhan(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM chi_tiet_don_hang ctdh JOIN don_hang dh ON ctdh.ma_don_hang=dh.ma_don_hang WHERE dh.ma_nguoi_dung=".$_SESSION['MA_USER']." AND ctdh.trang_thai='chờ xác nhận'");
        if(mysqli_num_rows($result)){
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
                        <a href="../fuction_don_hang/huy_don_hang.php?mact='.$row['ma_chi_tiet'].'&mdh='.$row['ma_don_hang'].'" class="btn btn-outline-danger btn-sm px-3">Hủy</a>
                        </div>
                    </td>
                    <td class="text-center position-relative fw-bold fs-5">
                    '.number_format( $row['gia'],0,"",".").'<small class="text-muted ms-1" style="font-size:80%;">đ</small>
                    </td>
                    </tr>';
            }
        }
    }
?>