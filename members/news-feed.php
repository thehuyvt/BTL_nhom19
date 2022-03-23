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
                        <a aria-current="page" href="./posts.php">Đăng tin</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="./list-news.php">Sửa tin</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="../logout.php">Đăng xuất</a>
                    </li>
                </ul>  
                </div>
            </div>
        </nav>
            <div class="header-search">
                <form class="d-flex container w-75">
                    <input class="form-control w-60 ms-3 me-2" type="search" placeholder="Tìm nhà trọ ..." aria-label="Search">
                    <button class="btn btn-outline-success text-light" type="submit">Tìm kiếm</button>
                </form>
            </div>
       </div>

       <!-- body -->
       <div class="body">
           <div class="container">
           <div class=" motel  row mt-5 mb-5 me-auto ms-auto">
                <div class="col-md-12 text-center mb-4">
                    <h2>Nhà trọ nổi bật</h2>
                </div>
                
                <?php
                    $sql2 = "SELECT p.post_id, p.post_title, p.post_img, p.post_area, p.post_price, p.post_address fROM users u, posts p WHERE u.user_id = p.user_id";
                    $result2 = mysqli_query($conn, $sql2);

                    if(mysqli_num_rows($result2)>0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $post_id= $row2['post_id'];
                            $title = $row2['post_title'];
                            $img = $row2['post_img'];
                            $area = $row2['post_area'];
                            $price = $row2['post_price'];
                            $address = $row2['post_address'];
                        echo'<div class="col-lg-6" style="border: 8px solid #fff;">';
                        echo'<div class="motel-box">';
                        echo'<img src="../asset/upload/'.$img.'" alt="" class="motel-img">';
                        echo'<div class="motel-infor">';
                            echo'<h4 class="motel-infor-title">'.$title.'</h4>';
                            echo'<p class="motel-infor-area">Diện tích: '.$area.' m2</p>';
                            echo'<p class="motel-infor-price">Giá thuê: '.$price.'đ</p>';
                            echo'<p class="motel-infor-address">Địa chỉ: '.$address.'</p>';
                            echo'<a href="./motel-detail.php?post-id='.$post_id.'"class="motel-infor-detail btn btn-outline-success">Chi tiết</a>';
                        echo'</div>';
                    echo'</div>';
                echo'</div>';
                }
            }

                ?>
           </div>
       </div>
    <?php include 'footer.php'?>