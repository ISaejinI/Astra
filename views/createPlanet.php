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
                <option value="Soleil">Soleil</option>
                <option value="Soleil">Soleil</option>
                <option value="Soleil">Soleil</option>
                <option value="Soleil">Soleil</option>
            </select>

            <p>Environnement <span>*</span></p>
            <input type="checkbox" id="forest" name="env[]" value="oui">
            <label for="forest">Forêts</label>

            <input type="checkbox" id="mountain" name="env[]" value="non">
            <label for="mountain">Montagnes</label>

            <input type="checkbox" id="ocean" name="env[]" value="non">
            <label for="ocean">Océans</label>

            <input type="checkbox" id="desert" name="env[]" value="non">
            <label for="desert">Deserts</label>


            <label for="desc">Description de la planète <span>*</span></label>
            <textarea name="desc" rows="10" cols="30" placeholder="Une description de la planète, son histoire, son climat..."></textarea>

            <p>Le planète est elle habitable ? <span>*</span></p>
            <label for="oui">Oui</label>
            <input type="radio" id="oui" name="reponse" value="TRUE">

            <label for="non">Non</label>
            <input type="radio" id="non" name="reponse" value="FALSE">
        </fieldset>
        <fieldset>
            <label for="taille">Nombre d'habitants <span>*</span></label>
            <input type="number" name="nbhab" id="nbhab" required>

            <p>Population <span style="font-size: 0.6em;">(par qui est peuplé la planète)</span></p>
            <input type="checkbox" id="humain" name="population[]" value="oui">
            <label for="humain">Humains</label>

            <input type="checkbox" id="ewok" name="population[]" value="non">
            <label for="ewok">Ewok</label>

            <input type="checkbox" id="hobbit" name="population[]" value="non">
            <label for="hobbit">Hobbit</label>

            <input type="checkbox" id="nain" name="population[]" value="non">
            <label for="nain">Nain</label>
        </fieldset>

    </div>
</section>
