<?php require "../template/header.html" ?>

<section id="planet">
    <img src="../src/Planet1.png" alt="">
    <p>Concevez, et donnez vie à vos propres planètes !</p>
</section>

<section id="carousel">
    <div class="box">
        <h1>Les dernières planètes découvertes</h1>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="../src/Planet1.png" alt="">
                    <p>Mercure</p>
                </div>
                <div class="swiper-slide">
                    <img src="../src/Planet2.png" alt="">
                    <p>Venus</p>
                </div>
                <div class="swiper-slide">
                    <img src="../src/Planet3.png" alt="">
                    <p>Terre</p>
                </div>
                <div class="swiper-slide">
                    <img src="../src/Planet4.png" alt="">
                    <p>Lune</p>
                </div>
                <div class="swiper-slide">
                    <img src="../src/Planet5.png" alt="">
                    <p>Pluton</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <script>
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                loop: true,
                slidesPerView: 2,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>
    </div>
</section>

<?php require "../template/footer.html" ?>