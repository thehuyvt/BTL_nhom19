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
                $user_id = $row['user_id'];
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
    <div class="main ">
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
                        <a aria-current="page" href="./list-news.php">Sửa tin</a>
                    </li>
                    <li class="nav-item  mt-1 mb-1  ms-3">
                        <a aria-current="page" href="../logout.php">Đăng xuất</a>
                    </li>
                </ul>  
                </div>
            </div>
        </nav>
    <div class="my-container bg-success">
    <div class="container rounded bg-white w-50 ms-auto me-auto" style="border: 2px solid #ccc; box-shadow:0 0 10px rgba(0, 0, 0, 0.3);">
    <div class="row ">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="col-md-12 mb-3">
                    <h4 class="text-center">Sửa bài</h4>
                </div>

                    <form action="" method="post" enctype="multipart/form-data">
                    <img src="../asset/upload/<?php echo $img?>" alt="" class="form-control">
                    <label class="labels mb-2">Hình ảnh:</label><br>
                    <input type="file" class="form-control" id="image" name="image" value="<?php echo $img?>"><br>

                    <label class="labels mb-2">Tiêu đề:</label><br>
                    <input type="text" class="form-control " id="title" name="title" value="<?php echo $title?>"><br>

                    <label class="labels mb-2">Nội dung:</label><br>
                    <input name="content" id="content" class="form-control " rows="5"  value="<?php echo $content?>"></input><br>
                    
                    <label class="labels mb-2">Diện tích:</label><br>
                    <input type="text" class="form-control " id="area" name="area" value="<?php echo $area?>"><br>

                    <label class="labels mb-2">Địa Chỉ:</label><br>
                    <input type="text" class="form-control " id="address" name="address" value="<?php echo $address?>"><br>

                    <label class="labels mb-2">Giá thuê:</label><br>
                    <input type="text" class="form-control " id="price" name="price" value="<?php echo $price?>"><br>

                    <input type="submit" name = "sbmUpdate" class="btn btn-primary row mt-4 container " style="margin-left:0;" value="Cập nhật" >
                    </form>

            </div>
        </div>
    </div>
</div>
</div>
<?php
   
    if(isset($_POST['sbmUpdate'])){
        $post_title = $_POST['title'];
        $post_content = $_POST['content'];
        $post_area = $_POST['area'];
        $post_address = $_POST['address'];
        $post_price = $_POST['price'];
        $post_img = basename($_FILES['image']['name']);
        
        //upload img
        $target_dir = "../asset/upload/";
        $target_file = $target_dir . $post_img;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File  ". htmlspecialchars($post_img). " đã được tải lên.";
        } else {
            echo "Lỗi! Tải file ảnh không thành công.";
        }

        $sql2 = "UPDATE posts SET post_title='$post_title', post_img = '$post_img', post_area = '$post_area', post_address = '$post_address', post_price = '$post_price', post_content = '$post_content' WHERE post_id = '$post_id' ";
        
        $result2 = mysqli_query($conn, $sql2);

        if($result2 > 0){
            // header("Location:index.php");
            echo "Thành công!";
        }else{
            echo "Lỗi! Cập nhật thất bại";
        }
        
    }

    mysqli_close($conn);
    
?>

<?php include 'footer.php'?>