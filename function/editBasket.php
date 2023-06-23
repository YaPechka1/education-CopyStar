<?php 
session_start();
if (empty($_POST)){
    exit(json_encode('FAIL'));
}
else{

    for ($i=0;$i<count($_SESSION['basket']);$i++){
        if ($_POST['id_item']==$_SESSION['basket'][$i]['id_item']){
            if ($_POST['count_item']=='0'){
                unset($_SESSION['basket'][$i]);
            }
            else $_SESSION['basket'][$i]['count_item']=$_POST['count_item'];

        }
    }
    exit(json_encode('OK'));
}
?>