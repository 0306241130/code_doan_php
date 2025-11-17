<!DOCTYPE html>
<?php require_once(__DIR__. "/../fucntion_chitiet/chi_tiet_don_hang.php"); 
if (!isset($_SESSION['ADMIN']) || empty($_SESSION['ADMIN'])) {
    header("Location: " . URL_LOGIN_ADMIN);
    exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết đơn hàng - Admin Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <!-- Material Design Iconic Font CDN for sidebar icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css"
    />
    <link rel="stylesheet" href="../css/index.css" />
  </head>
  <body>
    <div id="viewport">
      <!-- Sidebar -->
      <div id="sidebar">
        <header>
          <a href="#">NTN SHOES ADMIN</a>
        </header>
        <ul class="nav">
          <li>
            <a href="index.php">
              <i class="zmdi zmdi-view-dashboard"></i> Thống kê doanh thu
            </a>
          </li>
          <li>
            <a href="don-hang.php">
              <i class="zmdi zmdi-shopping-cart"></i> Đơn hàng
            </a>
          </li>
          <li>
            <a href="chi-tiet-don-hang.php">
              <i class="zmdi zmdi-store"></i> Chi tiết đơn hàng
            </a>
          </li>
          <li>
            <a href="yeu-cau.php">
              <i class="zmdi zmdi-store"></i> Yêu cầu
            </a>
          </li>
          <li>
            <a href="trang-thai-don-hang.php">
              <i class="zmdi zmdi-assignment-check"></i> Trạng thái đơn hàng
            </a>
          </li>
        
          <li>
            <a href="san-pham.php">
              <i class="zmdi zmdi-store"></i> Sản phẩm
            </a>
          </li>
          <li>
            <a href="khach-hang.php">
              <i class="zmdi zmdi-accounts"></i> Khách hàng
            </a>
          </li>
          <li>
            <a href="../function_login/logout.php"> <i class="zmdi zmdi-sign-in"></i> Đăng xuất </a>
          </li>
        </ul>
      </div>
      <!-- Content -->
      <div id="content">
        <nav
          class="navbar navbar-expand-lg navbar-light"
          style="background-color: #e3f2fd"
        >
          <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
          </div>
        </nav>
        <div class="container-fluid mt-4">
        <h2 class="mb-4">Danh sách chi tiết đơn hàng</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Mã khách hàng</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">số tiền cần thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   if(isset($_REQUEST['makh'])){
                   require_once(__DIR__ . "/../../difen_connect_php/connect.php");
                   $con = connect();
                   $makh = $_REQUEST['makh'];
                   // Truy vấn lấy ra chi tiết đơn hàng của một khách hàng
                   $reslut=mysqli_query($con,"SELECT dh.ma_nguoi_dung, dh.ma_don_hang,tensp,kich_co,so_luong,mau_sac,trang_thai,tt.phuong_thuc_thanh_toan,tt.trang_thai_thanh_toan,tt.so_tien_can_thanh_toan FROM chi_tiet_don_hang ct JOIN thanh_toan tt on ct.ma_thanh_toan=tt.ma_thanh_toan JOIN don_hang dh ON dh.ma_don_hang=ct.ma_don_hang WHERE dh.ma_nguoi_dung=".$makh."  ;  ");
                   while($row=mysqli_fetch_assoc($reslut)){
                       echo'<tr>       
                                       <td>'.$row['ma_nguoi_dung'].'</td>
                                       <td>'.$row['ma_don_hang'].'</td>
                                       <td>'.$row['tensp'].'</td>
                                       <td>'.$row['kich_co'].'</td>
                                       <td>'.$row['mau_sac'].'</td>
                                       <td>'.$row['so_luong'].'</td>
                                       <td>'.$row['trang_thai'].'</td>
                                       <td>'.$row['phuong_thuc_thanh_toan'].'</td>
                                       <td>'.$row['trang_thai_thanh_toan'].'</td>
                                       <td>'.number_format( $row['so_tien_can_thanh_toan'],0,"",".").'đ</td>
                                   </tr>';
                   }
                   } else {
                       chiTiet();
                   }

                   
                   ?>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


