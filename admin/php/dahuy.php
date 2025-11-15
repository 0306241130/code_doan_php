<!DOCTYPE html>
<?php require_once(__DIR__. "/../function_trang_thai/trangThai.php"); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trạng thái đơn hàng - Admin Dashboard</title>
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
          <h1>Trạng thái đơn hàng</h1>
          <label for="trangThaiDonHang" class="form-label">Chọn trạng thái đơn hàng:</label>
          <select class="form-select" id="trangThaiDonHang" name="trang_thai" onchange="location = this.value;">
          <option value="dahuy.php">Đã hủy</option>
                <option value="trang-thai-don-hang.php">Chờ xác nhận</option>
                <option value="cholayhang.php">Chờ lấy hàng</option>
                <option value="chogiaohang.php">Chờ giao hàng</option>
                <option value="dagiao.php">Đã giao</option>
                <option value="trahang.php">Trả hàng</option>
              
              </select>
        </div>
      <div class="container-fluid mt-4">
        <h2>Danh sách đơn hàng</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
            <thead>
              <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Địa chỉ giao hàng</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
             <?php
        
                daHuy();
             
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
