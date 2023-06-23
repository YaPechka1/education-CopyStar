<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    include './link.php';
    $query='UPDATE `order` set `id_status`="'.$_POST['id_status'].'" where `name_order`="'.$_POST['name_order'].'"';
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
}
?>