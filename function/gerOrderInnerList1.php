<?php 
session_start();
include './link.php';
if (empty($_POST)){
    exit(json_encode('FAIL'));
}
else{
    $query="select `items`.`item_name`, `items`.`item_photo`, `category`.`category_name`, `price_item`, `order_item_count` from `order` INNER JOIN `items` on `items`.`id_item` =`order`.`order_item` INNER JOIN `category` on `category`.`id_category`=`items`.`id_category` INNER JOIN `order_number` on `order_number`.`id_order_number`=`order`.`name_order` where `name_order`='".$_POST['name_order']."'";
   
    $result = mysqli_query($link,$query);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    exit(json_encode($rows));
}
?>