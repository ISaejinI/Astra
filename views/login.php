<?php require "../template/header.html" ?>

<style>
    body {
        background-image: url(../src/Sky-bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<section>
    <div class="log">
        <p>Connexion</p>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<span class="error">' . $_SESSION["error"] . '</span>';
        }
        ?>
        <form action="../models/users.php" method="post">
            <div class="log-inp">
                <span>
                    <i class='bx bxs-envelope'></i>
                </span>
                <input type="email" name="logmail" id="logmail" required placeholder="Adresse mail">
            </div>
            <div class="log-inp">
                <span>
                    <i class='bx bxs-key'></i>
                </span>
                <input type="password" name="logpwd" id="logpwd" required placeholder="Mot de passe">
            </div>
            <br>

            <input type="submit" value="Connexion" class="bu-head">
        </form>
    </div>
</section>

<?php require "../template/footer.html" ?>