<style>
    body {
        background-image: url(../src/Sky-bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<section>
    <div class="log">
        <p>Inscription</p>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<span class="error">' . $_SESSION["error"] . '</span>';
        }
        ?>

        <form action="../models/users.php" method="post">
            <div class="log-inp">
                <span>
                    <i class='bx bxs-user'></i>
                </span>
                <input type="text" name="username" id="username" required placeholder="Nom d'utilisateur *">
            </div>
            <div class="log-inp">
                <span>
                    <i class='bx bxs-envelope'></i>
                </span>
                <input type="email" name="email" id="email" required placeholder="Adresse mail *">
            </div>
            <div class="log-inp">
                <span>
                    <i class='bx bxs-key'></i>
                </span>
                <input type="password" name="pwd" id="pwd" required placeholder="Mot de passe *">
            </div>
            <input type="hidden" name="login">
            <br>

            <input type="submit" value="Inscription" class="bu-head">
        </form>
    </div>
</section>
