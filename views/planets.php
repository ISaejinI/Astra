<section id="all-planets">
    <div id="filter">
        <h2>Filtres</h2>
        <h3>Galaxies <i class='bx bx-chevron-down'></i></h3>
        <h3>Environnements <i class='bx bx-chevron-down'></i></h3>
        <h3>Populations <i class='bx bx-chevron-down'></i></h3>
    </div>
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
