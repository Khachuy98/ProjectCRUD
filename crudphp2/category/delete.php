<?php
    require_once('../database/data.php');
    $table = "categories";
    $id = $_GET['id'];
    $db->delete($table, $id);
    header('Location: ../category.php')
?>