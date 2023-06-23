<?php 
include './link.php';
$query_items = "SELECT `id_item`, `item_name`, `item_photo`, `category`.`id_category`,`year`,`country`,`price`,`count`,`category_name` FROM `items` INNER JOIN `category` ON `category`.`id_category` =`items`.`id_category` where `count`>0";
$result_items = mysqli_query($link,$query_items);
$rows_items = mysqli_fetch_all($result_items,MYSQLI_ASSOC);
exit(json_encode($rows_items));
?>