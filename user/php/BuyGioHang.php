<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
require_once(__DIR__. "/../function_Buy/render_Buy.php");
require_once(__DIR__. "/../function_gio_hang/Buy_gio_hang.php");
require_once(__DIR__. "/../function_gio_hang/dem_san_pham.php");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BuyShopping</title>
       <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/index.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
    />
  </head>
  <body>
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
           <?php  dem(); ?>
          </li>
          <li><a href="donhang.php"><i class="fas fa-box"></i> Đơn hàng</a></li>
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
      class="container bootstrap snippets bootdey row-md-12"
      style="margin-top: 80px"
    >
      <div class="col-md-12 col-sm-8 content">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-info panel-shadow">
              <div class="panel-heading"></div>
              <div class="panel-body">
                <div class="table-responsive">
                <?php tableBuyGioHang(); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-3">
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0"><i class="fa fa-credit-card me-2"></i>Thông tin đặt hàng</h4>
            </div>
            <div class="card-body">
              <form action="../function_gio_hang/dat_hang_gio_hang.php" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label fw-semibold">Tên người nhận</label>
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Nhập tên người nhận..." required>
                </div>
                <div class="mb-3">
                  <label for="numberPhone" class="form-label fw-semibold">Số điện thoại</label>
                  <input type="tel" class="form-control form-control-lg" id="numberPhone" name="numberPhone" placeholder="Nhập số điện thoại..." required minlength="10" pattern="[0-9]{10,}">
                </div>
                <div class="mb-3">
                  <label for="adress" class="form-label fw-semibold">Địa chỉ</label>
                  <input type="text" name="adress" id="adress" class="form-control form-control-lg" placeholder="Nhập địa chỉ giao hàng..." required>
                </div>
                <div class="mb-3">
                  <label for="payment-method" class="form-label fw-semibold">Phương thức thanh toán</label>
                  <select class="form-select form-select-lg" id="payment-method" name="payment-method" required>
                    <option value="tiền mặt">Thanh toán khi nhận hàng</option>
                  </select>
                </div>
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-success btn-lg fw-bold" name="BuyGioHang">
                    <i class="fa fa-shopping-cart me-2"></i>Đặt hàng
                  </button>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  </body>
</html>
