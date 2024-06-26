<section id="galaxie" class="container">
    <?php
    $galInfos = getGalaxy($_GET['id']);
    $galPlanets = getPlanetsFromGalaxy($_GET['id']);

    $nbPlanets = count($galPlanets);

    $nbHabs = getHabsNbFromGalaxy($galPlanets);
    ?>
    <h1><?= $galInfos['name'] ?></h1>

    <div>
        <div>
            <h2><?= $nbPlanets ?></h2>
            <p>planètes dans la galaxie</p>
        </div>
        <div>
            <h2><?= formatNumber($nbHabs) ?></h2>
            <p>habitants dans la galaxie</p>
        </div>
    </div>


    <div id="swiper-box">
        <h1>Toutes les planètes de la galaxie</h1>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($galPlanets as $planet) { ?>
                    <div class="swiper-slide">
                        <a href="planet/<?= $planet['id'] ?>/">
                            <img src="src/<?= $planet['urlImg'] ?>">
                            <p><?= $planet['name'] ?></p>
                        </a>
                    </div>
                <?php } ?>
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