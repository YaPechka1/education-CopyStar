<?php
session_start(); 
include './link.php';
$query='SELECT * FROM `category`';
$result = mysqli_query($link,$query);
$rows= mysqli_fetch_all($result,MYSQLI_ASSOC);
exit(json_encode($rows));
?>