<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include '../config.php';
    $email = $_SESSION['loginSuccess'];
    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
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
       <!-- body -->
       <div class="body">
           <div class="container">
               <div class=" motel  row mt-5 mb-5 me-auto ms-auto">
                   <div class="col-md-12 text-center mb-4">
                       <h2>Danh sách nhân viên</h2>
                    </div>
                    <a href="addStaff.php"class="btn btn-success m-3"><i class="fas fa-user-plus"></i> Thêm Nhân Viên</a>
            <table class="table mb-5">

            <thead>
                <tr>
                <th scope="col">Mã nhân viên</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số di động</th>
                <th scope="col">Xóa </th>
                <th scope="col">Sửa </th>

                </tr>
            </thead>
            <tbody>
                <!-- thay đổi theo csdl -->
                <?php 
                //1. Kết nối CSDL
                    include '../config.php';
                    
                //2. Thực hiện truy vấn
                    $sql = "SELECT * FROM users WHERE user_level = 2";
                    $result = mysqli_query($conn, $sql);//lưu kết quả trả về vào result
                //3. Phân tích và xử lý dữ liệu
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                                echo '<th scope="row">'.$row['user_id'].'</th>';
                                echo '<td>'.$row['user_name'].'</td>';
                                echo '<td>'.$row['user_email'].'</td>';
                                echo '<td>'.$row['user_phonenumber'].'</td>';
                                echo '<td><a href="deleteStaff.php?id='.$row['user_id'].'" class="text-success p-1"><i class="fas fa-user-times"></i></i></a></td>';
                                echo '<td><a href="editStaff.php?id='.$row['user_id'].'" class="text-success"><i class="fas fa-user-edit"></i></i></a></td>';
                            echo '</tr>';
                        }
                    }
                //4. Đóng kết nối
                    mysqli_close($conn);
                ?>
            </table>
 <?php include 'footer.php'?>