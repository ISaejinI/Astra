<section id="all-planets">
    <div id="filter">
        <h2>Filtres</h2>
        <button class="accordion">Galaxies</button>
        <div class="panel">
            <p>Contenu de ma div</p>
        </div>

        <button class="accordion">Environnements</button>
        <div class="panel">
            <p>Contenu de ma div</p>
        </div>

        <button class="accordion">Populations</button>
        <div class="panel">
            <p>Contenu de ma div</p>
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
                        <a href="planet/'.$line['id'].'/">
                            <img src="src/' . $line["urlImg"] . '" alt="">
                            <p>' . $line["name"] . '</p>
                        </a>
                      </div>';
            }
        ?>
    </div>
</section>
