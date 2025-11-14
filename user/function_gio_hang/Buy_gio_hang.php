<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function tableBuyGioHang(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
    echo '
    <table class="table table-hover align-middle table-bordered shadow-sm mt-3">
        <thead class="table-primary">
            <tr>
                <th class="text-center" style="width:170px;">Sản phẩm</th>
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center" style="width:160px;">Giá tiền</th>
            </tr>
        </thead>
        <tbody>
    ';
    while($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td class="text-center">
                    <img
                        src="../img/'.$row['ten_san_pham'].'.jpg"
                        class="img-fluid rounded shadow-sm"
                        style="max-width: 140px; height: 80px; object-fit:cover;"
                        alt="'.$row['ten_san_pham'].'"
                    />
                </td>
                <td>
                    <div class="fw-semibold mb-1">'.$row['ten_san_pham'].'</div>
                    <div class="text-muted small">Size: '.(isset($row['kich_co']) ? $row['kich_co'] : '').'</div>
                    <div class="text-muted small">Màu: '.(isset($row['mau_sac']) ? $row['mau_sac'] : '').'</div>
                    <div class="text-muted small">Số lượng: '.(isset($row['so_luong']) ? $row['so_luong'] : '').'</div>
                </td>
                <td class="text-center position-relative fw-bold fs-5">
                    '.number_format($row['gia'], 0, "", ".").'
                    <small class="text-muted ms-1" style="font-size:80%;">đ</small>
                </td>
            </tr>
        ';
    }
    $result1 = mysqli_query($con,"SELECT SUM(gia) AS gia FROM gio_hang WHERE ma_nguoi_dung=".$_SESSION['MA_USER']."");
    $row1 = mysqli_fetch_assoc($result1);
    echo '
            <tr>
                <td colspan="2" class="text-end text-muted fw-semibold">Phí vận chuyển</td>
                <td class="text-center fw-bold">
                    10.000
                    <small class="text-muted ms-1" style="font-size:80%;">đ</small>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-end">
                    <strong class="fs-5 text-dark">Tổng thành tiền</strong>
                </td>
                <td class="text-center fs-5 fw-bold text-danger">
                    '.number_format($row1['gia'] + 10000, 0, "", ".").'
                    <small class="text-muted ms-1" style="font-size:80%;">đ</small>
                </td>
            </tr>
        </tbody>
    </table>
    ';
}


?>