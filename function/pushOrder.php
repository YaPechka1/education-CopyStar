<?php 
session_start();
include './link.php';

$query_order_number = 'insert into `order_number` (`id_user`) values ("'.$_SESSION['id_user'].'")';
$result_order = mysqli_query($link,$query_order_number);



for ($i=0;$i<count($_SESSION['basket']);$i++){
    $query = "INSERT INTO `order` (`id_order`, `name_order`, `order_item`, `order_item_count`, `price_item`, `id_status`,`date`) VALUES (NULL, '".$_POST['number']."', '".$_SESSION['basket'][$i]['id_item']."', '".$_SESSION['basket'][$i]['count_item']."', '".$_SESSION['basket'][$i]['price_item']."', '1',NOW());";
    $query_count="UPDATE `items` SET `count`=`count` - ".$_SESSION['basket'][$i]['count_item']." WHERE `id_item`='".$_SESSION['basket'][$i]['id_item']."'";
    $result = mysqli_query($link,$query);
    $result1=mysqli_query($link,$query_count);
}
$_SESSION['basket'] =[];
exit(json_encode('OK'));


?>