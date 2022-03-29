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
<section class="vh-100" style="background-color: #f0f2f5;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card p-3" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img
                        src="./asset/img/login-img.jpg"
                        alt="login form"
                        class="img-fluid" style="border-radius: 1rem 0 0 1rem; "
                    />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <h3 class=" mb-3 pb-3 text-success" style="letter-spacing: 1px;  font-weight: 700;">Chothuetro xin chào!</h3>
                        </div>

                        <h3 class=" mb-3 pb-3 text-success" style="letter-spacing: 1px;  font-weight: 600;">Đăng nhập</h3>

                        <form action="" method = "post">
                            <div class="form-outline mb-4">
                                <label class="form-label text-success" for="userEmail">Email</label>
                                <input type="text" id="userEmail" name = "userEmail"class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label text-success" for="pass">Mật khẩu</label>
                                <input type="password" id="pass" name = "pass" class="form-control form-control-lg" />
                            </div>

                            <div class="pt-1 mb-4">
                                <input class="btn btn-success btn-lg btn-block" type="submit" name = 'sbmLogin' value="Sign In"/>
                            </div>
                        </form>
                        <a class="small text-success" href="#!">Quên mật khẩu?</a>
                        <a class="small text-success" href="./index.php">Quay lại trang chủ</a>
                        <p class=" pb-lg-2 text-success" >Bạn chưa có tài khoản? <a href="register.php" class="text-success" >Đăng kí tại đây.</a></p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <?php
        session_start();
        include 'config.php';

        if(isset($_POST['sbmLogin'])){
            $user_email = $_POST['userEmail'];
            $pass = $_POST['pass'];

            $sql1 = "SELECT * FROM users WHERE user_email = '$user_email'";
            $result1 = mysqli_query($conn, $sql1);

            if(mysqli_num_rows($result1)>0){
                $row = mysqli_fetch_assoc($result1);
                $pass_hash = $row['user_pass'];
                $id = $row['user_id'];
                $level = $row['user_level'];

                if(password_verify($pass, $pass_hash)){
                    $_SESSION['loginSuccess'] = $user_email;
                    if($level==1){
                        header("Location:./members/index.php?id=$id");
                    }else if($level==2){
                        header("Location:./staff/index.php");
                    }else{
                        header("Location:./admin/index.php");
                    }
                }else{
                    
                    echo 'Mật khẩu không khớp!';

                }
            }else{
                echo 'Tên đăng nhập không tồn tại!';
            }   
        }
        mysqli_close($conn);
    ?>

    <script src="./asset/js/bootstrap.bundle.min.js"></script>    
</body>
</html>