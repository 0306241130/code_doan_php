<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if(!isset($_SESSION['USER'])){
  header("Location: ".URL_LOGIN_USER);
  exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img
                            src="../img/adidas3.jpg"
                            class="img-cart"
                            style="width: 400px; height: 200px"
                          />
                        </td>
                        <td>
                          <strong>Nike Dunk Low Next Nature</strong>
                        </td>
                        <td style="position: relative">
                          350.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">Thành Tiền</td>
                        <td style="position: relative">
                          900.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">Phí vận chuyển</td>
                        <td style="position: relative">
                          20.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4" class="text-right">
                          <strong>Tổng thành Tiền</strong>
                        </td>
                        <td style="position: relative">
                          110.000<small style="position: absolute; top: 0"
                            >đ</small
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Tên người nhận</label
                >
                <input
                  type="text"
                  class="form-control"
                  aria-describedby="emailHelp"
                  name="username"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Số điện thoại</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="numberPhone"
                  required
                  minlength="10"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Địa chỉ</label
                >
                <input type="text" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Size</label
                >
                <div class="d-flex gap-2">
                  <input
                    type="radio"
                    class="btn-check"
                    name="Size"
                    id="size-39"
                    autocomplete="off"
                    value="39"
                    required
                  />
                  <label class="btn btn-outline-success" for="size-39"
                    >size 39</label
                  >
                  <input
                    type="radio"
                    class="btn-check"
                    name="Size"
                    id="size-40"
                    autocomplete="off"
                    value="40"
                    required
                  />
                  <label class="btn btn-outline-success" for="size-40"
                    >size 40</label
                  >
                  <input
                    type="radio"
                    class="btn-check"
                    name="Size"
                    id="size-41"
                    autocomplete="off"
                    value="41"
                    required
                  />
                  <label class="btn btn-outline-success" for="size-41"
                    >size 41</label
                  >
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Color</label
                >
                <div class="d-flex gap-2">
                  <input
                    type="radio"
                    class="btn-check"
                    name="Color"
                    id="color-red"
                    autocomplete="off"
                    value="Red"
                    required
                  />
                  <label class="btn btn-outline-danger" for="color-red"
                    >Red</label
                  >
                  <input
                    type="radio"
                    class="btn-check"
                    name="Color"
                    id="color-green"
                    autocomplete="off"
                    value="Green"
                    required
                  />
                  <label class="btn btn-outline-success" for="color-green"
                    >Green</label
                  >
                  <input
                    type="radio"
                    class="btn-check"
                    name="Color"
                    id="color-yellow"
                    autocomplete="off"
                    value="Yellow"
                    required
                  />
                  <label class="btn btn-outline-warning" for="color-yellow"
                    >Yellow</label
                  >
                 
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Số lượng</label
                >
                <input
                  type="number"
                  class="form-control"
                  name="quantity"
                  required
                  min="1"
                  value="1"
                />
              </div>
              <div class="mb-3">
               <label for="payment-method" class="form-label"
                  >Phương thức thanh toán</label
                >
                <select class="form-select" id="payment-method" name="payment-method" required>
                  <option value="tiền mặt">Thanh toán khi nhận hàng</option>
                  <option value="chuyển khoản">Thanh toán online</option>
                </select>
              </div>
              <button
                type="submit"
                class="btn btn-success pull-right fw-bold mt-2"
              >
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
