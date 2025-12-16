<!DOCTYPE html>
<?php

require_once(__DIR__. "/../../difen_connect_php/connect.php");
require_once(__DIR__ . "/../function_gio_hang/sua_gio_hang.php");
require_once(__DIR__. "/../function_gio_hang/dem_san_pham.php");
  require_once(__DIR__. "/../function_gio_hang/update_gio_hang.php");

if(!isset($_SESSION['USER'])){
  header("Location: ".URL_LOGIN_USER);
  exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>edit card</title>
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
          <li class="position-relative active">
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
                  <?php sua_gio_hang1(); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          <?php sua_gio_hang(); ?>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
      if ($('.alert').length > 0) {
        $('.container.bootstrap.snippets.bootdey.row-md-12').css('margin-top', '10px');
      }
    });
    </script>
  </body>
</html>
