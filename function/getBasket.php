<?php 
session_start();
exit(json_encode($_SESSION['basket']));
?>