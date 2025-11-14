<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
require_once(__DIR__. "/../function_Buy/render_Buy.php");
require_once(__DIR__. "/../function_gio_hang/Buy_gio_hang.php");
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
  </head>
  <body>
    <link
      rel="stylesheet"
      type="text/css"
      href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
    />
    <header>
      <div class="tile-header">
        <h1>NTN SHOE</h1>
      </div>
      <nav
        class="navbar"
        style="background-color: #e3f2fd"
        data-bs-theme="light"
      >
        <ul class="list-header">
          <li><a href="index.php">Trang chủ</a></li>
          <li>
            <a href="giohang.php">Giỏ hàng</a>
          </li>
          <li><a href="donhang.php">Đơn hàng</a></li>
          <?php if(isset($_SESSION['USER'])){
              echo '<li><a href="../function_login/logout.php">'.$_SESSION['USER'].'<i class="fa fa-sign-out-alt"></i> </a></li>';
            }else{
           echo '<li><a href="login.php"> Login<i class="fa fa-sign-in-alt"></i></a></li>';
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
          <div class="col-md-4">
          <form action="../function_gio_hang/dat_hang_gio_hang.php" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên người nhận</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="username" required="">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="numberPhone" required="" minlength="10">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                <input type="text" name="adress" class="form-control" required="">
              </div>
              <div class="mb-3">
               <label for="payment-method" class="form-label">Phương thức thanh toán</label>
                <select class="form-select" id="payment-method" name="payment-method" required="">
                  <option value="tiền mặt">Thanh toán khi nhận hàng</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success pull-right fw-bold mt-2 d-bolck" name="BuyGioHang">
                Đặt hàng
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  </body>
</html>
