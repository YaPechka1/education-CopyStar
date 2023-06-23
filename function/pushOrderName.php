<?php 
session_start();
include './link.php';

$query_order_number = 'insert into `order_number` (`id_user`) values ("'.$_SESSION['id_user'].'")';
$result_order = mysqli_query($link,$query_order_number);

exit(json_encode(mysqli_insert_id($link)));
?>