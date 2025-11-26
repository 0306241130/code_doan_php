<?php require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if($con){
    if(isset($_REQUEST['mact'])){
        $mact=$_REQUEST['mact'];
    $sql = "SELECT 
                dh.ngay_dat_hang, 
                dh.phi_van_chuyen, 
                ct.so_luong, 
                ct.tensp, 
                tt.phuong_thuc_thanh_toan, 
                ct.kich_co, 
                ct.mau_sac, 
                tt.trang_thai_thanh_toan, 
                dh.dia_chi_giao_hang, 
                ct.gia
            FROM chi_tiet_don_hang ct
            JOIN thanh_toan tt ON ct.ma_thanh_toan = tt.ma_thanh_toan
            JOIN don_hang dh ON dh.ma_don_hang = ct.ma_don_hang
            WHERE ct.ma_chi_tiet = $mact";
    $result = mysqli_query($con, $sql);
    if($result && $row = mysqli_fetch_assoc($result)){
        $ngay_dat_hang = $row['ngay_dat_hang'];
        $phi_van_chuyen = $row['phi_van_chuyen'];
        $so_luong = $row['so_luong'];
        $tensp = $row['tensp'];
        $phuong_thuc_thanh_toan = $row['phuong_thuc_thanh_toan'];
        $kich_co = $row['kich_co'];
        $mau_sac = $row['mau_sac'];
        $trang_thai_thanh_toan = $row['trang_thai_thanh_toan'];
        $dia_chi_giao_hang = $row['dia_chi_giao_hang'];
        $gia = $row['gia'];
    }
    }

}else{
    echo "Lỗi kết nối: " . mysqli_connect_error();
}
?>