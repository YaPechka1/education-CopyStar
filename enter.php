<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/enterReg.css">
</head>
<body class="footer_under">
    <?php
    include './header.php'
    ?>
    <main>
        <form action="" name="enter" onsubmit="return false" novalidate>
            <h2>Вход</h2>
            <input oninput="checkForm()" type="text" placeholder="Логин: " name="login" minlength="2" required>
            <p class="message login"></p>
            <input oninput="checkForm1()" type="password" placeholder="Пароль: " name="password" minlength="6" required>
            <p class="message password"></p>
            <input type="submit" onclick="checkFormTotal()" name="submit" class="btn-black" value="Войти">
            <p class="message total"></p>
        </form>
    </main>
    <?php
    include './footer.php'
    ?>
    <script src="./script/enter.js"></script>
</body>
</html>