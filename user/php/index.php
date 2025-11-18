<!DOCTYPE html>
<?php
session_start();
require_once(__DIR__. "/../function_index/render_car.php");
require_once(__DIR__. "/../function_gio_hang/dem_san_pham.php");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
    <header>
      <div class="tile-header">
        <i class="fas fa-shoe-prints" style="font-size: 1.5rem; color: #fff;"></i>
        <h1>NTN SHOES</h1>
      </div>
      <div class="d-flex flex-column align-items-center" style="position: relative; margin: 0 auto;">
        <input 
          type="text" 
          id="searchInput" 
          class="form-control form-control-sm w-50 mt-3"
          placeholder="Tìm kiếm sản phẩm..." 
          style="z-index:2; min-width:300px;"
        />
        <ul id="searchResults" class="list-group position-absolute w-100"
            style="left:50%;transform:translateX(-50%);z-index:3;max-height:180px;overflow-y:auto;min-width:150px;top:55px;">
        
          
        </ul>
      </div>
      <nav class="navbar">
        <ul class="list-header">
          <li class="active"><a href="index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
          <li class="position-relative">
            <a href="giohang.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
           <?php if(isset($_SESSION['USER'])) dem(); ?>
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
    <div class="baner-main">
      <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/banner_Nike.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img
              src="../img/baner_adidas.jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="main">
      <br />

      <section class="shose-new">
        <div class="tile-shose-new">
          <h2>Sản Phẩm Mới</h2>
        </div>
        <div class="card-shoe-new">
          <?php render_card_new() ?>
        </div>
      </section>
      <section class="shoe-hot">
        <div class="tile-shose-hot">
          <h2>Sản Phẩm Hot</h2>
        </div>
        <div class="card-shoe-hot">
        <?php render_card_hot() ?>
        </div>
      </section>
      <section class="nike-or-adidas">
        <div class="tile-nike-or-adidas">
          <h2>Danh mục sản phẩm</h2>
        </div>
        <div class="main-car-nike-or-adidas">
          <a href="Nike.php">
            <div class="card">
              <h5 class="card-title fs-3">Nike</h5>
              <img
                src="../img/banner_Nike.jpg"
                class="card-img-bottom"
                alt="..."
              />
            </div>
          </a>
          <a href="adidas.php">
            <div class="card">
              <h5 class="card-title fs-3">Adidas</h5>
              <img
                src="../img/baner_adidas.jpg"
                class="card-img-bottom"
                alt="..."
              />
            </div>
          </a>
        </div>
      </section>
    </div>
       <footer class="footer">
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
  <script>$(document).ready(() => {
  $("#searchResults").hide();
  $("#searchInput").on("keyup", function () {
    $("#searchResults li").remove();
    let value = $("#searchInput").val();
    if (!value) {
      $("#searchResults").hide();
    } else {
      tensp = $(this).val();
      $.ajax({
        url: "../function_index/search.php",
        type: "POST",
        data: { tensp: tensp },
        success: function (response) {
          $("#searchResults").append(response);
          $("#searchResults").show();
        },
        error: function (xhr, status, error) {
          $("#searchResults").hide();
          alert("Đã xảy ra lỗi tìm kiếm!");
        },
      });
    }
  });
});</script>
</html>
