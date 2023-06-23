<?php 
session_start();
if ($_SESSION['id_role']!=2 || empty($_POST)) exit(json_encode('FAIL'));
else{
    
    if (!empty($_FILES['photo'])) {
        $file = $_FILES['photo'];
        //переменная где хранится фото
        $name = $file['name'];//получить имя переменной
        $pathfile = __DIR__ . '\..\img\items\\' . $name;//полный путь до фото ДЛЯ сохранения на ПЗУ
        $pathfilee =  '/img/items/' . $name;//относительный путь файла для хранения в БД
        
        // exit(json_encode($pathfile));
        if (!move_uploaded_file($file['tmp_name'], $pathfile)) {
            echo 'cant upload file';
        }
        
        
        include './link.php';
    $query="INSERT INTO `items` (`id_item`, `item_name`, `item_photo`, `id_category`, `year`, `country`, `price`, `count`) VALUES (NULL, '".$_POST['item_name']."', '".$pathfilee."', '".$_POST['id_category']."', '".$_POST['year']."', '".$_POST['country']."', '".$_POST['price']."', '".$_POST['count']."');";
    // exit(json_encode($query));
    $result = mysqli_query($link,$query);
    exit(json_encode('OK'));
    }
    else exit(json_encode('FAIL12'));
}
?>