<?php
session_start();
foreach ($_SESSION['basket'] as $row){
    if ($row['id_item']==$_POST['id_item']){
        exit(json_encode($row['count_item']));
    }
}
exit(json_encode(1));
?>