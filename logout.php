<?php
    session_start();
    if(isset($_SESSION['loginSuccess'])){
        unset($_SESSION['loginSuccess']);
        header("Location:./index.php");
    }
?>