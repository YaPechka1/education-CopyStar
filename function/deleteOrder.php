<?php 
session_start();
if (empty($_POST)) exit(json_encode('FAIL'));
else{
    include './link.php';
    $query='select `order_item`,`order_item_count` from `order` INNER JOIN `order_number` on `order_number`.`id_order_number` = `order`.`name_order` where `name_order`='.$_POST['name_order'].' and `id_status`=1 and `order_number`.`id_user`='.$_SESSION['id_user'];
    $result = mysqli_query($link,$query);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    for ($i=0;$i<count($rows);$i++){
        $query_count ="UPDATE `items` SET `count` = `count`+ ".$rows[$i]['order_item_count']." WHERE `items`.`id_item` = ".$rows[$i]['order_item'].";";
        $result_count=mysqli_query($link,$query_count);
    }
    $query_delete='DELETE FROM `order` where `name_order`='.$_POST['name_order'];
    $result_delete=mysqli_query($link,$query_delete);

    exit(json_encode('OK'));
}
?>