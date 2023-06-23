<?php
    $message = 'None';
    if (empty($_POST)){
        $message = 'Нет данных';
        exit(json_encode($message));
    }
    else{
        include './link.php';
        $query_login= " SELECT * FROM `users` where `login`= '".$_POST['login']."'";
        $result_login = mysqli_query($link,$query_login);
        $count = mysqli_num_rows($result_login);
        if ($count >0){
            $message = 'Данный логин занят';
            exit(json_encode($message));
        } 
        else{
        $patr = 'NULL';
        if (!empty($_POST['patronymic'])) $patr = "'".$_POST['patronymic']."'";
        $query ="INSERT INTO `users` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `id_role`) VALUES (NULL, '".$_POST['name']."', '".$_POST['surname']."', ".$patr.", '".$_POST['login']."', '".$_POST['email']."', '".md5($_POST['password'])."', '1');";
        $result = mysqli_query($link,$query);
        $message='OK';
        exit(json_encode($message));
        }
    }
?>