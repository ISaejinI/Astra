<section id="planet">
    <img src="src/Planet1.png" alt="">
    <p class="montserrat">Concevez, et donnez vie à vos propres planètes !</p>
</section>

<section id="carousel">
    <div id="swiper-box">
        <h1>Les dernières planètes découvertes</h1>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    $req = 'SELECT * FROM planets ORDER BY id DESC LIMIT 5';

                    $planets = $dbAstra->prepare($req);
                    $planets->execute();

                    while ($line = $planets->fetch()) {
                        echo '<div class="swiper-slide">
                                <a href="planet/'.$line['id'].'/">
                                    <img src="src/' . $line["urlImg"] . '" alt="">
                                    <p>' . $line["name"] . '</p>
                                </a>
                            </div>';
                    }
                ?>
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
