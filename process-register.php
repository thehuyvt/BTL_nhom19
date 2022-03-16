<?php
    include 'config.php';
    if(isset($_POST['sbmRegister'])){
        $email = $_POST['email'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];

        if($pass1 == $pass2){
            $sql = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                //header("Location:register.php");
                echo"Email đã được sử dụng!";
            }else{
                $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

                $sql2 = "INSERT INTO users (user_name, user_pass, user_email, user_phonenumber) VALUES ('$name', '$pass_hash', '$email', '$phoneNumber')";
                
                $result2 = mysqli_query($conn, $sql2);
               
                if($result2 == 1){
                    // include 'sendemail.php';
                    echo 'Đăng kí thành công! Bạn có thể đăng nhập tài khoản của mình.';
                    header("Location:login.php");
                    ob_end_flush();
                }else{
                    echo'Lỗi!';
                }
            }
        }else{
             echo "Mật khẩu không khớp!";
            //header("Location:register.php");
        }
        
    }
    mysqli_close($conn); 
?>