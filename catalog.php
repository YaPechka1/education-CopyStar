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
    <link rel="stylesheet" href="./style/catalog.css">
</head>
<body class="footer_under">
<?php
    include './header.php'
?>
    <main>
        <section class="main_filter">
            <div data-type="all" class="filter">Все</div>
            <?php 
            include './function/link.php';
            $query_category ="select `id_category`, `category_name` from `category`";
            $result_category = mysqli_query($link,$query_category);
            $rows = mysqli_fetch_all($result_category,MYSQLI_ASSOC);
            foreach($rows as $row){
                print('
                <div data-type="'.$row['id_category'].'" class="filter" id="cat'.$row['id_category'].'">'.$row['category_name'].'</div>
                ');
            }
            ?>
        </section>
        <section class="card_container">
            
        </section>
    </main>
    <?php
    include './footer.php'
    ?>
    <div class="modal hide" >
        <div class="window">
            <h4 id="name">Ориг</h4>
            <div class="modal-item">
                <img id="photoModal" src="/img/items/orig.png" alt="">
                <div>
                    <div>
                        <h5>Категория</h5>
                        <p id="category">Струйный</p>
                    </div>
                    <div>
                        <h5>Год произвадстава</h5>
                        <p id="year">
                            2005
                        </p>
                    </div>
                    <div>
                        <h5>Страна производства</h5>
                        <p id="country">
                            Россия
                        </p>
                    </div>
                </div>
            </div>
            <?php 
            if (!empty($_SESSION['id_user'])){
                print('
                <div class="under-modal">
                <div class="add-row">
                    <button class="btn-black" onclick="pushBasket();modalClose()">Добавить в корзину</button>
                    <button id="price" class="btn-black">150руб.</button>
                </div>
                
                    <div class="count-row">
                        <div>
                        Всего: <span id="count_total">12</span>
                        </div>
                        <div class="count">
                            <button onclick="addModalItem(1)" class="btn-black">+</button>
                            <span id="count">1</span>
                            <button onclick="addModalItem(-1)" class="btn-red">-</button>
                        </div>
                    </div>
                
            </div>
                ');
            }
            ?>
            
            <img src="./img/close.png" alt="" onclick="modalClose()" class="close">
        </div>

    </div>
    <script src="./script/catalog.js"></script>
</body>
</html>