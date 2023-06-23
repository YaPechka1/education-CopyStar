<?php 
    session_start();
    $message=!empty($_SESSION['id_user']);

    exit(json_encode($message));
?>