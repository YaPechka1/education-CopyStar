<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    
   include './link.php';
    $query="delete from `items` where `id_item`='".$_POST['id_item']."'";
    // exit(json_encode($query));
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
}
?>