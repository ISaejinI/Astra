<?php  ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra</title>
    <link rel="stylesheet" href="css/main.css"/>
    <script src="/script/script.js"></script>
</head>

<body>
    <header>
        <p class="logo">Astra</p>
        <nav>
            <a href="">Explorer les planètes</a>
            <a href="">Créer une planète</a>
            <a href="">Log In</a>
            <a href="" class="bu-head">Register</a>
        </nav>
    </header>

    <section id="planet">
        <img src="/src/Planet1.png" alt="">
        <p>Concevez, et donnez vie à vos propres planètes !</p>
    </section>

    <section id="carousel">
        <div class="box">
            <h1>Les dernières planètes découvertes</h1>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/src/Planet1.png" alt="">
                        <p>Mercure</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="/src/Planet2.png" alt="">
                        <p>Venus</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="/src/Planet3.png" alt="">
                        <p>Terre</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="/src/Planet4.png" alt="">
                        <p>Lune</p>
                    </div>
                    <div class="swiper-slide">
                        <img src="/src/Planet5.png" alt="">
                        <p>Pluton</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>