$_GET['id']

<section id="galaxie">
    <h1>Andromède</h1>

    <div>
        <div>
            <h2>5</h2>
            <p>planètes dans la galaxie</p>
        </div>
        <div>
            <h2>16000</h2>
            <p>habitants dans la galaxie</p>
        </div>
    </div>


    <div class="swiper-box">
        <h1>Toutes les planètes de la galaxie</h1>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    swiper1
                </div>
            </div>
            <div class="swiper-button-next"><i class='bx bx-right-arrow-circle'></i></div>
            <div class="swiper-button-prev"><i class='bx bx-left-arrow-circle'></i></div>
        </div>
        <script>
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                loop: true,
                slidesPerView: 3,
                spaceBetween: 7,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 4000,
                },
            });
        </script>
    </div>
</section>