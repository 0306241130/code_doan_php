

<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['Buy'])){
    if(isset($_POST['username']))$ten_Nguoi_Nhan=$_POST['username'];
    if(isset($_POST['numberPhone']))$number_Phone=$_POST['numberPhone'];
    if(isset($_POST['adress']))$dia_Chi=$_POST['adress'];
    if(isset($_POST['Size']))$size=$_POST['Size'];
    if(isset($_POST['Color']))$color=$_POST['Color'];
    if(isset($_POST['payment-method']))$thanh_Toan=$_POST['payment-method'];
    if(isset($_POST['Buy']))$masp=$_POST['Buy'];
    $reslut=mysqli_query($con,"SELECT MAX(IFNULL(ma_thanh_toan,0)) AS ma_thanh_toan FROM thanh_toan");
    $row=mysqli_fetch_assoc($reslut);
    $ma_thanh_toan=$row['ma_thanh_toan']+1;

    $reslut1=mysqli_query($con,"SELECT MAX(IFNULL(ma_don_hang,0)) AS ma_don_hang FROM don_hang");
    $row1=mysqli_fetch_assoc($reslut1);
    $ma_don_hang=$row1['ma_don_hang']+1;

    $so_Luong=1;
    $phi_van_chuyen = 10000.0;
    $sql = "INSERT INTO don_hang(ma_don_hang,ma_nguoi_dung, phi_van_chuyen, dia_chi_giao_hang,ma_trang_thai) ";
    $sql .= "VALUES (" .$ma_don_hang. "," . $_SESSION['MA_USER'] . ",".$phi_van_chuyen.",  '" . $dia_Chi . "',1)";
    mysqli_query($con,$sql); 

    $query_giam_gia = "SELECT gia_ban*(1-IFNULL(giam_gia,0)/100) AS giam_gia FROM san_pham WHERE ma_san_pham = '".$masp."'";
    $result_giam_gia = mysqli_query($con, $query_giam_gia);
    $row_giam_gia = mysqli_fetch_assoc($result_giam_gia);
    $gia_san_pham=$row_giam_gia['giam_gia'];

    $sql="INSERT INTO thanh_toan(ma_thanh_toan,phuong_thuc_thanh_toan,trang_thai_thanh_toan,so_tien_can_thanh_toan) ";
    $sql.= "VALUES(" .$ma_thanh_toan. ",'".$thanh_Toan."','chưa thanh toán',".$gia_san_pham.")";
    mysqli_query($con,$sql);

   

    // Truy vấn lấy tên và giá sản phẩm dựa trên mã sản phẩm
    $query_ten_san_pham = "SELECT ten_san_pham,gia_ban*(1-IFNULL(giam_gia,0)/100) AS giam_gia FROM san_pham WHERE ma_san_pham = '".$masp."'";
    $result_ten_san_pham = mysqli_query($con, $query_ten_san_pham);
    $row_ten_san_pham = mysqli_fetch_assoc($result_ten_san_pham);
    $ten_san_pham = $row_ten_san_pham['ten_san_pham'];
    $gia_san_pham=$row_ten_san_pham['giam_gia'];

    $result2=mysqli_query($con,"SELECT MAX(IFNULL(ma_chi_tiet,0)) AS ma_chi_tiet FROM chi_tiet_don_hang");
    $row2=mysqli_fetch_assoc($result2);
    $chi_tiet_don_hang=$row2['ma_chi_tiet']+1;

    $sql="INSERT INTO chi_tiet_don_hang(ma_chi_tiet,ma_thanh_toan, ma_don_hang, ma_san_pham, tensp, kich_co, mau_sac, so_luong, gia) VALUES(".$chi_tiet_don_hang.",".$ma_thanh_toan.",".$ma_don_hang.",".$masp.",'".$ten_san_pham."',".$size.",'".$color."',".$so_Luong.",'".$gia_san_pham."')";
    mysqli_query($con,$sql);

   
   


    header("Location: " . URL . "donhang.php");
    exit();
}
?>