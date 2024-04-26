<section class="creation">
    <div class="box-form">
        <p>Créer une nouvelle planète</p>

        <fieldset>
            <label for="name">Nom de la planète <span>*</span></label>
            <input type="text" name="name" id="name" required>

            <label for="img">Image de la planète <span>*</span></label>
            <input type="file" name="img" id="img" required>

            <label for="taille">Taille <span>*</span></label>
            <input type="number" name="taille" id="taille" required>

            <label for="galaxie">Système solaire <span>*</span></label>
            <select name="galaxie" id="galaxie">
                <option value="">-------</option>
                <?php 
                $req = 'SELECT * FROM galaxies';
                $galaxies = $dbAstra->prepare($req);
                $galaxies->execute();
                
                while ($line = $galaxies->fetch()) {
                    echo '<option value="'.$line["id"].'">'.$line["name"].'</option>';
                };

                ?>
            </select>

            <p>Environnement <span>*</span></p>

            <?php
            $req = 'SELECT * FROM environnements';
            $envts = $dbAstra->prepare($req);
            $envts->execute();

            while ($line = $envts->fetch()) {
                echo '<input type="checkbox" id="'.$line["name"].'" name="env[]" value="'.$line["id"].'">';
                echo '<label for="'.$line["name"].'">'.$line["name"].'</label>';
            }
            ?>

            <label for="desc">Description de la planète <span>*</span></label>
            <textarea name="desc" rows="10" cols="30" placeholder="Une description de la planète, son histoire, son climat..."></textarea>

            <p>La planète est elle habitable ? <span>*</span></p>
            <label for="oui">Oui</label>
            <input type="radio" id="oui" name="reponse" value="TRUE">

            <label for="non">Non</label>
            <input type="radio" id="non" name="reponse" value="FALSE">
        </fieldset>
        <fieldset>
            <label for="taille">Nombre d'habitants <span>*</span></label>
            <input type="number" name="nbhab" id="nbhab" required>

            <p>Population <span style="font-size: 0.6em;">(par qui est peuplé la planète)</span></p>
            
            <?php
            $req = 'SELECT * FROM populations';
            $pops = $dbAstra->prepare($req);
            $pops->execute();

            while ($line = $pops->fetch()) {
                echo '<input type="checkbox" id="'.$line["name"].'" name="pop[]" value="'.$line["id"].'">';
                echo '<label for="'.$line["name"].'">'.$line["name"].'</label>';
            }
            ?>
        </fieldset>

    </div>
</section>
