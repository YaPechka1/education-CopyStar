<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    include './link.php';
    $query='INSERT INTO `category` (`category_name`) VALUES ("'.$_POST['category'].'")';
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
}
?>