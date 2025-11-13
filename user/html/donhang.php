<!DOCTYPE html>
<?php
session_start();
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
        <h1>NTN SHOE</h1>
      </div>
      <nav
        class="navbar"
        style="background-color: #e3f2fd"
        data-bs-theme="light"
      >
        <ul class="list-header">
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="giohang.php">Giỏ hàng</a></li>
          <li class="active"><a href="donhang.php">Đơn hàng</a></li>
          <?php if(isset($_SESSION['USER'])){
              echo '<li ><a href="../function_login/logout.php" id="user">'.$_SESSION['USER'].'<i class="fa fa-sign-out-alt"></i> </a></li>';
            }else{
           echo '<li><a href="login.php"> Login<i class="fa fa-sign-in-alt"></i></a></li>';
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
        <!-- <div class="panel-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
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
                    <p>Size : 26</p>
                  </td>
                  <td>
                    <article>
                      <p>1</p>
                      <a href="#" class="btn btn-primary">Hủy </a>
                    </article>
                  </td>
                  <td style="position: relative">
                    350.000<small style="position: absolute; top: 0">đ</small>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
      <div class="cho-lay-hang">
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
      <div class="cho-giao-hang">
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
      <div class="da-giao">
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
      <div class="tra-hang">
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
      <div class="da-huy">
        <h1 class="text-danger">Chưa có đơn hàng</h1>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</html>
