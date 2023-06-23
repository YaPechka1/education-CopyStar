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
    <link rel="stylesheet" href="./style/index.css">
</head>
<body class="footer_under">
<?php
    include './header.php'
    ?>
    <main>
        <section class="logo_sect">
            <img src="./img/logo.png" alt="Логотип" > <h2>CopyStar | Коснись неба</h2>
        </section>
        <section class="slider">
            <span onclick = "selectSlide(-1);">&#8592;</span>
            <div class="card">
                <img src="./img/items/orig.png" alt="" class="src">
                <h3>Ориг</h3>
            </div>
            <div class="card">
                <img src="./img/items/orig1.png" alt="" class="src">
                <h3>Ориг2</h3>
            </div>
            <div class="card">
                <img src="./img/items/orig2.png" alt="" class="src">
                <h3>Ориг3</h3>
            </div>
            <span onclick = "selectSlide(1);">&#8594;</span>
        </section>

    </main>
    <?php
    include './footer.php'
    ?>
    <script src="./script/index.js"></script>
</body>
</html>