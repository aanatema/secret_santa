<?php include("session.php"); ?>
<?php include("head.php"); ?>
<!doctype html>
<html lang="fr">

<title>ReSoC - Mur</title>

<body>
    <?php include("header.php"); ?>

    <div id="wrapper">
        <?php
        $userId = intval($_GET['user_id']);
        
        if ($userId == null) {
            ?>
            <aside>
                <div class='cropped'>
                    <img src="deco.png" />
                </div>
                <section>
                    <h3>Présentation</h3>
                    <p>
                        Sur cette page vous trouverez tous les message de </p>
                </section>
            </aside>

            <main>
                <article>
                    <h2>Information</h2>
                    <p>Veuillez vous connecter à votre compte.</p>
                    <p><a href='login.php'>Connectez-vous</a></p><br>
                    <h3>Pas de compte?</h3>
                    <p><a href='registration.php'>Inscrivez-vous</a></p>
                </article>
            </main>
        <?php } ?>
        <aside>
            <section>
                <h3>Présentation</h3>
                <p>Sur cette page vous trouverez tous les message de l'utilisatrice :

                </p>
            </section>
        </aside>
        <main>
        </main>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>