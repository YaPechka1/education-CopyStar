
<footer>
        <p>Copyright © 2022 <a>CopyStar</a></p>
        <nav>
            <ul>
                <li><a href="/">О нас</a></li>
                <li><a href="/catalog.php">Каталог</a></li>
                <li><a href="/where.php">Где нас найти?</a></li>
                <?php  
                    if (empty($_SESSION['id_role']))
                    print('
                    <li><a href="/enter.php">Войти</a></li>
                    <li><a href="/reg.php">Регистрация</a></li>
                    ');
                    else{
                        print('
                        <li><a href="/basket.php">Личный кабинет</a></li>
                        ');
                        if ($_SESSION['id_role']=='2'){
                            print('
                            <li><a href="/admin.php">Администрирование</a></li>
                            ');
                        }
                    }
                ?>
            </ul>
        </nav>
    </footer>