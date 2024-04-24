<?php require "../template/header.html" ?>

<section id="planet">
    <img src="../src/Planet1.png" alt="">
    <p class="montserrat">Concevez, et donnez vie à vos propres planètes !</p>
</section>

<section id="carousel">
    <div id="swiper-box">
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
                slidesPerView:3,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 4000,
                },
                // breakpoints: {
                //     640: {
                //         slidesPerView: 1,
                //     },
                //     1100: {
                //         slidesPerView: 3,
                //     },
                // },
            });
        </script>
    </div>
</section>

<?php require "../template/footer.html" ?>