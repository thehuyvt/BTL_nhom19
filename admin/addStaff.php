<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/main.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Chothuetro</title>
</head>
<body>
    <div class="main">
       <div class="header ">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="container-fluid">
                <a class="navbar-brand " href="./index.php">
                <img src="../asset/logo/logo2.jpg" alt="" width="62" height="62">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse container " id="navbarSupportedContent">
                
                <ul class="navbar-nav mnavbar m-auto">
                    <li class="nav-item mt-1 mb-1  ms-3">
                        <a aria-current="page" href="./index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="./news-feed.php">Bảng tin</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="./users.php">Quản lí người dùng</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="./staffs.php">Quản lí nhân viên</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="../logout.php">Đăng xuất</a>
                    </li>
                </ul>  
                </div>
                </div>
            </div>
        </nav>
       </div>
        <hr style="width:80%; margin: 16px auto;">
    <!-- Body -->
    <main class="container pt-4 pb-4 ">
        <h2 class="text-center">Thêm Thông Tin Nhân Viên</h2>
        
        <form action="" method="POST" >

            <div class="form-outline">
                <label class="form-label" for="name">Tên của nhân viên:</label>
            <input type="text" id="name" name="name" class="form-control form-control-lg" />
            </div>

            <div class="form-outline">
                <label class="form-label" for="email">Email của nhân viên:</label>
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
            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg" />
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" name="sbmAdd" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Thêm nhân viên</button>
            </div>
        </form>

    </main>
    <?php
    include '../config.php';
    if(isset($_POST['sbmAdd'])){
        $email = $_POST['email'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $level = 2;
        if(empty($name)||empty($email)||empty($pass1)||empty($pass2)||empty($phoneNumber)){
            echo "Đề nghị nhập đầy đủ thông tin vào các ô trống!";
        }else{
            if($pass1 == $pass2){
                $sql = "SELECT * FROM users WHERE user_email = '$email' OR user_phonenumber = '$phoneNumber'";
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result)>0){
                    echo"Email hoặc Số điện thoại trên đã được sử dụng!";
                }else{
                    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
    
                    $sql2 = "INSERT INTO users (user_name, user_pass, user_email, user_phonenumber, user_level) VALUES ('$name', '$pass_hash', '$email', '$phoneNumber', '$level')";
                    
                    $result2 = mysqli_query($conn, $sql2);
                   
                    if($result2 == 1){
                        echo 'Thêm nhân viên thành công';
                        header("Location:./staffs.php");
                    }else{
                        echo'Thêm nhân viên thất bại!';
                    }
                }
            }else{
                 echo "Mật khẩu không khớp!";
            }
        }
    }
    mysqli_close($conn); 
?> 
<?php include './footer.php'?>


    