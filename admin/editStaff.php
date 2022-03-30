<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        include '../config.php';
        $sql1 = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1)==1){
            $row1 = mysqli_fetch_assoc($result1);
            $name = $row1['user_name'];
            $email = $row1['user_email'];
            $pass = $row1['user_pass'];
            $phoneNumber = $row1['user_phonenumber'];
        }
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
        <h2 class="text-center">Sửa Thông Tin Nhân Viên</h2>
        
        <form action="" method="POST" >

            <div class="form-outline">
                <label class="form-label" for="name">Tên của nhân viên:</label>
            <input type="text" id="name" name="name" class="form-control form-control-lg" value = "<?php echo $name ?>" />
            </div>

            <div class="form-outline">
                <label class="form-label" for="email">Email của nhân viên:</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg" value = "<?php echo $email ?>"/>
            </div>

            <div class="form-outline">
                <label class="form-label" for="password1">Mật khẩu:</label>
            <input type="password" id="password1" name="password1" class="form-control form-control-lg" value = "<?php echo $pass ?>"/>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="phonenumber">Số điện thoại:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg" value = "<?php echo $phoneNumber ?>" />
            </div>
            <div class="d-flex justify-content-center">
            <button type="submit" name="sbmEdit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Lưu lại</button>
            </div>
        </form>

    </main>
    <?php

    if(isset($_POST['sbmEdit'])){
        $n_email = $_POST['email'];
        $n_pass = $_POST['password1'];
        $n_name = $_POST['name'];
        $n_phoneNumber = $_POST['phoneNumber'];

        if(empty($n_name)||empty($n_email)||empty($n_pass)||empty($n_phoneNumber)){
            echo "Đề nghị nhập đầy đủ thông tin vào các ô trống!";
        }else{
            // $sql = "SELECT * FROM users WHERE user_email = '$n_email' OR user_phonenumber = '$n_phoneNumber'";
            // $result = mysqli_query($conn, $sql);

            // if(mysqli_num_rows($result)>0){
            //     echo"Email hoặc Số điện thoại trên đã được sử dụng!";
            // }else{
                $pass_hash = password_hash($n_pass, PASSWORD_DEFAULT);

                $sql2 = "UPDATE users SET user_name = '$n_name', user_email = '$n_email', user_pass = '$n_pass', user_phonenumber = '$n_phoneNumber' WHERE user_id = '$user_id'";
                
                $result2 = mysqli_query($conn, $sql2);
                
                if($result2 == 1){
                    echo 'Sửa thông tin nhân viên thành công!';
                    header("Location:./staffs.php");
                }else{
                    echo'Sửa thông tin nhân viên thất bại!';
                }
            }
        }
    
    mysqli_close($conn); 
?> 
<?php include './footer.php'?>


    