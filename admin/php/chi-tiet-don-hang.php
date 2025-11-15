<!DOCTYPE html>
<?php require_once(__DIR__. "/../fucntion_chitiet/chi_tiet_don_hang.php"); ?>
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
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu sắc</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Phương thức thanh toántoán</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">số tiền cần thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                   <?php chiTiet(); ?>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


