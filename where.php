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
    <link rel="stylesheet" href="./style/where.css">
</head>
<body class="footer_under">
    <?php
    include './header.php'
    ?>
    <main>
        <section class="where">
            <div class="map">
                <img src="./img/where.png" alt="Карта">
            </div>
            <div class="address">
                <table>
                    <tr>
                        <td style="text-align: center;" colspan="2">Контактная информация</td>
                    </tr>
                    <tr>
                        <td>Адрес:</td>
                        <td>посёлок Большие Коты, Листвянское муниципальное образование, Иркутский район</td>
                    </tr>
                    <tr>
                        <td>Номер телефона:</td>
                        <td>8 800 555 35 35</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>copystar@copystar.copystar</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
    <?php
    include './footer.php'
    ?>
    <script src="./script/catalog.js"></script>
</body>
</html>