<section class="creation">
    <div class="box-form">
        <h2>Créer une nouvelle planète</h2>

        <form action="" method="post" enctype="multipart/form-data">

            <div>
                <label for="name">Nom de la planète <span>*</span></label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="img">Image de la planète <span>*</span></label>
                <input type="file" name="img" id="img" accept=".png" required>
            </div>

            <div>
                <label for="taille">Taille <span>*</span></label>
                <input type="number" name="taille" id="taille" required>
            </div>

            <div>
                <label for="galaxie">Galaxie <span>*</span></label>
                <select name="galaxie" id="galaxie">
                    <option value="">-------</option>
                    <?php
                    $req = 'SELECT * FROM galaxies';
                    $galaxies = $dbAstra->prepare($req);
                    $galaxies->execute();

                    while ($line = $galaxies->fetch()) {
                        echo '<option value="' . $line["id"] . '">' . $line["name"] . '</option>';
                    };

                    ?>
                </select>
                <span id="buAddGalaxy" style="cursor: pointer;"><i class='bx bx-plus'></i> Ajouter une nouvelle galaxie</span>
            </div>

            <div>
                <p>Environnement <span>*</span></p>
                <div class="checkElmt">
                    <?php
                    $req = 'SELECT * FROM environnements';
                    $envts = $dbAstra->prepare($req);
                    $envts->execute();

                    while ($line = $envts->fetch()) {
                        echo '<div><input type="checkbox" id="' . $line["name"] . '" name="env[]" value="' . $line["id"] . '">';
                        echo '<label for="' . $line["name"] . '">' . $line["name"] . '</label></div>';
                    }
                    ?>
                </div>

            </div>

            <div>
                <label for="climat">Climat <span>*</span></label>
                <input type="text" name="climat" id="climat" required>
            </div>

            <div>
                <label for="desc">Description de la planète <span>*</span></label>
                <textarea name="desc" rows="10" cols="85" placeholder="Une description de la planète, son histoire, son climat..."></textarea>
            </div>

            <div>
                <p>La planète est elle habitable ? <span>*</span></p>
                <div class="checkElmt">
                    <div>
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" name="habitable" value="TRUE">
                    </div>
                    <div>
                        <label for="non">Non</label>
                        <input type="radio" id="non" name="habitable" value="FALSE">
                    </div>
                </div>
            </div>


            <div>
                <label for="nbhab">Nombre d'habitants <span>*</span></label>
                <input type="number" name="nbhab" id="nbhab" required>
            </div>

            <div>
                <p>Population <span>*</span> <span style="font-size: 0.6em;">(par qui est peuplé la planète)</span></p>
                <div class="checkElmt">
                    <?php
                    $req = 'SELECT * FROM populations';
                    $pops = $dbAstra->prepare($req);
                    $pops->execute();

                    while ($line = $pops->fetch()) {
                        echo '<div><input type="checkbox" id="' . $line["name"] . '" name="pop[]" value="' . $line["id"] . '">';
                        echo '<label for="' . $line["name"] . '">' . $line["name"] . '</label></div>';
                    }
                    ?>
                </div>

            </div>

            <input type="hidden" name="create">
            <input type="submit" value="Valider" class="bu-head">
        </form>
    </div>


    <!-- Modale d'ajout de galaxie -->
    <div id="addGalaxy" style="display: none;">
        <form action="" method="post">
            <input type="text" name="galaxyName" placeholder="Nom de la galaxie">
            <input type="hidden" name="addGalaxy">
            <input type="submit" value="Ajouter" class="bu-head">
        </form>
    </div>
    <script>
        const buGa = document.getElementById('buAddGalaxy')
        const modGa = document.getElementById('addGalaxy')
        buGa.addEventListener('click', () => modGa.style.display = "block")
    </script>
</section>