<?php
    require_once('../database/data.php');
    $table = "products";
    $id = $_GET['id'];
    $db->delete($table, $id);
    header('Location: ../index.php')
?>