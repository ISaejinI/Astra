<section id="all-planets">
    <div id="filter">
        <h2>Filtres</h2>
        <button class="accordion">Galaxies</button>
        <div class="panel">
            <form action="" method="get">
                <?php
                $allGalaxies = getGalaxies();
                foreach ($allGalaxies as $g) {
                    echo '<input type="checkbox" id="' . $g["name"] . '" name="galaxies" value="' . $g["name"] . '"/>';
                    echo '<label for="' . $g["name"] . '">' . $g["name"] . '</label><br>';
                } ?>
            </form>
        </div>

        <button class="accordion">Environnements</button>
        <div class="panel">
            <form action="" method="get">
                <?php
                $allEnvironnements = getEnvironnements();
                foreach ($allEnvironnements as $e) {
                    echo '<input type="checkbox" id="' . $e["name"] . '" name="environnements" value="' . $e["name"] . '"/>';
                    echo '<label for="' . $e["name"] . '">' . $e["name"] . '</label><br>';
                } ?>
            </form>
        </div>

        <button class="accordion">Populations</button>
        <div class="panel">
            <form action="" method="get">
                <?php
                $allPopulations = getPopulations();
                foreach ($allPopulations as $p) {
                    echo '<input type="checkbox" id="' . $p["name"] . '" name="populations" value="' . $p["name"] . '"/>';
                    echo '<label for="' . $p["name"] . '">' . $p["name"] . '</label><br>';
                } ?>
            </form>
        </div>
    </div>

    <script src="script/script.js"></script>

    <div id="planets">
        <?php
        $req = 'SELECT * FROM planets ORDER BY id DESC';
        $planets = $dbAstra->prepare($req);
        $planets->execute();

        while ($line = $planets->fetch()) {
            echo '<div class="one-planet">
                        <a href="planet/' . $line['id'] . '/">
                            <img src="src/' . $line["urlImg"] . '" alt="">
                            <p>' . $line["name"] . '</p>
                        </a>
                      </div>';
        }
        ?>
    </div>
</section>