<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <title>Chothuetro</title>
</head>
<body>
<section class="vh-100 bg-image" style="background-image: url(./asset/img/img-register.webp);">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Đăng kí</h2>

              <form action="process-register.php" method="POST" >

                    <div class="form-outline">
                        <label class="form-label" for="name">Tên của bạn:</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="email">Email của bạn:</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="password1">Mật khẩu:</label>
                    <input type="password" id="password1" name="password1" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="password2">Nhập lại mật khẩu:</label>
                    <input type="password" id="password2" name="password2" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline mb-2">
                        <label class="form-label" for="phonenumber">Số điện thoại:</label>
                    <input type="text" id="phoneNumber" name="phonenumber" class="form-control form-control-lg" />
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" name="sbmRegister" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng kí</button>
                    </div>

                    <p class="text-center text-muted mt-3 mb-0">Bạn đã có tài khoản? <a href="./login.php" class="fw-bold text-body"><u>Đăng nhập tại đây</u></a></p>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="./asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>
