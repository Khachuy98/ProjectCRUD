<?php
    if(isset($_SESSION["profile"])){
        $fullnamee = $_SESSION['profile']['fullname'];
    }else{
            header('Location: ./login/login.php');
            exit;
    }
?>