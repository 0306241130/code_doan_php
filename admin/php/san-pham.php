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
                </tr>
              </thead>
              <tbody id="tbody">
                  <?php sanpham(); ?>
              </tbody>
              <tbody id="tbody-serach">
               
              </tbody>
            </table>
          </div>
        <div class="card mt-5 mb-4">
          <div class="card-header">
            <h5>Thêm sản phẩm mới</h5>
          </div>
          <div class="card-body">
            <form action="../function_san_pham/them_san_pham.php" method="post">
              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" required>
                </div>
              </div>
              
              <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <input class="form-control" id="mo_ta" name="mo_ta"  required></input>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="ma_thuong_hieu" class="form-label">Mã thương hiệu</label>
                  <input type="number" max="2" min="1" class="form-control" id="ma_thuong_hieu" name="ma_thuong_hieu" required>
                </div>
                <div class="col-md-4">
                  <label for="gia_ban" class="form-label">Giá bán</label>
                  <input type="number" class="form-control" id="gia_ban" name="gia_ban" min="0" required>
                </div>
                <div class="col-md-4">
                  <label for="giam_gia" class="form-label">Giảm giá (%)</label>
                  <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" value="0" required>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="mau_san_pham" class="form-label">Màu sản phẩm (cách nhau bởi dấu phẩy)</label>
                  <input type="text" class="form-control" id="mau_san_pham" name="mau_san_pham" placeholder="Ví dụ: đỏ,xanh,đen" required>
                </div>
                <div class="col-md-6">
                  <label for="size" class="form-label">Size (cách nhau bởi dấu phẩy)</label>
                  <input type="text" class="form-control" id="size" name="size" placeholder="Ví dụ: 38,39,40,41" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="hinh_anh" class="form-label">Hình ảnh sản phẩm (tên file phải giống tên sản phẩm và đuôi là jpg)</label>
                <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept=".jpg"" required>
              </div>
              <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header">
            <h5>Xóa sản phẩm</h5>
          </div>
          <div class="card-body">
            <form action="../function_san_pham/xoa_san_pham.php" method="post">
              <div class="mb-3">
                <label for="ma_san_pham_xoa" class="form-label">Nhập mã sản phẩm cần xóa</label>
                <input type="number" class="form-control" id="ma_san_pham_xoa" name="ma_san_pham" required min="1" placeholder="Nhập mã sản phẩm">
              </div>
              <button type="submit" class="btn btn-danger">Xóa sản phẩm</button>
            </form>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header">
            <h5>Cập nhật sản phẩm</h5>
          </div>
          <div class="card-body">
            <form action="../function_san_pham/cap_nhat_san_pham.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="ma_san_pham_cap_nhat" class="form-label">Mã sản phẩm cần cập nhật</label>
                <input type="number" class="form-control" id="ma_san_pham_cap_nhat" name="ma_san_pham" required min="1" placeholder="Nhập mã sản phẩm">
              </div>
              <div class="mb-3">
                <label for="ten_san_pham_cap_nhat" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten_san_pham_cap_nhat" name="ten_san_pham" required>
              </div>
              <div class="mb-3">
                <label for="mo_ta_cap_nhat" class="form-label">Mô tả sản phẩm</label>
                <input class="form-control" id="mo_ta_cap_nhat" name="mo_ta" required></input>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="ma_thuong_hieu_cap_nhat" class="form-label">Mã thương hiệu</label>
                  <input type="number" max="2" min="1" class="form-control" id="ma_thuong_hieu_cap_nhat" name="ma_thuong_hieu" required>
                </div>
                <div class="col-md-4">
                  <label for="gia_ban_cap_nhat" class="form-label">Giá bán</label>
                  <input type="number" class="form-control" id="gia_ban_cap_nhat" name="gia_ban" min="0" required>
                </div>
                <div class="col-md-4">
                  <label for="giam_gia_cap_nhat" class="form-label">Giảm giá (%)</label>
                  <input type="number" class="form-control" id="giam_gia_cap_nhat" name="giam_gia" min="0" max="100" value="0" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="mau_san_pham_cap_nhat" class="form-label">Màu sản phẩm (cách nhau bởi dấu phẩy)</label>
                  <input type="text" class="form-control" id="mau_san_pham_cap_nhat" name="mau_san_pham" placeholder="Ví dụ: đỏ,xanh,đen" required>
                </div>
                <div class="col-md-6">
                  <label for="size_cap_nhat" class="form-label">Size (cách nhau bởi dấu phẩy)</label>
                  <input type="text" class="form-control" id="size_cap_nhat" name="size" placeholder="Ví dụ: 39,40,41,42" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="hinh_anh_cap_nhat" class="form-label">Hình ảnh sản phẩm (tên file phải giống tên sản phẩm và đuôi là jpg, để trống nếu không muốn thay đổi)</label>
                <input type="file" class="form-control" id="hinh_anh_cap_nhat" name="hinh_anh" accept=".jpg">
              </div>
              <button type="submit" class="btn btn-warning">Cập nhật sản phẩm</button>
            </form>
          </div>
        </div>
        </div>
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
