<!DOCTYPE html>
<?php require_once(__DIR__ . "/../function_san_pham/san_pham.php"); ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sản phẩm - Admin Dashboard</title>
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
            <a href="khosanpham.php">
              <i class="zmdi zmdi-store"></i>Kho sản phẩm
            </a>
          </li>
          <li>
            <a href="khach-hang.php">
              <i class="zmdi zmdi-accounts"></i> Khách hàng
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="zmdi zmdi-sign-in"></i> Đăng xuất
            </a>
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
          <h1>Sản phẩm</h1>
          <p>Quản lý danh sách sản phẩm.</p>
            <input id="search" class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Tìm kiếm" name="search">
          <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
              <thead class="table-light">
                <tr>
                  <th scope="col">Mã sản phẩm</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Mô tả</th>
                  <th scope="col">Mã thương hiệu</th>
                  <th scope="col">Tên thương hiệu</th>
                  <th scope="col">Giá bán</th>
                  <th scope="col">Giảm giá</th>
                  <th scope="col">Trạng thái sản phẩm</th>
                  <th scope="col">Màu sản phẩm</th>
                  <th scope="col">Size</th>
                  <th scope="col">Thao tác</th>
                  
                </tr>
              </thead>
              <tbody id="tbody">
                  <?php sanpham(); ?>
              </tbody>
              <tbody id="tbody-serach">
               
              </tbody>
            </table>
          </div>

        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(() => {
  $(document).on("keyup ", "#search", function () {
    let tensp = $(this).val().trim();
    if (!tensp) {
      $("#tbody").show();
      $("#tbody-serach").hide();
      $("#tbody-serach tr").remove();
    } else {
      $("#tbody").hide();
      $("#tbody-serach").show();
      $.ajax({
        url: "../function_san_pham/timKiemsp.php",
        type: "POST",
        data: { tensp: tensp },
        success: function (response) {
          $("#tbody-serach tr").remove();
          $("#tbody-serach").append(response);
        },
        error: function (xhr, status, error) {
          alert("Lỗi AJAX: " + error);
        },
      });
    }
  });
});
  </script>
  </body>
</html>
