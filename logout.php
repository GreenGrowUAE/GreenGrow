<?php
session_start();

    if (isset($_SESSION['userDB'])){
        unset($_SESSION['userDB']);
        header("Location: index.php");

    }else{
        header("Location: login.php");
    }
?>