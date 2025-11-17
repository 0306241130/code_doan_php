<!DOCTYPE html>
<?php session_start(); 
require_once(__DIR__. "/../../difen_connect_php/connect.php");
if (isset($_SESSION['USER'])) {
  header("Location: " . URL);
  exit();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/login.css" />
  </head>
  <body>
    <div class="section">
      <div class="container">
        <div class="row full-height justify-content-center">
          <div class="col-12 text-center align-self-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3">
                <span>Log In </span><span>Sign Up</span>
              </h6>
              <input
                class="checkbox"
                type="checkbox"
                id="reg-log"
                name="reg-log"
              />
              <label for="reg-log"></label>
              <div class="card-3d-wrap mx-auto">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <form action="../../user/function_login/login_user.php" method="post">
                        <div class="section text-center">
                          <h4 class="mb-4 pb-3">Log In</h4>
                          <div class="form-group">
                            <input
                              type="email"
                              name="loginemail"
                              class="form-style"
                              placeholder="Your Email"
                              id="loginemail"
                              autocomplete="off"
                              required
                            />
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              type="password"
                              name="loginpass"
                              class="form-style"
                              placeholder="Your Password"
                              id="loginpass"
                              autocomplete="off"
                              required
                            />
                            <i class="input-icon uil uil-lock-alt"></i>
                            <?php if(isset($_SESSION['error_Login'])) echo  $_SESSION['error_Login'] ?>
                          </div>

                          <input
                            type="submit"
                            name="login"
                            value="Log In"
                            class="btn mt-4"
                          />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-back">
                    <div class="center-wrap">
                      <form
                        action="../../user/function_login/regist_user.php"
                        method="post"
                      >
                        <div class="section text-center">
                          <h4 class="mb-4 pb-3">Sign Up</h4>
                          <div class="form-group">
                            <input
                              type="text"
                              name="logname"
                              class="form-style"
                              placeholder="Your Full Name"
                              id="logname"
                              autocomplete="off"
                              required
                            />
                            <i class="input-icon uil uil-user"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              type="email"
                              name="logemail"
                              class="form-style"
                              placeholder="Your Email"
                              id="logemail"
                              autocomplete="off"
                              required
                            />
                            <i class="input-icon uil uil-at"></i>
                          </div>
                          <div class="form-group mt-2">
                            <input
                              type="password"
                              name="logpass"
                              class="form-style"
                              placeholder="Your Password"
                              id="logpass"
                              autocomplete="off"
                              required
                            />
                            <i class="input-icon uil uil-lock-alt"></i>
                          </div>
                          <input
                            type="submit"
                            name="register"
                            value="Sign Up"
                            class="btn mt-4"
                            id="register"
                          />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Nếu file js không nhận, hãy kiểm tra lại đường dẫn hoặc thứ tự load, thử dùng đường dẫn tuyệt đối để kiểm tra thử -->
    <!-- <script src="../js/index.js"></script> -->
     <script>
  $(document).ready(() => {
      $("#logemail").on("keyup", function () {
        $(".alert").remove();
        let emai = $(this).val();
        let input = $(this);
        $.ajax({
          url: " ../function_login/kiem_tra_regist.php",
          type: "POST",
          data: { email: emai },
          success: function (response) {
            input.after(response);
          },
          error: function (xhr, status, error) {
            console.log("Lỗi AJAX!", error);
          },
        });
       
      });

      $("#register").on("click", function(e){
        if($(".alert").length > 0) {
          e.preventDefault();
        }
      });

    });
   

     </script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
