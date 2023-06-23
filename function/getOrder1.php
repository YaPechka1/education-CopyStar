<?php 
session_start();
include './link.php';
$query = "SELECT DISTINCT `name_order`, DATE_FORMAT(`date`,'%d.%m.%Y') as 'date', `status`.`status_name`,`status`.`id_status`  from `order` INNER JOIN `status` on `status`.`id_status` = `order`.`id_status` INNER JOIN `order_number` on `order_number`.`id_order_number`= `order`.`name_order`";
$result = mysqli_query($link,$query);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
exit(json_encode($rows));
?>