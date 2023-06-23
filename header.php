
<header>
        <div class="logo_container">
            <img src="./img/logo.png" alt="Логотип">
            <h1><a href="/">CopyStar</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="/">О нас</a></li>
                <li><a href="/catalog.php">Каталог</a></li>
                <li><a href="/where.php">Где нас найти?</a></li>
                <?php  
                    if (empty($_SESSION['id_role']))
                    print('
                    <li><a href="/enter.php"><button class="btn">Войти</button></a></li>
                    <li><a href="/reg.php"><button class="btn">Регистрация</button></a></li>
                    ');
                    else{
                        print('
                        <li><a href="/basket.php"><button class="btn">Личный кабинет</button></a></li>
                        ');
                        if ($_SESSION['id_role']=='2'){
                            print('
                            <li><a href="/admin.php"><button class="btn">Администрирование</button></a></li>
                            ');
                        }
                    }
                ?>
            </ul>
        </nav>
</header>