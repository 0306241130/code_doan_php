<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../function_gio_hang/dem_san_pham.php");
require_once(__DIR__ . "/../fuction_don_hang/cho_xac_nhan.php");
require_once(__DIR__ . "/../fuction_don_hang/huy_don_hang.php");
require_once(__DIR__ . "/../fuction_don_hang/layhang_giaohang_dagiao_tra_hang.php");
if(!isset($_SESSION['USER'])){
  header("Location: ".URL_LOGIN_USER);
  exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đơn hàng</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/index.css" />
  </head>
  <body class="bg-light">
    <header>
      <div class="tile-header">
        <i class="fas fa-shoe-prints" style="font-size: 1.5rem; color: #fff;"></i>
        <h1>NTN SHOES</h1>
      </div>
      <nav class="navbar">
        <ul class="list-header">
          <li><a href="index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
          <li class="position-relative">
            <a href="giohang.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
           <?php if(isset($_SESSION['USER'])) dem(); ?>
          </li>
          <li class="active"><a href="donhang.php"><i class="fas fa-box"></i> Đơn hàng</a></li>
          <?php if(isset($_SESSION['USER'])){
              echo '<li><a href="../function_login/logout.php" id="user"><i class="fas fa-user-circle"></i> '.$_SESSION['USER'].'<i class="fa fa-sign-out-alt"></i></a></li>';
            }else{
           echo '<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>';
          } 
          ?>
        </ul>
      </nav>
    </header>
    <div
      class="container d-flex flex-column gap-2 h-100"
      style="margin-top: 100px"
    >
      <div class="col-sm-7">
        <ul class="nav justify-content-space-between py-2 gap-2">
          <li class="nav-item">
            <button class="text-dark fw-bold btn btn-info" value="cho-xac-nhan">
              Chờ xác nhận
            </button>
          </li>
          <li class="nav-item">
            <button
              class="text-dark fw-bold btn btn-secondary"
              value="cho-lay-hang"
            >
              Chờ lấy hàng
            </button>
          </li>
          <li class="nav-item">
            <button
              class="text-dark fw-bold btn btn-secondary"
              value="cho-giao-hang"
            >
              Chờ giao hàng
            </button>
          </li>
          <li class="nav-item">
            <button class="text-dark fw-bold btn btn-secondary" value="da-giao">
              Đã giao
            </button>
          </li>
          <li class="nav-item">
            <button
              class="text-dark fw-bold btn btn-secondary"
              value="tra-hang"
            >
              Trả hàng
            </button>
          </li>
          <li class="nav-item">
            <button class="text-dark fw-bold btn btn-secondary" value="da-huy">
              Đã Hủy
            </button>
          </li>
        </ul>
      </div>

      <div class="cho-xac-nhan">
        <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php choXacNhan(); ?>
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
      <div class="cho-lay-hang">
           <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php choLayHang(); ?>
              </tbody>
            </table>
          </div>
        </div> 
      </div>
      <div class="cho-giao-hang">
          <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php choGiaoHang(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="da-giao">
       <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php GiaoHang(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tra-hang">
       <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php TraHang(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="da-huy">
      <div class="panel-body p-4 bg-white rounded shadow">
          <div class="table-responsive">
            <table class="table align-middle table-hover table-bordered mb-0">
              <thead class="table-primary">
                <tr>
                  <th class="text-center" style="width:170px;">Sản phẩm</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center" style="width:120px;">Số lượng</th>
                  <th class="text-center" style="width:160px;">Giá tiền</th>
                </tr>
              </thead>
              <tbody>
                  <?php hangHuy(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</html>
