<?php
session_start();
unset($_SESSION['profile']);
session_destroy();
header("location: login.php");
?>