<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location:../login.php");
    }
    include '../config.php';

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql = "DELETE FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);
        if($result==true){
            header('Location:index.php');
        }else{
            echo 'Xóa người dùng không thành công';
        }
    }else{
        header('Location:users.php');
    }
?>