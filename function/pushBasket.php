<?php 
session_start();
if (!empty($_POST)){
    $item = [
        'id_item'=>$_POST['id_item'],
        'name_item'=>$_POST['name_item'],
        'photo_item'=>$_POST['photo_item'],
        'category_item'=>$_POST['category_item'],
        'count_item'=>$_POST['count_item'],
        'count_total_item'=>$_POST['count_total_item'],
        'price_item'=>$_POST['price_item']
    ];
    $x=true;
    for ($i=0;$i<count($_SESSION['basket']);$i++){
        if ($_SESSION['basket'][$i]['id_item']==$item['id_item']){
            $_SESSION['basket'][$i]['count_item']=$item['count_item'];
            $x=false;
        }
    }

    if ($x) array_push($_SESSION['basket'],$item);
    exit(json_encode('OK'));
}
exit(json_encode('FAIL'));
?>