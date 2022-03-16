<?php
    include './header.php';
?>
       <!-- body -->
       <div class="body">
           <div class="container">
           <div class=" motel  row mt-5 mb-5 me-auto ms-auto">
                <div class="col-md-12 text-center mb-4">
                    <h2>Nhà trọ nổi bật</h2>
                </div>
<a href="./members/motel-detail.php"></a>
                <?php
                    include './config.php';
                    //$sql2 = "SELECT p.post_id, p.post_title, p.post_img, p.post_area, p.post_price, p.post_address fROM users u, posts p WHERE u.user_id = p.user_id";
                    $sql2 = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 4";
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
                        echo'<img src="./asset/upload/'.$img.'" alt="" class="motel-img">';
                        echo'<div class="motel-infor">';
                            echo'<h4 class="motel-infor-title">'.$title.'</h4>';
                            echo'<p class="motel-infor-area">Diện tích: '.$area.' m2</p>';
                            echo'<p class="motel-infor-price">Giá thuê: '.$price.'đ</p>';
                            echo'<p class="motel-infor-address">Địa chỉ: '.$address.'</p>';
                            echo'<a href="./members/motel-detail.php?post-id='.$post_id.'"class="motel-infor-detail btn btn-outline-success">Chi tiết</a>';
                        echo'</div>';
                    echo'</div>';
                echo'</div>';
                }
            }
            mysqli_close($conn);
                ?>
           </div>
       </div>
    <?php include 'footer.php'?>