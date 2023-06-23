<?php
session_start();
$message='Нет данных';
if (empty($_POST))  exit(json_encode($message));
else{
    include './link.php';
    $query="SELECT `id_user`,`name`, `surname`,`patronymic`,`email`,`id_role` FROM `users` WHERE `login`= '".$_POST['login']."' and `password` = '".md5($_POST['password'])."'";
    $result = mysqli_query($link,$query);
    $count = mysqli_num_rows($result);
    if ($count==0){
        $message='Неверный логин или пароль';
        exit(json_encode($message));
    }
    else{

        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach ($rows as $row){
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['patronymic'] = $row['patronymic'];
            $_SESSION['id_role'] = $row['id_role'];
            $_SESSION['basket'] = array();
        }
        $message='OK';

        exit(json_encode($message));
    }
}
?>