<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    include './link.php';
    $query='UPDATE `category` SET `category_name`="'.$_POST['category'].'" where `id_category`="'.$_POST['id_category'].'"';
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
}
?>