<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../function_Nike_Adidas/render_card.php");
require_once(__DIR__. "/../function_gio_hang/dem_san_pham.php");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adidas</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/index.css" />
    <style>
      .container {
        margin-top: 100px;
      }
      @media (max-width: 500px) {
        .container {
          margin-top: 300px;
        }
      }
    </style>
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
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['loc'])){
      if(isset($_POST['price']))$price=$_POST['price'];
      if(isset($_POST['product']))$procduct=$_POST['product'];
    }
    ?>
    <div class="container d-flex flex-column gap-3">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col-md-6 d-flex gap-2">
          <select
            name="price"
            class="form-select"
            aria-label="Default select example"
          >
          <?php
            if(isset($price)&&$price=="DESC"){
              echo' <option value="DESC">Giá giảm dần</option>
                    <option value="ASC">Giá tăng dần</option>';
            }else{
              echo '<option value="ASC">Giá tăng dần</option>
                    <option value="DESC">Giá giảm dần</option>';
            }
          ?>
          </select>
          <select
            name="product"
            class="form-select"
            aria-label="Default select example"
          >
          <?php if(isset($procduct)&&$procduct=="hot"){
              echo '<option value="hot">Sản phẩm hot</option>
                    <option value="new">Sản phẩm mới</option>';
          } else{
            echo '<option value="new">Sản phẩm mới</option>
                  <option value="hot">Sản phẩm hot</option>';
          }
          ?>
            
          </select>
          <button type="submit" name="loc" class="btn btn-success">Lọc</button>
        </div>
      </form>
      <div class="card-produc d-flex flex-wrap gap-3 justify-content-evenly">
          <?php 
          if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['loc'])){
            render_Card_Loc_Adidas($price,$procduct);
          }else{
            render_Card_Adidas();
          } 
          ?>
      </div>
    </div>
    
    <footer class="footer mt-3">
      <div class="footer-content">
        <div class="footer-brand">
          <h3>NTN SHOES</h3>
          <p>Luôn mang đến cho bạn những sản phẩm giày uy tín, chất lượng.</p>
        </div>
        <div class="footer-links">
          <h4>Liên kết</h4>
          <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h4>Liên hệ</h4>
          <p>Địa chỉ: 123 Đường Giày, TP. HCM</p>
          <p>Điện thoại: 0123 456 789</p>
          <p>Email: info@ntnshoes.vn</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 NTN SHOES. All rights reserved.</p>
      </div>
    </footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</html>
