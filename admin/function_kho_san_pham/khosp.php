<?php
require_once(__DIR__. "/../../difen_connect_php/connect.php");
$con=connect();
function khosp(){
    global $con;
    $result=mysqli_query($con,"SELECT * FROM san_pham sp JOIN so_luong_ton slt ON sp.ma_san_pham=slt.ma_san_pham");
    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>
                  <td>'.$row['ten_san_pham'].'</td>
                  <td>'.$row['mau_sac'].'</td>
                  <td>'.$row['size'].'</td>
                  <td>'.$row['soluong'].'</td>
                <td>
                    <a href="capnhat_kho.php?tensp='.$row['ten_san_pham'].'&masp='.$row['ma_san_pham'].'&mauSac='.$row['mau_sac'].'&size='.$row['size'].'&soluong='.$row['soluong'].'" class="btn btn-primary btn-sm">
                        Cập nhật
                    </a>
                </td>
                </tr>
            ';
    }
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&!isset($_POST['updateKho'])){
    $tensp=$_POST['tensp'];
    $result1=mysqli_query($con,"SELECT * FROM san_pham sp JOIN so_luong_ton slt ON sp.ma_san_pham=slt.ma_san_pham WHERE sp.ten_san_pham LIKE '%".$tensp."%'");
    while($row1=mysqli_fetch_assoc($result1)){
        echo '<tr>
                  <td>'.$row1['ten_san_pham'].'</td>
                  <td>'.$row1['mau_sac'].'</td>
                  <td>'.$row1['size'].'</td>
                  <td>'.$row1['soluong'].'</td>
                <td>
                    <a href="capnhat_kho.php?tensp='.$row1['ten_san_pham'].'&masp='.$row1['ma_san_pham'].'&mauSac='.$row1['mau_sac'].'&size='.$row1['size'].'&soluong='.$row1['soluong'].'" class="btn btn-primary btn-sm">
                        Cập nhật
                    </a>
                </td>
                </tr>
            ';
    }
}
?>
<?php
// Lấy dữ liệu từ link và gán vào biến với REQUEST
if (isset($_REQUEST['masp']) && isset($_REQUEST['mauSac']) && isset($_REQUEST['size']) && isset($_REQUEST['soluong'])&& isset($_REQUEST['tensp'])) {
    $masp = $_REQUEST['masp'];
    $mauSac = $_REQUEST['mauSac'];
    $size = $_REQUEST['size'];
    $soLuong = $_REQUEST['soluong'];
    $tensp=$_REQUEST['tensp'];
    // Bạn có thể sử dụng các biến này tùy ý ở đây
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['updateKho'])){
$masp = $_POST['ma_san_pham'];
$tensp = $_POST['ten_san_pham'];
$mauSac = $_POST['mau_san_pham'];
$size = $_POST['size'];
$soLuong = $_POST['so_luong'];

$sql = "UPDATE so_luong_ton 
        SET soluong = '$soLuong'
        WHERE ma_san_pham = '$masp' 
        AND mau_sac = '$mauSac' 
        AND size = '$size'";

mysqli_query($con,$sql);
}
?>