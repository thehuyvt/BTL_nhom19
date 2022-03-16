<?php
    if(isset($_GET['post-id']) ){
        $post_id = $_GET['post-id'] ; 
        $sql = "SELECT * FROM posts WHERE post_id = '$post_id'";
        include '../config.php';
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $title = $row['post_title'];
                $img = $row['post_img'];
                $area = $row['post_area'];
                $price = $row['post_price'];
                $address = $row['post_address'];
                $content = $row['post_content'];
                $date = $row['post_date'];
                $user_id = $row['user_id'];
            }
        $sql2 = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result2)>0){
            $row2 = mysqli_fetch_assoc($result2);{
                $user_name = $row2['user_name'];
                $user_email = $row2['user_email'];
                $user_phone = $row2['user_phonenumber'];
            }
        }
    }
    else{
        echo "Lỗi, không thể truy cập!";
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
                <a class="navbar-brand " href="#">
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
                    <h2>Thông tin nhà trọ</h2>
                </div>
                <div class="row container me-auto ms-auto" style="border: 8px solid #fff;">
                        <div class="motel-box">
                    <?php
                        echo'<img src="../asset/upload/'.$img.'" alt="" class="motel-img">';
                        echo'<div class="motel-infor ">';
                        echo '<h4 class="motel-infor-title">'.$title.'</h4>';
                        echo '<p class="motel-infor-area">Diện tích: '.$area.' m2</p>';
                        echo '<p class="motel-infor-price">Giá thuê: '.$price.'đ</p>';
                        echo '<p class="motel-infor-address">Địa chỉ: '.$address.'</p>';
                        echo '<p class="motel-infor-address">Liên hệ: '.$user_name.'</p>';
                        echo '<p class="motel-infor-address">email: '.$user_email.'</p>';
                        echo '<p class="motel-infor-address">Số điện thoại: '.$user_phone.'</p>';
                        ?>
                            <a href="#"class="motel-infor-detail btn btn-outline-success">Liên hệ ngay</a>
                        </div>
                    </div>
                </div>
           </div>
       </div>
<?php 
    mysqli_close($conn);
    include 'footer.php';
?>