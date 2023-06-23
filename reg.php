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
            <h2>Регистрация</h2>
            <input oninput="checkForm()" type="text" placeholder="Имя: " pattern="[А-Яа-яЁё ]+" name="name" minlength="2" required>
            <p class="message name"></p>
            <input oninput="checkForm1()" type="text" placeholder="Фамилия: " pattern="[А-Яа-яЁё ]+" name="surname" minlength="2" required>
            <p class="message surname"></p>
            <input oninput="checkForm2()" type="text" placeholder="Отчество: " pattern="[А-Яа-яЁё ]+" name="patrionic" minlength="2">
            <p class="message patrionic"></p>
            <input oninput="checkForm3()" type="email" placeholder="Email: "  name="email" required>
            <p class="message email"></p>
            <input oninput="checkForm4()" type="text" placeholder="Логин: " name="login" minlength="2" required>
            <p class="message login"></p>
            <input oninput="checkForm5()" type="password" placeholder="Пароль: " name="password" minlength="6" required>
            <p class="message password"></p>
            <input oninput="checkForm6()" type="password" placeholder="Повторите пароль: " name="passwordRepeat" minlength="6" required>
            <p class="message passwordRepeat"></p>
            <div>
            <input id="check" type="checkbox"><span style="margin-left: 20px;">Я согласен с обработкой ПД</span>
            </div>
            <p class="message rules"></p>
            <input type="submit" onclick="checkFormTotal()" name="submit" class="btn-black" value="Войти">
            <p class="message total"></p>
        </form>
    </main>
    <footer>
        <p>Copyright © 2022 <a>CopyStar</a></p>
        <nav>
            <ul>
                <li><a href="">О нас</a></li>
                <li><a href="">Каталог</a></li>
                <li><a href="">Где нас найти?</a></li>
                <li><a href="">Войти</a></li>
                <li><a href="">Регистрация</a></li>
                <li><a href="">Личный кабинет</a></li>
            </ul>
        </nav>
    </footer>
    <script src="./script/reg.js"></script>
</body>
</html>