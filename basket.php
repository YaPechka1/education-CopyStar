<?php
session_start();
if (empty($_SESSION['id_role']))header('Location:/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/basket.css">
</head>
<body class="footer_under">
    <?php
    include './header.php'
    ?>
    <main>
        <section class="user">
            <h2>
                <?php
                print(
                $_SESSION['surname'] .' '.
                $_SESSION['name'] .' '.
                $_SESSION['patronymic'] . " | " .
                $_SESSION['email']
                )
                ?>
            </h2>
            <form action="./function/exit.php">
            <button class="btn-red">Выход</button>
            </form>
        </section>
        <section class="sect">
            <button class="sect-option" data-tab="0">Список заказов</button><button class="sect-option" data-tab="1">Текущая корзина</button>
        </section>
        <section class="tab">
            <div id="order" class="tab-item" data-tab="0">
                <div class="tab-item-card">
                    <div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div><div class="empty"></div>
                    <div>#12</div><div>12.12.12</div><div>Завершен</div><button class="btn-black">Подробнее</button>
                </div>
                <div class="tab-item-card">
                    <div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div><div class="empty"></div>
                    <div>#12</div><div>12.12.12</div><div>Завершен</div><button class="btn-black">Подробнее</button>
                </div>
                <div class="tab-item-card">
                    <div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div><div class="empty"></div>
                    <div>#12</div><div>12.12.12</div><div>Завершен</div><button class="btn-black">Подробнее</button>
                </div>
                <div class="tab-item-card">
                    <div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div><div class="empty"></div>
                    <div>#12</div><div>12.12.12</div><div>Завершен</div><button class="btn-black">Подробнее</button>
                </div>
            </div>
            <div id="cont" class="tab-item" data-tab="1">
                <div class="tab-basket-item">
                    <span>Итого: <span id='total'>50руб.</span></span><button class="btn-black" onclick="pushOrder();getBasket(); selectTab('0');">Оформить</button>
                </div>
            </div>
        </section>
    </main>
    <?php
    include './footer.php'
    ?>
    <div class="modal hide">
        <div class="window">
            <h4>#12</h4>
            <div class="item-container">
                <div class="tab-basket-item">
                    <div class="logo-item">
                        <img src="/img/items/orig.png" alt="">
                        <div class="name-item">
                            <h4>Ориг</h4>
                            <span>Струйный</span>
                        </div>
                    </div>
                    <div class="count">
                        <button class="btn-black">200руб.</button>
    
                        <span id="count">12</span>
    
                    </div>
                </div>
            <div class="tab-basket-item">
                <div class="logo-item">
                    <img src="/img/items/orig.png" alt="">
                    <div class="name-item">
                        <h4>Ориг</h4>
                        <span>Струйный</span>
                    </div>
                </div>
                <div class="count">
                    <button class="btn-black">200руб.</button>

                    <span id="count">12</span>

                </div>
            </div>
            <div class="tab-basket-item">
                <div class="logo-item">
                    <img src="/img/items/orig.png" alt="">
                    <div class="name-item">
                        <h4>Ориг</h4>
                        <span>Струйный</span>
                    </div>
                </div>
                <div class="count">
                    <button class="btn-black">200руб.</button>

                    <span id="count">12</span>

                </div>
            </div>
            <div class="tab-basket-item">
                <div class="logo-item">
                    <img src="/img/items/orig.png" alt="">
                    <div class="name-item">
                        <h4>Ориг</h4>
                        <span>Струйный</span>
                    </div>
                </div>
                <div class="count">
                    <button class="btn-black">200руб.</button>

                    <span id="count">12</span>

                </div>
            </div>
            <div class="tab-basket-item">
                <div class="logo-item">
                    <img src="/img/items/orig.png" alt="">
                    <div class="name-item">
                        <h4>Ориг</h4>
                        <span>Струйный</span>
                    </div>
                </div>
                <div class="count">
                    <button class="btn-black">200руб.</button>

                    <span id="count">12</span>

                </div>
            </div>
        </div>
            <img src="./img/close.png" alt="" onclick="modal()" class="close">
        </div>
    </div>
    <script src="./script/basket.js"></script>
</body>
</html>