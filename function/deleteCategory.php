<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    include './link.php';
    $query='DELETE  FROM `category` where `id_category`="'.$_POST['id_category'].'"';
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
}
?>