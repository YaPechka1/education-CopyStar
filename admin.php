<?php
session_start();
if ($_SESSION['id_role']!='2')header('Location:/');
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
    <link rel="stylesheet" href="./style/catalog.css">
    <link rel="stylesheet" href="./style/admin.css">
</head>
<body class="footer_under">
<?php
    include './header.php'
?>
    <main>
        <section class="option_container">
            <button class="btn-black" data-option="0">Категории</button>
            <button class="btn-black" data-option="1">Товары</button>
            <button class="btn-black" data-option="2">Заказы</button>
        </section>
        <section class="tab">
            <div class="tab-item" data-option="0">
                <div class="shadow" id="cat">
                <button class="btn-black" onclick="editView('add')" style="width: 100%;" >Добавить категорию</button>
                <div class="tab-basket-item">
                    <input id="2" oninput="editValue('2');" type="text" value="Термопринтеры" placeholder="Имя категории">
                    <div class="count">
                        <button class="btn-black" onclick="finalValue('2');">Сохранить</button>
                        <button class="btn-red">Удалить</button>
                    </div>
                </div>
                <div class="tab-basket-item">
                    <input id="3" oninput="editValue('3');" type="text" value="Лазерные" placeholder="Имя категории">
                    <div class="count">
                        <button class="btn-black" onclick="finalValue('3');">Сохранить</button>
                        <button class="btn-red">Удалить</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="tab-item" data-option="1">
                <button class="btn-black" style="width: 100%;" onclick="editView('addItem')">Добавить</button>
                <section class="card_container">

                </section>
            </div>
            <div class="tab-item" data-option="2">
                <div class="shadow" id="order_container">
                    <div class="tab-item-card">
                        <div>
                            <h4>Номер заказа</h4>
                        </div>
                        <div>
                            <h4>Дата заказа</h4>
                        </div>
                        <div>
                            <h4>Статус заказа</h4>
                        </div>
                        <div class="empty"></div>
                        <div>#12</div>
                        <div>12.12.12</div>
                        <div>
                            <select name="" id="">
                                <option value="">Новый</option>
                                <option value="">Обработка данных</option>
                                <option value="">Готово</option>
                            </select>
                        </div>
                        <button class="btn-black" onclick="editView('moreItem')">Подробнее</button>
                    </div>
                    <div class="tab-item-card">
                        <div>
                            <h4>Номер заказа</h4>
                        </div>
                        <div>
                            <h4>Дата заказа</h4>
                        </div>
                        <div>
                            <h4>Статус заказа</h4>
                        </div>
                        <div class="empty"></div>
                        <div>#12</div>
                        <div>12.12.12</div>
                        <div>
                            <select name="" id="">
                                <option value="">Новый</option>
                                <option value="">Обработка данных</option>
                                <option value="">Готово</option>
                            </select>
                        </div>
                        <button class="btn-black" onclick="editView('moreItem')">Подробнее</button>
                    </div>
                    <div class="tab-item-card">
                        <div>
                            <h4>Номер заказа</h4>
                        </div>
                        <div>
                            <h4>Дата заказа</h4>
                        </div>
                        <div>
                            <h4>Статус заказа</h4>
                        </div>
                        <div class="empty"></div>
                        <div>#12</div>
                        <div>12.12.12</div>
                        <div>
                            <select name="" id="">
                                <option value="">Новый</option>
                                <option value="">Обработка данных</option>
                                <option value="">Готово</option>
                            </select>
                        </div>
                        <button class="btn-black" onclick="editView('moreItem')">Подробнее</button>
                    </div>
                    <div class="tab-item-card">
                        <div>
                            <h4>Номер заказа</h4>
                        </div>
                        <div>
                            <h4>Дата заказа</h4>
                        </div>
                        <div>
                            <h4>Статус заказа</h4>
                        </div>
                        <div class="empty"></div>
                        <div>#12</div>
                        <div>12.12.12</div>
                        <div>
                            <select name="" id="">
                                <option value="">Новый</option>
                                <option value="">Обработка данных</option>
                                <option value="">Готово</option>
                            </select>
                        </div>
                        <button class="btn-black" onclick="editView('moreItem')">Подробнее</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include './footer.php'
    ?>
    <div id="delete" class="modal hide" >
        <div class="window">
            <h4>Подтвердите действие</h4>
            <p>Связанные записи будут удалены</p>
            
                    <button class="btn-red" onclick="deleteCategory();editView('delete');getItems();">Удалить</button>
            
            <img src="./img/close.png" alt="" onclick="editView('delete')" class="close">
        </div>

    </div>
    <div id="add" class="modal hide" >
        <div class="window">
            <h4>Добавление категории</h4>
            <div class="under-modal">
            <input type="text" placeholder="Имя новой категории" id="new-cat">
            <button class="btn-black" onclick="pushCategory(); editView('add');">Подтвердить</button>
            </div>
            <img src="./img/close.png" alt="" onclick="editView('add')" class="close">
        </div>
    </div>
    <div id="editItem" class="modal hide" >
        <div class="window" style="max-height: 80vh;overflow-y: auto;overflow-x: hidden;">
            <div class="modal-item">
                <img id="edit_photo" src="/img/items/orig.png" alt="">
                <div>
                    <div>
                        <h5>Название</h5>
                        <input type="text" id="edit_name" value="Ориг">
                    </div>
                    <div>
                        <h5>Фото</h5>
                        <input type="file" id="edit_file">
                    </div>
                    <div>
                        <h5>Категория</h5>
                        <select id="edit_category">

                        </select>
                    </div>
                    <div>
                        <h5>Год произвадстава</h5>
                        <input type="number" min="1900" max="2099" id="edit_year"step="1" value="2018" />
                    </div>
                    <div>
                        <h5>Страна производства</h5>
                        <input type="text" id="edit_country" value="Россия">
                    </div>
                    <div>
                        <h5>Количество:</h5>
                        <input type="number" id="edit_number" value="1" min="0">
                    </div>
                </div>
            </div>
            <div class="under-modal" style="flex-wrap: wrap-reverse;">
                    <button class="btn-black" onclick="editItem();editView('editItem');getItems()">Сохранить</button>
                    <span><input type="text" value="150" id="edit_price" placeholder="Цена:">руб.</span>
                    
            </div>
            <img src="./img/close.png" alt="" onclick="editView('editItem')" class="close">
        </div>
    </div>
    <div id="addItem" class="modal hide" >
        <div class="window" style="max-height: 80vh;overflow-y: auto;overflow-x: hidden;">
            <div class="modal-item">
                
                <div>
                    <div>
                        <h5>Название</h5>
                        <input type="text" id="add_name" value="Ориг">
                    </div>
                    <div>
                        <h5>Фото</h5>
                        <input type="file" id="add_file" multiple accept="image/*">
                    </div>
                    <div>
                        <h5>Категория</h5>
                        <select id="add_category">

                        </select>
                    </div>
                    <div>
                        <h5>Год произвадстава</h5>
                        <input type="number" id="add_year" min="1900" max="2099" step="1" value="2018" />
                    </div>
                    <div>
                        <h5>Страна производства</h5>
                        <input type="text" id="add_country" value="Россия">
                    </div>
                    <div>
                        <h5>Количество:</h5>
                        <input type="number" id="add_count" value="1" min="0">
                    </div>
                </div>
            </div>
            <div class="under-modal" style="flex-wrap: wrap-reverse;">
                    <button class="btn-black" onclick="pushItem();getItems(); editView('addItem'); ">Сохранить</button>
                    <span><input type="text" id="add_price" value="150" placeholder="Цена:">руб.</span>
                    
            </div>
            <img src="./img/close.png" alt="" onclick="editView('addItem')" class="close">
        </div>
    </div>
    <div id="deleteItem" class="modal hide" >
        <div class="window">
            <h4>Подтвердите действие</h4>
            <p>Связанные записи будут удалены</p>
            
                    <button class="btn-red" onclick="deleteItem();editView('deleteItem');">Удалить</button>
            
            <img src="./img/close.png" alt="" onclick="editView('deleteItem')" class="close">
        </div>
    </div>
    <div id="moreItem" class="modal hide">
        <div class="window">
            <h4 id="modalHead">#12</h4>
            <div class="item-container" id="itemContainer">

            </div>
            <img  src="./img/close.png" alt="" onclick="editView('moreItem')" class="close">
        </div>
    </div>
    <script src="./script/admin.js"></script>
</body>
</html>