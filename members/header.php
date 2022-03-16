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
                <!-- Thành Phố -->
                <div class="adress   row mt-5 mb-5 me-auto ms-auto text-center">
                <div class="col-md-12  mb-4">
                    <h2>Thành Phố</h2>
                </div>
                <div class="col-lg-4 card-adress">
                    <a href="#">
                        <img src="../asset/img/hanoi-img.png" alt="Hà Nội" srcset="" class="img-adress"> 
                        <h4 class="text-adress">Hà Nội</h4>
                    </a>
                </div>
                <div class="col-lg-4 card-adress">
                    <a href="#">
                        <img src="../asset/img/hochiminh.png" alt="Hồ Chí Minh" srcset="" class="img-adress"> 
                        <h4 class="text-adress">Hồ Chí Minh</h4>
                    </a>
                </div>
                <div class="col-lg-4 card-adress">
                    <a href="#">
                        <img src="../asset/img/danang.png" alt="Đà Nẵng" srcset="" class="img-adress"> 
                        <h4 class="text-adress">Đà Nẵng</h4>
                    </a>
                </div>
            </div>
            <hr>
            <!-- Nhà trọ nổi bật-->
            <div class=" motel  row mt-5 mb-5 me-auto ms-auto">
                <div class="col-md-12 text-center mb-4">
                    <h2>Nhà trọ nổi bật</h2>
                </div>