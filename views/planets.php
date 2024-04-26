<section id="all-planets">
    <div id="filter">Mes éléments</div>
    <div id="planets">

        <?php
            $req = 'SELECT * FROM planets ORDER BY id DESC';
            $planets = $dbAstra->prepare($req);
            $planets->execute();

            while ($line = $planets->fetch()) {
                echo '<div class="one-planet">
                        <a href="/planet/'.$line['id'].'/">
                            <img src="../src/' . $line["urlImg"] . '" alt="">
                            <p>' . $line["name"] . '</p>
                        </a>
                      </div>';
            }
        ?>

    </div>
</section>
