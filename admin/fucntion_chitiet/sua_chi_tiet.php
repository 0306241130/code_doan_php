<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Lấy dữ liệu từ form gửi tới
    require_once(__DIR__. "/../../difen_connect_php/connect.php");
    $con=connect();
    $ngay = isset($_POST['ngay']) ? $_POST['ngay'] : '';
    $phi_van_chuyen = isset($_POST['phi_van_chuyen']) ? $_POST['phi_van_chuyen'] : '';
    $so_luong = isset($_POST['so_luong']) ? $_POST['so_luong'] : '';
    $ten_san_pham = isset($_POST['ten_san_pham']) ? $_POST['ten_san_pham'] : '';
    $trang_thai_thanh_toan = isset($_POST['trang_thai_thanh_toan']) ? $_POST['trang_thai_thanh_toan'] : '';
    $dia_chi_giao_hang = isset($_POST['dia_chi_giao_hang']) ? $_POST['dia_chi_giao_hang'] : '';
    $thanh_tien = isset($_POST['thanh_tien']) ? $_POST['thanh_tien'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    $ma_chi_tiet = isset($_POST['ma_chi_tiet']) ? $_POST['ma_chi_tiet'] : '';
    // Ở đây bạn có thể xử lý dữ liệu hoặc cập nhật vào database tiếp theo
// Lấy mã đơn hàng dựa vào mã chi tiết
$sql_get_ma_don_hang = "SELECT ma_don_hang FROM chi_tiet_don_hang WHERE ma_chi_tiet = '$ma_chi_tiet'";
$result = mysqli_query($con, $sql_get_ma_don_hang);
if ($result && $row = mysqli_fetch_assoc($result)) {
    $ma_don_hang = $row['ma_don_hang'];
    // Cập nhật ngày đặt hàng, phí vận chuyển, địa chỉ giao hàng ở bảng đơn hàng
    $sql_update_don_hang = "UPDATE don_hang SET ngay_dat_hang = '$ngay', phi_van_chuyen = '$phi_van_chuyen', dia_chi_giao_hang = '$dia_chi_giao_hang' WHERE ma_don_hang = '$ma_don_hang'";
    mysqli_query($con, $sql_update_don_hang);

    // Cập nhật các dữ liệu còn lại vào bảng chi_tiet_don_hang
    $sql_update_chi_tiet = "UPDATE chi_tiet_don_hang 
        SET so_luong = '$so_luong', 
            tensp = '$ten_san_pham', 
            kich_co = '$size', 
            gia = '$thanh_tien'
        WHERE ma_chi_tiet = '$ma_chi_tiet'";
    mysqli_query($con, $sql_update_chi_tiet);

    // Nếu cần cập nhật trạng thái thanh toán thì update vào bảng thanh_toan (giả sử chi_tiet_don_hang có cột ma_thanh_toan)
    // Lấy mã thanh toán liên quan
    $sql_get_ma_thanh_toan = "SELECT ma_thanh_toan FROM chi_tiet_don_hang WHERE ma_chi_tiet = '$ma_chi_tiet'";
    $result_tt = mysqli_query($con, $sql_get_ma_thanh_toan);
    if ($result_tt && $row_tt = mysqli_fetch_assoc($result_tt)) {
        $ma_thanh_toan = $row_tt['ma_thanh_toan'];
        $sql_update_trang_thai_tt = "UPDATE thanh_toan SET trang_thai_thanh_toan = '$trang_thai_thanh_toan' WHERE ma_thanh_toan = '$ma_thanh_toan'";
        mysqli_query($con, $sql_update_trang_thai_tt);
    }
    header("Location: "."http://localhost/code_doan_PHP/admin/php/chi-tiet-don-hang.php?madh=".$ma_don_hang."");
    exit();
}
}

?>