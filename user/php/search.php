<!DOCTYPE html>
<?php
session_start();
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
        <form class="d-flex w-100 mt-3" method="get" action="search.php" style="z-index:2; min-width:300px;">
          <input 
            type="text" 
            id="searchInput" 
            name="query"
            class="form-control form-control-sm w-50"
            placeholder="Tìm kiếm sản phẩm..." 
            style="min-width:300px;"
          />
          <button type="submit" class="btn btn-primary btn-sm ms-2">Tìm kiếm</button>
        </form>
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
 
    <div class="container main mt-4 d-flex flex-wrap gap-3 justify-content-start align-items-stretch">
          <?php
          if($_SERVER['REQUEST_METHOD']=="GET" ){
            if(isset($_GET['query']))$char=$_GET['query'];
            echo $char;
            $con=connect();
            
            $result=mysqli_query($con,"SELECT *,gia_ban*(1-IFNULL(giam_gia,0)/100) AS gia_sau_khi_giam FROM san_pham WHERE ten_san_pham LIKE'%".$char."%'");
            while($row=mysqli_fetch_assoc($result)){
                echo'<div class="card" style="width: 18rem">
                <img src="../img/'.$row['ten_san_pham'].'.jpg" class="card-img-top" alt="'.$row['ten_san_pham'].'" />
                <div class="card-body">
                  <p class="card-text fw-bold">'.$row['ten_san_pham'].'</p>
                  <span class="fw-bold">'.number_format( $row['gia_sau_khi_giam'],0,"",".").'₫</span><br />
                  <strong class="price-old"
                    ><s>'.number_format( $row['gia_ban'],0,"").'₫</s> <span>-'.$row['giam_gia'].'%</span></strong
                  >
                  <div class="d-flex gap-2 coulmn-6 mx-auto">
                    <a href="buy.php?masp='.$row['ma_san_pham'].'" class="btn btn-outline-success pull-right">
                      Buy
                    </a>
                    <a
                      data-masp="'.$row['ma_san_pham'].'"
                      class="btn btn-danger pull-right fw-bold ms-1 add-to-card"
                    >
                      <i class="fa fa-shopping-cart"></i>
                    </a>
                  </div>
                </div>
              </div>';
            }
          }
          ?>
      
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
