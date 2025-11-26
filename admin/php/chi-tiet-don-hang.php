<!DOCTYPE html>
<?php require_once(__DIR__. "/../fucntion_chitiet/chi_tiet_don_hang.php");
require_once(__DIR__. "/../fucntion_chitiet/xoa-chi-tiet.php");
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
                  <?php if(isset($_REQUEST['makh'])){ ?>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã người dùng</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Phí vận chuyển</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">Địa chỉ giao hàng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                    <?php } ?>
                    <?php if(isset($_REQUEST['madh'])){ ?>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã người dùng</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Phí vận chuyển</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">Địa chỉ giao hàng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    <?php } ?>
                </thead>
                <tbody>
                   <?php
                   if(isset($_REQUEST['makh'])){
                   require_once(__DIR__ . "/../../difen_connect_php/connect.php");
                   $con = connect();
                   $makh = $_REQUEST['makh'];
                   // Truy vấn lấy ra chi tiết đơn hàng của một khách hàng
                   // Viết truy vấn lấy các cột ở trên:
                   $query = "SELECT 
                       ct.ma_chi_tiet,
                       dh.ma_nguoi_dung, 
                       dh.ma_don_hang, 
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
                   WHERE dh.ma_nguoi_dung = ".$makh;
                   $reslut = mysqli_query($con, $query);
                   $i = 0;
                   while($row = mysqli_fetch_assoc($reslut)){
                       echo '<tr>
                               <td>'.(++$i).'</td>
                               <td>'.$row['ma_nguoi_dung'].'</td>
                               <td>'.$row['ngay_dat_hang'].'</td>
                               <td>'.number_format($row['phi_van_chuyen'],0,"",".") .'đ</td>
                               <td>'.$row['so_luong'].'</td>
                               <td>'.$row['tensp'].'</td>
                               <td>'.$row['phuong_thuc_thanh_toan'].'</td>
                               <td>'.$row['kich_co'].'</td>
                               <td>'.$row['mau_sac'].'</td>
                               <td>'.$row['trang_thai_thanh_toan'].'</td>
                               <td>'.$row['dia_chi_giao_hang'].'</td>
                               <td>'.number_format($row['gia'],0,"",".").'đ</td>
                           </tr>';
                   }
                   } else  if(isset($_REQUEST['madh'])){
                    $madh=$_REQUEST['madh'];
                    donhangChiTiet($madh);
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


