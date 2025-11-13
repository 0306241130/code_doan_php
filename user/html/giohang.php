<!DOCTYPE html>
<?php
require_once(__DIR__. "/../function_gio_hang/render_gio_hang.php");
if(!isset($_SESSION['USER'])){
  header("Location: ".URL_LOGIN_USER);
  exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>shopping cart</title>
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
    <div class="container bootstrap snippets bootdey row-md-12">
      <div class="col-md-12 col-sm-8 content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-info panel-shadow">
              <div class="panel-heading">
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
                      <li class="active">
                        <a href="giohang.php" class="active">Giỏ hàng</a>
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
              </div>
              <div class="panel-body" style="margin-top: 100px">
                <?php  render_Gio_Hang() ?>;
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  </body>
</html>
