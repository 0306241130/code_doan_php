<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    />
  </head>
  <body class="bg-light">
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="min-height: 100vh"
      >
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card-body">
              <h3 class="card-title text-center mb-4">Login</h3>
              <form action="../fucntion_login/loginAdmin.php" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter username"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                  />
                  <?php if(isset($_SESSION['ERROR_ADMIN'])) echo $_SESSION['ERROR_ADMIN']; ?>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="loginAdmin">
                  Login
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  </body>
</html>
